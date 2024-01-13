<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [],
        ];

        $chapter_sub_titles = [
            'aaa',
            'bbb',
            'ccc',
            'ddd',
            'eee',
        ];

        $movie_sub_titles = [
            'xxx',
            'yyy',
            'zzz',
        ];

        $chapter_id = 1;
        for ($i = 1; $i <= 5; $i++) {
            foreach ($chapter_sub_titles as $chapter_key => $chapter_sub_title) {
                foreach ($movie_sub_titles as $movie_key => $movie_sub_title) {
                    $movie_title = $i.'_'.$chapter_sub_title . '_' . $movie_sub_title;
                    $params[$i - 1][$chapter_key][$movie_key]['movie_title'] = $movie_title;
                    $params[$i - 1][$chapter_key][$movie_key]['movie'] = 'https://www.' . $movie_title;
                    $params[$i - 1][$chapter_key][$movie_key]['chapter_id'] = $chapter_id;
                    $params[$i - 1][$chapter_key][$movie_key]['second'] = 7200;
                    $params[$i - 1][$chapter_key][$movie_key]['created_by'] = 'ああ';
                    $params[$i - 1][$chapter_key][$movie_key]['updated_by'] = 'ああ';
                    $params[$i - 1][$chapter_key][$movie_key]['created_at'] = Carbon::now();
                    $params[$i - 1][$chapter_key][$movie_key]['updated_at'] = Carbon::now();
                    // switch ($chapter_sub_title) {
                    //     case 'aaa':
                    //         $params[$i - 1]['created_by'] = 'ああ';
                    //         $params[$i - 1]['updated_by'] = 'ああ';
                    //         break;
                    //     case 'bbb':
                    //         $params[$i - 1]['created_by'] = 'いい';
                    //         $params[$i - 1]['updated_by'] = 'いい';
                    //         break;
                    //     case 'ccc':
                    //         $params[$i - 1]['created_by'] = 'うう';
                    //         $params[$i - 1]['updated_by'] = 'うう';
                    //         break;
                    //     case 'ddd':
                    //         $params[$i - 1]['created_by'] = 'ええ';
                    //         $params[$i - 1]['updated_by'] = 'ええ';
                    //         break;
                    //     case 'eee':
                    //         $params[$i - 1]['created_by'] = 'おお';
                    //         $params[$i - 1]['updated_by'] = 'おお';
                    //         break;
                    // }
                }
                $chapter_id++;
            }
        }

        $params = array_reduce($params, 'array_merge', []);
        $params = array_reduce($params, 'array_merge', []);

        foreach ($params as $param) {            

            DB::table('movies')->insert($param);
        }
    }
}
