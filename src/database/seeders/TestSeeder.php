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
        $params = [
            []
        ];

        for ($i = 1; $i <= 10; $i++) {
            $params[$i - 1]['title'] = $i . '_test';
            $params[$i - 1]['chapter_id'] = $i;
        }

        foreach ($params as $param) {

            // 作成日と更新日
            $param['created_at'] = Carbon::now();
            $param['updated_at'] = Carbon::now();

            // 作成者と更新者
            $param['created_by'] = 'ああ';
            $param['updated_by'] = 'ああ';

            DB::table('tests')->insert($param);
        }
    }
}
