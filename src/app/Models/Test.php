<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;
use App\Models\TestQuestion;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'chapter_id',
    ];

    public function chapter() {
        return $this->belongsTo(Chapter::class);
    }

    public function test_questions() {
        return $this->hasMany(TestQuestion::class);
    }
}
