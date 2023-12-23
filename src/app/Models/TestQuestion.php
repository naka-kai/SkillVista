<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Test;
use App\Models\TestAnswer;

class TestQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'test_id',
    ];

    public function test() {
        return $this->belongsTo(Test::class);
    }

    public function test_answers() {
        return $this->hasMany(TestAnswer::class);
    }
}
