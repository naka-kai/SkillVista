<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    // TOPページ
    public function top ()
    {
        return view('Pages.top');
    }
}
