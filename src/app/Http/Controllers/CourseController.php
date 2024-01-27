<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Course;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use FFMpeg;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function show($courseName)
    {
        // 渡ってきた１つのコースの情報
        $course = Course::with([
            'teacher', 
            'rates.users',
            'chapters' => function($q) {
                $q->orderBy('display_num');
                $q->with([
                    'tests', 'movies'
                ]);
            },
        ])
        ->where('course_url', '=', $courseName)
        ->first();

        // 受講済みユーザー
        $purchased_course = Course::with('purchased')
            ->where('course_url', '=', $courseName)
            ->first();

        // 受講済み人数
        $purchased_count = count($purchased_course->purchased);

        // そのコースの平均評価値、評価した人の数
        list($rate, $rated_people_num) = $this->calcRate($course);

        // 動画の合計時間
        $movie_total_time = $this->calcMovie($course);

        $teacherId = 1;

        return view('Pages.Course.course', compact('course', 'rate', 'rated_people_num', 'movie_total_time', 'purchased_count', 'teacherId'));
    }

    public function create()
    {
        return view('Pages.Course.create');
    }

    public function createConfirm()
    {
        return view('Pages.Course.create_confirm');
    }

    public function store()
    {
        $courseName = 'courseName';
        $teacherName = 'teacherName';

        return redirect()->route('teacher.myCourse', compact('courseName', 'teacherName'));
    }

    public function edit(Request $request, $teacherName, $courseName)
    {
        // 渡ってきた１つのコースの情報
        $course = Course::with([
            'teacher', 
            'rates.users',
            'chapters' => function($q) {
                $q->orderBy('display_num');
                $q->with([
                    'tests', 'movies'
                ]);
            },
        ])
        ->where('course_url', '=', $courseName)
        ->first();

        return view('Pages.Course.edit', compact('course', 'teacherName', 'courseName'));
    }

    public function editConfirm()
    {
        return view('Pages.Course.edit_confirm');
    }

    public function update(Request $request, $teacherName, $courseName)
    {
        // 渡ってきた１つのコースの情報
        $course = Course::with([
            'teacher', 
            'rates.users',
            'chapters' => function($q) {
                $q->orderBy('display_num');
                $q->with([
                    'tests', 'movies'
                ]);
            },
        ])
        ->where('course_url', '=', $courseName)
        ->first();

        // dd($request['sorted']);
        
        // サムネイル画像変更
        if ($request->hasFile('thumbnail')) {
            
            $dir = 'img/course' . $course->id;
            $file_name = $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/' . $dir, $file_name);
            $course->thumbnail = 'storage/' . $dir . '/' . $file_name;
        } else {
            $course->thumbnail = $course->thumbnail;
        }

        // コースのタイトル（検索時に使用）変更
        if ($request->has('title')) {
            $validated = $request->validate([
                'title' => ['required', 'string', 'max:255'],
            ]);

            $course->title = $request->input('title');
        }

        // コースの軽い説明（検索時に使用）変更
        if ($request->has('description')) {
            $validated = $request->validate([
                'description' => ['required', 'string'],
            ]);

            $course->description = $request->input('description');
        }

        // チャプターの並び替え
        $chapter_data = [];
        if ($request->has('sorted')) {
            $sorted_data = $request->input('sorted');
            try {
                DB::beginTransaction();

                foreach ($course->chapters as $key => $chapter) {
                    $chapter_data [] = [
                        'id' => $sorted_data[$key],
                        'title' => $chapter->title,
                        'course_id' => $chapter->course_id,
                        'display_num' => $key + 1,
                        'created_by' => Auth::guard('teacher')->user()->last_name . Auth::guard('teacher')->user()->first_name,
                        'updated_by' => Auth::guard('teacher')->user()->last_name . Auth::guard('teacher')->user()->first_name,
                    ];
                }
                Chapter::upsert($chapter_data, ['id'], ['display_num']);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                \Log::error($e);
            }
        }

        // 動画変更
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
            
            $movie = Movie::create([
                'movie_title' => $request->movie_title,
                'movie' => 'storage/' . $dir . '/' . $file_name,
                'chapter_id' => $request->chapter_id,
                'second' => $durationInSeconds,
                'created_by' => Auth::guard('teacher')->id(),
                'updated_by' => Auth::guard('teacher')->id(),
            ]);
        } else {
            
        }

        // コースの詳しい説明変更
        if ($request->has('outline')) {
            $validated = $request->validate([
                'outline' => ['required', 'string'],
            ]);

            $course->outline = $request->input('outline');
        }

        // 対象受講者変更
        if ($request->has('target')) {
            $validated = $request->validate([
                'target' => ['string'],
            ]);

            $course->target = $request->input('target');
        }

        // 前提条件変更
        if ($request->has('need')) {
            $validated = $request->validate([
                'need' => ['string'],
            ]);

            $course->need = $request->input('need');
        }

        $course->save();

        return redirect()->route('course.update', ['courseName' => $courseName, 'teacherName' => $teacherName])->with(['course' => $course]);
    }

    public function destroy(Request $request)
    {
        return redirect()->route('teacher.myCourse');
    }

    /**
     * そのコースの平均評価値、評価した人数を返す
     *
     * @param [type] $course
     * @return void
     */
    public function calcRate($course)
    {
        // そのコースに対する評価の全ての情報
        $rates = $course->rates;
        // 星の数の合計値
        $total_rating = 0;

        foreach ($rates as $rate) {
            $total_rating += $rate->rate;
        }

        // 評価した人の数
        $rated_people_num = count($rates);

        if ($rated_people_num) {
            $rate_avg = $total_rating / $rated_people_num;
            $rate = sprintf('%.1f', $rate_avg);
        } else {
            $rate = 0;
        }

        return [$rate, $rated_people_num];
    }

    /**
     * 動画の合計時間を返す(単位は"時間")
     *
     * @param [type] $course
     * @return void
     */
    public function calcMovie($course)
    {
        $chapters = $course->chapters;
        $movie_total_second = 0;
        foreach ($chapters as $chapter) {
            foreach ($chapter->movies as $movie) {
                $movie_total_second += $movie->second;
            }
        }
        $movie_total_time = round($movie_total_second / 60 / 60, 0);
        return $movie_total_time;
    }
}
