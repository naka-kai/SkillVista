<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Coursecategory;
use App\Models\CourseCoursecategory;
use Illuminate\Http\Request;

class CoursecategoryController extends Controller
{
    public function show($categoryName)
    {
        $category = Coursecategory::where('coursecategory', $categoryName)
            ->first();
        $category_id = $category->id;
        $course_ids = CourseCoursecategory::where('coursecategory_id', $category_id)
            ->pluck('id');
        $courses = Course::with(['teacher', 'rates'])
            ->whereIn('id', $course_ids)
            ->paginate(10);
        
        return view('Pages.top', compact('courses', 'categoryName'));
    }
}
