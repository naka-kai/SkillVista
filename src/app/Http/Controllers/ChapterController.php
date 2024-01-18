<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\Course;

class ChapterController extends Controller
{
    public function update(Request $request, $teacherName, $courseName)
    {
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

        // foreach ($request->input('seq') as $key => $val) {
        //     $chapter = Chapter::findOrFail()
        // }

        dd($request);
    }
}
