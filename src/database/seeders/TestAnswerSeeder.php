<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TestAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                []
            ]
        ];

        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                for ($k = 1; $k <= 3; $k++) {
                    $test = $i . '_test';
                    $params[$i - 1][$j - 1][$k - 1]['test_question_id'] = $i;
                    $params[$i - 1][$j - 1][$k - 1]['answer'] = $test . '_question' . $j . '_answer' . $k;
                    $params[$i - 1][$j - 1][$k - 1]['created_by'] = 'ああ';
                    $params[$i - 1][$j - 1][$k - 1]['updated_by'] = 'ああ';
                    $params[$i - 1][$j - 1][$k - 1]['created_at'] = Carbon::now();
                    $params[$i - 1][$j - 1][$k - 1]['updated_at'] = Carbon::now();

                    if ($k % 3 === 0) {
                        $params[$i - 1][$j - 1][$k - 1]['is_correct'] = 1;
                    } else {
                        $params[$i - 1][$j - 1][$k - 1]['is_correct'] = 0;
                    }
                }
            }
        }

        $params = array_reduce($params, 'array_merge', []);
        $params = array_reduce($params, 'array_merge', []);

        foreach ($params as $param) {
            DB::table('test_answers')->insert($param);
        }
    }
}
