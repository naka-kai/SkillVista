<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class TopController extends Controller
{
    // TOPページ
    public function top ()
    {
        // dd(Auth::user());
        // $user = Auth::user();
        // logger($user);
        return view('Pages.top');
    }

    // Login選択ページ
    public function selectLogin ()
    {
        return view('Pages.select_login');
    }
}
