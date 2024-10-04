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

        $answer = new \App\Models\Answer();
        $answer->question_id = 1;
        $answer->answer = 'The == operator checks only for equality in value whereas === checks for equality in value and type.';
        $answer->is_correct = true;
        $answer->save();

        $answer = new \App\Models\Answer();
        $answer->question_id = 1;
        $answer->answer = 'Zijn hetzelfde';
        $answer->is_correct = false;
        $answer->save();

        $answer = new \App\Models\Answer();
        $answer->question_id = 1;
        $answer->answer = 'Geen verschil';
        $answer->is_correct = false;
        $answer->save();

        $answer = new \App\Models\Answer();
        $answer->question_id = 1;
        $answer->answer = 'De ene is plus de andere min';
        $answer->is_correct = false;
        $answer->save();

        $answer = new \App\Models\Answer();
        $answer->question_id = 2;
        $answer->answer = 'Elton';
        $answer->is_correct = true;
        $answer->save();

        $answer = new \App\Models\Answer();
        $answer->question_id = 2;
        $answer->answer = 'Fedde';
        $answer->is_correct = true;
        $answer->save();

        $answer = new \App\Models\Answer();
        $answer->question_id = 2;
        $answer->answer = 'Tim';
        $answer->is_correct = true;
        $answer->save();

        $answer = new \App\Models\Answer();
        $answer->question_id = 2;
        $answer->answer = 'Ine';
        $answer->is_correct = true;
        $answer->save();

        $questions = \App\Models\Question::all();
        foreach($questions as $question){
            if($question->id == 1 || $question->id == 2){
                continue;
            }
            for($i = 0; $i < 3; $i++){
                \App\Models\Answer::create([
                    'question_id' => $question->id,
                    'answer' => $faker->sentence,
                    'is_correct' => false
                ]);
            }
            \App\Models\Answer::create([
                'question_id' => $question->id,
                'answer' => $faker->sentence,
                'is_correct' => true
            ]);

        }
    }
}
