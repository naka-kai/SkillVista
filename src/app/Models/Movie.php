<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;
use App\Models\Comment;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'movie',
        'chapter_id',
    ];

    public function chapter() {
        return $this->belongsTo(Chapter::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
