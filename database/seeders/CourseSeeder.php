<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course = new \App\Models\Course();
        $course->name = 'WEB development';
        $course->save();

        $course = new \App\Models\Course();
        $course->name = 'Mobile Development';
        $course->save();

        $course = new \App\Models\Course();
        $course->name = 'Native Development';
        $course->save();
    }
}
