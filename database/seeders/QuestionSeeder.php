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
        $question->type_id = 1;
        $question->created_by = 1;
        $question->save();

        $question = new \App\Models\Question();
        $question->question = 'Wie is de leukste collega?';
        $question->type_id = 1;
        $question->created_by = 1;
        $question->save();

        $faker = Fake('nl_NL');
        $users = \App\Models\User::all();
        for ($i = 0; $i < 10; $i++) {
            $question = new \App\Models\Question();
            $question->question = $faker->sentence();
            $question->type_id = rand(1, 4);
            $question->created_by = rand(1, (count($users)-1));
            $question->save();
        }

        $questions = \App\Models\Question::all();
        foreach($questions as $question){
            $reviewQuestion = new \App\Models\ReviewQuestion();
            $reviewQuestion->question_id = $question->id;
            $reviewQuestion->score = rand(1, 5);
            $reviewQuestion->save();
        }

    }
}
