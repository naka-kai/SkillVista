<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);

        return view('Pages.User.Profile.show', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->user_name = $request->input('username');
        $user->save();
        return view('Pages.User.Profile.show', compact('user'));
    }
}
