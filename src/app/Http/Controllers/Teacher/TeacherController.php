<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function myCourse(Request $request, $teacherName)
    {
        $teacher_id = Auth::guard('teacher')->id();

        // 自分の作成したコースのみ表示
        $courses = Course::with(['teacher', 'rates'])
            ->where('teacher_id', $teacher_id)
            ->get();

        return view('Pages.Teacher.my_course', compact('courses', 'teacherName'));
    }
}
