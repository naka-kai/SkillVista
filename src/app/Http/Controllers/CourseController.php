<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function show($courseName)
    {
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
        
        return view('Pages.Course.course', compact('course', 'rate', 'rated_people_num', 'movie_total_time', 'purchased_count'));
    }

    public function create(Request $request, $teacherName)
    {
        // dd($request->input('chapterSorted'));
        return view('Pages.Course.create', compact('teacherName'));
    }

    public function store(Request $request, $teacherName)
    {
        // dd($request);

        return redirect()->route('teacher.myCourse', compact('teacherName'));
    }

    public function edit(Request $request, $teacherName, $courseName)
    {
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

        // dd($request['chapterSorted']);
        
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
        $course->updated_by = Auth::guard('teacher')->user()->last_name . Auth::guard('teacher')->user()->first_name;
        $course->updated_at = Carbon::now();
        
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
    private function calcRate($course)
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
    private function calcMovie($course)
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
