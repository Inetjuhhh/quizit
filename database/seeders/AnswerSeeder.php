<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Fake('nl_NL');
        $questions = \App\Models\Question::all();
        foreach($questions as $question){
            for($i = 0; $i < 3; $i++){
                \App\Models\Answer::create([
                    'question_id' => $question->id,
                    'created_by' => $question->created_by,
                    'answer' => $faker->sentence,
                    'is_correct' => false
                ]);
            }
            \App\Models\Answer::create([
                'question_id' => $question->id,
                'created_by' => $question->created_by,
                'answer' => $faker->sentence,
                'is_correct' => true
            ]);

        }
    }
}
