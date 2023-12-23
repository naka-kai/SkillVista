<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Coursecategory;
use App\Models\CourseUser;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TeacherSeeder::class,
            UserSeeder::class,
            CoursecategorySeeder::class,
            CourseSeeder::class,
            CourseUserSeeder::class,
            RateSeeder::class,
            CourseRateSeeder::class,
            CourseCoursecategorySeeder::class,
            ChapterSeeder::class,
            MovieSeeder::class,
            CommentSeeder::class,
            TestSeeder::class,
            TestQuestionSeeder::class,
            TestAnswerSeeder::class,
        ]);
    }
}
