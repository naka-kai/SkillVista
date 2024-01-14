<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Coursecategory;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function course_categories(): BelongsToMany {
        return $this->belongsToMany(Coursecategory::class);
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function rates(): BelongsToMany {
        return $this->belongsToMany(Rate::class, 'course_user');
    }

    public function purchased(): BelongsToMany {
        return $this->belongsToMany(User::class, 'course_user')
            ->withPivot('status')
            ->wherePivot('status', 3);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
