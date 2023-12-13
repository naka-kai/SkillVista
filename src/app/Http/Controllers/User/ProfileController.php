<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view('Pages.User.Profile.show');
    }

    public function edit()
    {
        return view('Pages.User.Profile.edit');
    }

    public function editConfirm()
    {
        return view('Pages.User.Profile.edit_confirm');
    }

    public function update()
    {
        $userName = 'userName';
        return redirect()->route('user.profile.show', compact('userName'));
    }
}
