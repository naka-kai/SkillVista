<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TestQuestionSeeder extends Seeder
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
                $test = $i . '_test';
                $params[$i - 1][$j - 1]['question'] = $test . '_question' . $j;
                $params[$i - 1][$j - 1]['test_id'] = $i;
                $params[$i - 1][$j - 1]['created_by'] = 'ああ';
                $params[$i - 1][$j - 1]['updated_by'] = 'ああ';
                $params[$i - 1][$j - 1]['created_at'] = Carbon::now();
                $params[$i - 1][$j - 1]['updated_at'] = Carbon::now();
            }
        }

        $params = array_reduce($params, 'array_merge', []);

        foreach ($params as $param) {
            DB::table('test_questions')->insert($param);
        }
    }
}
