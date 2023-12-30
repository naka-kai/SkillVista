<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show($courseName)
    {
        // 渡ってきた１つのコースの情報
        $course = Course::with
            (
                'teacher', 
                'rates.users',
                'chapters', 
                'chapters.tests', 
                'chapters.movies'
            )
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

    public function edit()
    {
        return view('Pages.Course.edit');
    }

    public function editConfirm()
    {
        return view('Pages.Course.edit_confirm');
    }

    public function update()
    {
        $courseName = 'courseName';
        $teacherName = 'teacherName';

        return redirect()->route('teacher.myCourse', compact('courseName', 'teacherName'));
    }

    public function destroy()
    {
        return redirect()->route('teacher.myCourse');
    }

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
