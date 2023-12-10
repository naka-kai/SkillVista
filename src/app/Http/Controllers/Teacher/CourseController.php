<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function myCourse()
    {
        return view('Pages.Teacher.Course.my_course');
    }

    public function create()
    {
        return view('Pages.Teacher.Course.create');
    }

    public function createConfirm()
    {
        return view('Pages.Teacher.Course.create_confirm');
    }

    public function store()
    {
        $courseName = 'courseName';
        $teacherName = 'teacherName';

        return redirect()->route('teacher.course.myCourse', compact('courseName', 'teacherName'));
    }

    public function edit()
    {
        return view('Pages.Teacher.Course.edit');
    }

    public function editConfirm()
    {
        return view('Pages.Teacher.Course.edit_confirm');
    }

    public function update()
    {
        $courseName = 'courseName';
        $teacherName = 'teacherName';

        return redirect()->route('teacher.course.myCourse', compact('courseName', 'teacherName'));
    }

    public function destroy()
    {
        return redirect()->route('teacher.course.myCourse');
    }
}
