<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Course;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coursecategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'course_category',
    ];

    public function courses(): BelongsToMany {
        return $this->belongsToMany(Course::class);
    }
}
