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
    public function top(Request $request)
    {

        // 直近1ヶ月間で受講数が多い順でソート
        $courses = Course::with(['purchased', 'teacher', 'rates'])
            ->leftJoin('course_user', 'courses.id', '=', 'course_user.course_id')
            ->select('courses.*', DB::raw('SUM(case when course_user.status = 3 then 1 else 0 end) as purchased_count'))
            ->groupBy('courses.id')
            ->orderByDesc('purchased_count')
            ->paginate(10);
        
        // キーワードから検索処理
        $keyword = $request->query('keyword');
        if(!empty($keyword)) {
            $courses = Course::with(['teacher', 'rates'])
                ->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('description', 'LIKE', "%{$keyword}%")
                ->paginate(10);
        }

        return view('Pages.top', compact('courses'));
    }

    /**
     * ログイン選択ページ（ユーザーor教師）
     */
    public function selectLogin()
    {
        return view('Pages.select_login');
    }
}
