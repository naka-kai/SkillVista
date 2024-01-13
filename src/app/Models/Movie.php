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
        'movie_title',
        'movie',
        'chapter_id',
        'second',
        'created_by',
        'updated_by',
    ];

    public function chapter() {
        return $this->belongsTo(Chapter::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
