<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view('Pages.Teacher.Profile.show');
    }

    public function edit()
    {
        return view('Pages.Teacher.Profile.edit');
    }

    public function editConfirm()
    {
        return view('Pages.Teacher.Profile.edit_confirm');
    }

    public function update()
    {
        $teacherName = 'teacherName';

        return redirect()->route('teacher.profile.show', compact('teacherName'));
    }
}
