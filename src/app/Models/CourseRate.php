<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class CourseRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'rate_id',
    ];
}
