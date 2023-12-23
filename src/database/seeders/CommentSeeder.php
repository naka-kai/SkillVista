<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'title' => 'aaa',
                'comment' => 'aaaaa',
                'image' => '',
                'movie_id' => 1,
                'who_id' => 1,
                'who_flg' => 0,
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'bbb',
                'comment' => 'bbbbb',
                'image' => '',
                'movie_id' => 1,
                'who_id' => 2,
                'who_flg' => 1,
                'created_by' => 'いい',
                'updated_by' => 'いい',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'ccc',
                'comment' => 'ccccc',
                'image' => '',
                'movie_id' => 1,
                'who_id' => 1,
                'who_flg' => 0,
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
