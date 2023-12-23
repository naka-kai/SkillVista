<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CoursecategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coursecategories')->insert([
            [
                'coursecategory' => 'HTML',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'coursecategory' => 'CSS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'coursecategory' => 'JavaScript',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'coursecategory' => 'Vue.js',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'coursecategory' => 'PHP',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'coursecategory' => 'Laravel',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'coursecategory' => 'TailwindCSS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
