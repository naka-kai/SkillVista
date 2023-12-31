<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $chapter_sub_titles = [
            'aaa',
            'bbb',
            'ccc',
            'ddd',
            'eee',
        ];
        
        $params = [
            []
        ];

        $chapter_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            foreach ($chapter_sub_titles as $chapter_key => $chapter_sub_title) {
                $params[$i - 1][$chapter_key]['title'] = $i . '_' . $chapter_sub_title . '_test';
                $params[$i - 1][$chapter_key]['chapter_id'] = $chapter_id;
                $params[$i - 1][$chapter_key]['created_at'] = Carbon::now();
                $params[$i - 1][$chapter_key]['updated_at'] = Carbon::now();
                $params[$i - 1][$chapter_key]['created_by'] = 'ああ';
                $params[$i - 1][$chapter_key]['updated_by'] = 'ああ';
                $chapter_id++;
            }
        }

        $params = array_reduce($params, 'array_merge', []);

        foreach ($params as $param) {
            DB::table('tests')->insert($param);
        }
    }
}
