<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function myCourse()
    {
        return view('Pages.User.my_course');
    }

    public function wishList()
    {
        return view('Pages.User.wish_list');
    }
}
