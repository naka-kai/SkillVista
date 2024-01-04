<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChapterSeeder extends Seeder
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

        for ($i = 1; $i <= 10; $i++) {
            foreach ($chapter_sub_titles as $key => $chapter_sub_title) {
                $chapter_title = $i . '_' . $chapter_sub_title;

                $params[$i - 1][$key]['title'] = $chapter_title;
                $params[$i - 1][$key]['course_id'] = $i;
                $params[$i - 1][$key]['created_by'] = 'ああ';
                $params[$i - 1][$key]['updated_by'] = 'ああ';
                $params[$i - 1][$key]['created_at'] = Carbon::now();
                $params[$i - 1][$key]['updated_at'] = Carbon::now();
            }
        }

        $params = array_reduce($params, 'array_merge', []);


        foreach ($params as $param) {
            // 作成者と更新者
            // switch ($param['course_id']) {
            //     case 1:
            //         $param['created_by'] = 'ああ';
            //         $param['updated_by'] = 'ああ';
            //         break;
            //     case 2:
            //         $param['created_by'] = 'いい';
            //         $param['updated_by'] = 'いい';
            //         break;
            //     case 3:
            //         $param['created_by'] = 'うう';
            //         $param['updated_by'] = 'うう';
            //         break;
            //     case 4:
            //         $param['created_by'] = 'ええ';
            //         $param['updated_by'] = 'ええ';
            //         break;
            //     case 5:
            //         $param['created_by'] = 'おお';
            //         $param['updated_by'] = 'おお';
            //         break;
            //     case 6:
            //         $param['created_by'] = 'かか';
            //         $param['updated_by'] = 'かか';
            //         break;
            //     case 7:
            //         $param['created_by'] = 'きき';
            //         $param['updated_by'] = 'きき';
            //         break;
            //     case 8:
            //         $param['created_by'] = 'くく';
            //         $param['updated_by'] = 'くく';
            //         break;
            //     case 9:
            //         $param['created_by'] = 'けけ';
            //         $param['updated_by'] = 'けけ';
            //         break;
            //     case 10:
            //         $param['created_by'] = 'ここ';
            //         $param['updated_by'] = 'ここ';
            //         break;
            // }

            DB::table('chapters')->insert($param);
        }
    }
}
