<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert([
            [
                'rate' => 5,
                'comment' => 'とても良かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 3,
                'comment' => '普通',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 1,
                'comment' => 'とても悪かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 2,
                'comment' => '悪かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 4,
                'comment' => '良かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 3,
                'comment' => '普通',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 4,
                'comment' => '良かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 5,
                'comment' => 'とても良かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 1,
                'comment' => 'とても悪かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 5,
                'comment' => 'とても悪かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 5,
                'comment' => 'とても良かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 5,
                'comment' => 'とても良かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 5,
                'comment' => 'とても良かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 5,
                'comment' => 'とても良かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 5,
                'comment' => 'とても良かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 5,
                'comment' => 'とても良かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 5,
                'comment' => 'とても良かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 5,
                'comment' => 'とても良かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 5,
                'comment' => 'とても良かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'rate' => 5,
                'comment' => 'とても良かった',
                'created_by' => 'ああ',
                'updated_by' => 'ああ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
