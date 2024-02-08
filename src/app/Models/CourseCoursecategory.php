<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseCoursecategory extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'coursecategory_id',
    ];
}
