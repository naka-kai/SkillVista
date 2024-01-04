<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class TopController extends Controller
{
    /**
     * TOPページ コース一覧
     * 購入済み（受講済み）が多いコースほど上に表示
     *
     * @return Collection
     */
    public function top ()
    {

        // 直近1ヶ月間で受講数が多い順でソート
        $courses = Course::with(['purchased', 'teacher', 'rates'])
            ->leftJoin('course_user', 'courses.id', '=', 'course_user.course_id')
            ->select('courses.*', DB::raw('SUM(case when course_user.status = 3 then 1 else 0 end) as purchased_count'))
            ->groupBy('courses.id')
            ->orderByDesc('purchased_count')
            ->get();

        return view('Pages.top', compact('courses'));
    }

    /**
     * ログイン選択ページ（ユーザーor教師）
     */
    public function selectLogin ()
    {
        return view('Pages.select_login');
    }
}
