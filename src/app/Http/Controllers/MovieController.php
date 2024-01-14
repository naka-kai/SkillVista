<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function show()
    {
        return view('Pages.movie');
    }

    public function destroy(Request $request, $teacherName, $courseName)
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

        if ($request->input('action') === 'delete_movie') {
            $movie_id = $request->input('movie_id');
            $movie = Movie::findOrFail($movie_id);
            $movie->delete();

            return redirect()->route('course.update', ['courseName' => $courseName, 'teacherName' => $teacherName])->with(['course' => $course, 'flash_message' => '動画を1つ削除しました']);
        }
        return redirect()->route('teacher.myCourse');
    }
}
