<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show()
    {
        return view('Pages.Course.course');
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
}
