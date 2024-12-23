<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Testing\Fakes\Fake;

class QuestionOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Fake('nl_NL');
        $question = new \App\Models\Question();
        $question->question = 'Beschrijf wat een border-bottom doet';
        $question->type_id = 4;
        $question->created_by = 1;
        $question->save();

        $question = new \App\Models\Question();
        $question->question = 'Met welke value voeg ik een gestippelde rand toe?';
        $question->type_id = 4;
        $question->created_by = 1;
        $question->save();

        $answer = new \App\Models\Answer();
        $answer->question_id = 13;
        $answer->answer = 'Voegt een lijn toe aan de onderkant van een element';
        $answer->save();

        $answer = new \App\Models\Answer();
        $answer->question_id = 14;
        $answer->answer = 'dotted';
        $answer->save();

        for($i = 15; $i < 25; $i++){
            $question = new \App\Models\Question();
            $question->question = $faker->sentence();
            $question->type_id = 4;
            $question->created_by = 1;
            $question->save();

            $answer = new \App\Models\Answer();
            $answer->question_id = $i;
            $answer->answer =  $faker->sentence();
            $answer->save();
        }

        $question = new \App\Models\Question();
        $question->question = 'Door wie wordt het nummer Sweet Goodbyes gezongen?';
        $question->type_id = 4;
        $question->created_by = 1;
        $question->save();

        $answer = new \App\Models\Answer();
        $answer->question_id = 27;
        $answer->answer = 'Krezip';
        $answer->is_correct = true;
        $answer->save();

        $question = new \App\Models\Question();
        $question->question = 'Door wie wordt het nummer Het regent zonnestralen gezongen?';
        $question->type_id = 4;
        $question->created_by = 1;
        $question->save();

        $answer = new \App\Models\Answer();
        $answer->question_id = 28;
        $answer->answer = 'Acda en de Munnik';
        $answer->is_correct = true;
        $answer->save();

        $question = new \App\Models\Question();
        $question->question = 'Door wie wordt het nummer Zij gelooft in mij gezongen?';
        $question->type_id = 4;
        $question->created_by = 1;
        $question->save();

        $answer = new \App\Models\Answer();
        $answer->question_id = 29;
        $answer->answer = 'André Hazes';
        $answer->is_correct = true;
        $answer->save();

        $question = new \App\Models\Question();
        $question->question = 'Door wie wordt het nummer Zij maakt het verschil gezongen?';
        $question->type_id = 4;
        $question->created_by = 1;
        $question->save();

        $answer = new \App\Models\Answer();
        $answer->question_id = 30;
        $answer->answer = 'De Poema\'s';
        $answer->is_correct = true;
        $answer->save();

        $question = new \App\Models\Question();
        $question->question = 'Noem een nummer van de band Sheppard';
        $question->type_id = 4;
        $question->created_by = 1;
        $question->save();

        $answer = new \App\Models\Answer();
        $answer->question_id = 31;
        $answer->answer = 'Geronimo';
        $answer->is_correct = true;
        $answer->save();



    }
}
