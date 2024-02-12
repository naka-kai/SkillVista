<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show($courseName, $commentId)
    {
        // Q & Aの一覧情報
        $qas = Comment::query('course_title', $courseName)
            ->where('id', $commentId)
            ->orWhere('parent_id', $commentId)
            ->get();
        
        // dd($qas);

        return view('Pages.comment', compact('courseName', 'commentId', 'qas'));
    }
}
