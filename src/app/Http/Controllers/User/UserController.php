<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myCourse(Request $request, $userName)
    {
        $user_id = Auth::guard('user')->id();

        // 自分の購入済みコース（マイコース）のみ表示
        $courses = Course::with(['teacher', 'rates'])
            ->leftJoin('course_user', 'courses.id', '=', 'course_user.course_id')
            ->where('user_id', '=', $user_id)
            ->where('status', '=', '3')
            ->get();
        
        // マイコースに登録されている「タイトル」・「コースの軽い説明」の文字列から検索処理
        $keyword = $request->query('keyword');
        if(!empty($keyword)) {
            $courses = Course::with(['teacher', 'rates'])
                ->leftJoin('course_user', 'courses.id', '=', 'course_user.course_id')
                ->where('user_id', '=', $user_id)
                ->where('status', '=', '3')
                ->where(function ($query) use ($keyword) {
                    $query->where('title', 'LIKE', "%{$keyword}%")
                        ->orWhere('description', 'LIKE', "%{$keyword}%");
                })
                ->paginate(10);
        }

        return view('Pages.User.my_course', compact('courses', 'userName', 'keyword'));
    }

    public function wishList(Request $request, $userName)
    {
    $user_id = Auth::guard('user')->id();

        // 自分のお気に入りコースのみ表示
        $courses = Course::with(['teacher', 'rates'])
            ->leftJoin('course_user', 'courses.id', '=', 'course_user.course_id')
            ->where('user_id', '=', $user_id)
            ->where('status', '=', '1')
            ->get();
        
        // お気に入りコースに登録されている「タイトル」・「コースの軽い説明」の文字列から検索処理
        $keyword = $request->query('keyword');
        if(!empty($keyword)) {
            $courses = Course::with(['teacher', 'rates'])
                ->leftJoin('course_user', 'courses.id', '=', 'course_user.course_id')
                ->where('user_id', '=', $user_id)
                ->where('status', '=', '1')
                ->where(function ($query) use ($keyword) {
                    $query->where('title', 'LIKE', "%{$keyword}%")
                        ->orWhere('description', 'LIKE', "%{$keyword}%");
                })
                ->paginate(10);
        }
        
        return view('Pages.User.wish_list', compact('courses', 'userName', 'keyword'));
    }
}
