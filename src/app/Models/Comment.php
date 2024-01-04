<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'comment',
        'image',
        'movie_id',
        'who_id',
        'who_flg',
    ];

    public function movie() {
        return $this->belongsTo(Movie::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
