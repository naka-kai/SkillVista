<?php

namespace App\Http\View\Composers;

use App\Models\Coursecategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserComposer
{
    public function compose(View $view)
    {
        $view->with([
            'loginUser' => Auth::guard('user'),
            'loginTeacher' => Auth::guard('teacher'),
            'categories' => Coursecategory::select('coursecategory')->get(),
        ]);
    }
}