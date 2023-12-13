<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // 教師詳細ページ
    public function show ()
    {
        return view('Pages.teacher');
    }
}
