<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use FFMpeg;

class MovieController extends Controller
{
    public function show()
    {
        return view('Pages.movie');
    }

    public function store(Request $request, $teacherName, $courseName) {
        // 渡ってきた１つのコースの情報
        $course = Course::with([
            'teacher', 
            'rates.users',
            'chapters' => function($chapter_query) {
                $chapter_query->orderBy('display_num');
                $chapter_query->with([
                    'tests',
                    'movies' => function($movie_query) {
                        $movie_query->orderBy('display_num');
                    }
                ]);
            },
        ])
        ->where('course_url', '=', $courseName)
        ->first();

        // 動画追加
        if ($request->hasFile('movie')) {
            $validated = $request->validate([
                'movie' => ['required', 'file', 'mimes:mp4,mov,x-ms-wmv,mpeg,avi,jpeg,jpg,png', 'max:1000000'],
                'movie_title' => ['required', 'string', 'max:255'],
            ]);

            $dir = 'movie/course' . $course->id;
            $file_name = $request->file('movie')->getClientOriginalName();
            $request->file('movie')->storeAs('public/' . $dir, $file_name);

            $media = FFMpeg::fromDisk('public')->open('/' . $dir . '/' . $file_name);
            $durationInSeconds = $media->getDurationInSeconds();

            $chapter_id = $request->input('chapter_id');
            $count_movie = count(Chapter::findOrFail($chapter_id)->movies);
            
            $movie = Movie::create([
                'movie_title' => $request->movie_title,
                'movie' => 'storage/' . $dir . '/' . $file_name,
                'chapter_id' => $request->chapter_id,
                'second' => $durationInSeconds,
                'display_num' => $count_movie + 1,
                'created_by' => Auth::guard('teacher')->user()->last_name . Auth::guard('teacher')->user()->first_name,
                'updated_by' => Auth::guard('teacher')->user()->last_name . Auth::guard('teacher')->user()->first_name,
            ]);

        } else {
            
        }

        // コースのupdated_byとupdated_atを最新にする
        $course->updated_by = Auth::guard('teacher')->user()->last_name . Auth::guard('teacher')->user()->first_name;
        $course->updated_at = Carbon::now();
        
        $course->save();

        return redirect()->route('course.update', ['courseName' => $courseName, 'teacherName' => $teacherName])->with(['course' => $course]);
    }

    public function update(Request $request, $teacherName, $courseName)
    {
        $course = Course::with([
            'teacher', 
            'rates.users',
            'chapters' => function($chapter_query) {
                $chapter_query->orderBy('display_num');
                $chapter_query->with([
                    'tests',
                    'movies' => function($movie_query) {
                        $movie_query->orderBy('display_num');
                    }
                ]);
            },
        ])
        ->where('course_url', '=', $courseName)
        ->first();

        // 動画の並び替え
        $movie_data = [];
        if ($request->has('movieSorted')) {
            $movieSorted_data = $request->input('movieSorted');
            $chapterId = $request->input('chapterId');
            // dd($movieSorted_data);
            try {
                DB::beginTransaction();

                // dd($course->chapters[$chapterId - 1]->movies);
                foreach ($course->chapters[$chapterId - 1]->movies as $key => $movie) {
                    $movie_data [] = [
                        'id' => $movie->id,
                        'movie_title' => $movie->movie_title,
                        'movie' => $movie->movie,
                        'chapter_id' => $movie->chapter_id,
                        'second' => $movie->second,
                        'display_num' => $movieSorted_data[$key],
                        'created_by' => Auth::guard('teacher')->user()->last_name . Auth::guard('teacher')->user()->first_name,
                        'updated_by' => Auth::guard('teacher')->user()->last_name . Auth::guard('teacher')->user()->first_name,
                    ];
                }
                // dd($movieSorted_data);
                Movie::upsert($movie_data, ['id'], ['display_num']);

                // コースのupdated_byとupdated_atを最新にする
                $course->updated_by = Auth::guard('teacher')->user()->last_name . Auth::guard('teacher')->user()->first_name;
                $course->updated_at = Carbon::now();
                $course->save();

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                \Log::error($e);
            }
        }
    }

    public function destroy(Request $request, $teacherName, $courseName)
    {
        try {
            // 渡ってきた１つのコースの情報
            $course = Course::with([
                'teacher', 
                'rates.users',
                'chapters' => function($chapter_query) {
                    $chapter_query->orderBy('display_num');
                    $chapter_query->with([
                        'tests',
                        'movies' => function($movie_query) {
                            $movie_query->orderBy('display_num');
                        }
                    ]);
                },
            ])
            ->where('course_url', '=', $courseName)
            ->first();
    
            if ($request->input('action') === 'delete_movie') {
                $movie_id = $request->input('movie_id');
                $movie = Movie::findOrFail($movie_id);
                $movie->delete();
    
                return redirect()->route('course.update', ['courseName' => $courseName, 'teacherName' => $teacherName])->with(['course' => $course, 'flash_message' => '動画を1つ削除しました']);
            }
            return redirect()->route('teacher.myCourse');
        } catch (\Exception $e) {
            Log::error("エラーが発生しました: " . $e);

            return redirect()->route('course.update', ['courseName' => $courseName, 'teacherName' => $teacherName])->with(['course' => $course, 'flash_message' => '動画の削除に失敗しました']);
        }
    }
}
