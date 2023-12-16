<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testQuestion()
    {
        return view('Pages.User.Test.question');
    }

    public function testAnswer()
    {
        return view('Pages.User.Test.answer');
    }
}
