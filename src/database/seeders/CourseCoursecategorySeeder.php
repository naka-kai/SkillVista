<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CourseCoursecategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_coursecategories')->insert([
            [
                'course_id' => 1, // HTML1
                'coursecategory_id' => 1, // HTML
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 2, // JavaScript1
                'coursecategory_id' => 3, // Javascript
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 3, // PHP1
                'coursecategory_id' => 5, // PHP
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 4, // HTML2
                'coursecategory_id' => 1, // HTML
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 4, // HTML2
                'coursecategory_id' => 2, // CSS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 5, // JavaScript2
                'coursecategory_id' => 3, // JavaScript
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 5, // JavaScript2
                'coursecategory_id' => 4, // Vue.js
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 6, // PHP2
                'coursecategory_id' => 5, // PHP
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 6, // PHP2
                'coursecategory_id' => 6, // Laravel
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 7, // CSS
                'coursecategory_id' => 2, // CSS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 8, // Vue.js
                'coursecategory_id' => 4, // Vue.js
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 9, // Laravel
                'coursecategory_id' => 1, // HTML
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 9, // Laravel
                'coursecategory_id' => 2, // CSS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 9, // Laravel
                'coursecategory_id' => 3, // JavaScript
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 9, // Laravel
                'coursecategory_id' => 5, // PHP
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 9, // Laravel
                'coursecategory_id' => 6, // Laravel
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 10, // TailwindCSS
                'coursecategory_id' => 1, // HTML
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 10, // TailwindCSS
                'coursecategory_id' => 2, // CSS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 10, // TailwindCSS
                'coursecategory_id' => 6, // Laravel
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => 10, // TailwindCSS
                'coursecategory_id' => 7, // TailwindCSS
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
