<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Rate;

class CourseUser extends Pivot
{
    protected $table = 'course_user';

    public function rate() {
        return $this->belongsTo(Rate::class);
    }
}
