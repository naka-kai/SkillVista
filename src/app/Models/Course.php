<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Coursecategory;
use App\Models\User;
use App\Models\Teacher;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'outline',
        'teacher_id',
        'category_id',
        'progress',
        'target',
        'need',
        'thumbnail',
        'course_url',
    ];

    public function chapters() {
        return $this->hasMany(Chapter::class);
    }

    public function rates(): BelongsToMany {
        return $this->belongsToMany(Rate::class);
    }

    public function course_categories(): BelongsToMany {
        return $this->belongsToMany(Coursecategory::class);
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
