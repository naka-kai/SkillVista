<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
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

        // チャプターの並び替え
        $chapter_data = [];
        if ($request->has('chapterSorted')) {
            $chapterSorted_data = $request->input('chapterSorted');
            // dd($chapterSorted_data);
            try {
                DB::beginTransaction();

                foreach ($course->chapters as $key => $chapter) {
                    $chapter_data [] = [
                        'id' => $chapterSorted_data[$key],
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
    }
}
