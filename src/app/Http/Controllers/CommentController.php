<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Teacher;
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

        return view('Pages.Comment.show', compact('courseName', 'commentId', 'qas'));
    }

    public function create($courseName)
    {
        // Q & Aの情報
        $qa = Comment::where('course_title', $courseName)
            ->first();
        $teacher_id = Comment::where('who_flg', 1)
            ->pluck('who_id')
            ->first();
        $teacher = Teacher::where('id', $teacher_id)
            ->first();
        
        return view('Pages.Comment.create', compact('qa', 'courseName', 'teacher'));
    }
}
