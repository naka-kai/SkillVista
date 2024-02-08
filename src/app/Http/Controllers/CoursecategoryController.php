<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursecategoryController extends Controller
{
    public function show($id)
    {
        $courses = Course::with(['teacher', 'rates'])->get();
            // ->where('title', '=', '')
            // ->paginate(10);
        dd($courses[0]->coursecategories);
    }
}
