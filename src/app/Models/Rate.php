<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'rate',
        'comment',
    ];

    public function courses(): BelongsToMany {
        return $this->belongsToMany(Course::class);
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'course_user');
    }
}
