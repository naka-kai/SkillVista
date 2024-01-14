<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Test;
use App\Models\Course;
use App\Models\Movie;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'course_id',
        'display_num',
    ];

    public function tests() {
        return $this->hasMany(Test::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function movies() {
        return $this->hasMany(Movie::class);
    }
}
