<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Testing\Fakes\Fake;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = \App\Models\Category::all();
        $question = new \App\Models\Question();
        $question->question = 'What is the difference between == and ===?';
        $question->category_id = rand(1, count($categories));
        $question->created_by = 1;
        $question->save();

        $faker = Fake('nl_NL');
        $users = \App\Models\User::all();
        for ($i = 0; $i < 10; $i++) {
            $question = new \App\Models\Question();
            $question->question = $faker->sentence();
            $question->category_id = rand(1, count($categories));
            $question->created_by = rand(1, (count($users)-1));
            $question->save();
        }
    }
}
