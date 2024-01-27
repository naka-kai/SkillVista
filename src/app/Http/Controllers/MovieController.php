<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Movie;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function show()
    {
        return view('Pages.movie');
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
            dd($chapterId);
            try {
                DB::beginTransaction();

                dd($course->chapters);
                foreach ($course->chapters->movies as $key => $movie) {
                    $movie_data [] = [
                        'id' => $movieSorted_data[$key],
                        'movie_title' => $movie->movie_title,
                        'chapter_id' => $movie->chapter_id,
                        'second' => $movie->second,
                        'display_num' => $key + 1,
                        'created_by' => Auth::guard('teacher')->user()->last_name . Auth::guard('teacher')->user()->first_name,
                        'updated_by' => Auth::guard('teacher')->user()->last_name . Auth::guard('teacher')->user()->first_name,
                    ];
                }
                Movie::upsert($movie_data, ['id'], ['display_num']);

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
