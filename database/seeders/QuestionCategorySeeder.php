<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = \App\Models\Category::all();
        $questions = \App\Models\Question::all();
        foreach ($questions as $question) {
            $question->categories()->attach($categories->random()->id);
        }
    }
}
