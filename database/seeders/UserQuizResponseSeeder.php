<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserQuizResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //haal alle userQuizAttempts op behalve diegene met id = 2

        // $allUserQuizAttempts = \App\Models\UserQuizAttempt::all();
        // $userQuizAttempts = $allUserQuizAttempts->filter(function($userQuizAttempt){
        //     return $userQuizAttempt->id !== 2;
        // });

        // $questionsMultiple = Question::where('type_id', 1)->get();

        // $questionsOpen = \App\Models\Question::where('type_id', 4)->get();
        // $openAnswer = ['banaan', 'appel', 'peer', 'kiwi', 'mango', 'ananas', 'druif', 'sinaasappel', 'citroen', 'mandarijn'];

        // foreach($userQuizAttempts as $userQuizAttempt){
        //     $questions = $userQuizAttempt->attempt->quiz->questions;
        //     foreach($questions as $question){
        //         if($question->type->type == 'meerkeuze'){
        //             $answer = $question->answers->random();
        //             $correctAnswer = $answer->is_correct;
        //                 $userQuizResponse = new \App\Models\UserQuizResponse();
        //                 $userQuizResponse->user_quiz_attempt_id = $userQuizAttempt->id;
        //                 $userQuizResponse->question_id = $question->id;
        //                 $userQuizResponse->answer_id = $question->answers->random()->id;
        //                 $userQuizResponse->open_answer = null;
        //                 $userQuizResponse->is_correct = $correctAnswer;
        //                 $userQuizResponse->save();
        //         }
        //         elseif($question->type->type === 'open'){
        //             $userQuizResponse = new \App\Models\UserQuizResponse();
        //             $userQuizResponse->user_quiz_attempt_id = $userQuizAttempt->id;
        //             $userQuizResponse->question_id = $question->id;
        //             $userQuizResponse->answer_id = null;
        //             $userQuizResponse->open_answer = $openAnswer[array_rand($openAnswer)];
        //             $userQuizResponse->save();
        //         }
        //     }
        // }

        $userQuizResponse = new \App\Models\UserQuizResponse();
        $userQuizResponse->user_quiz_attempt_id = 2;
        $userQuizResponse->question_id = 13;
        $userQuizResponse->answer_id = 50;
        $userQuizResponse->open_answer = null;
        $userQuizResponse->is_correct = false;
        $userQuizResponse->save();

        $userQuizResponse = new \App\Models\UserQuizResponse();
        $userQuizResponse->user_quiz_attempt_id = 2;
        $userQuizResponse->question_id = 14;
        $userQuizResponse->answer_id = 53;
        $userQuizResponse->open_answer = null;
        $userQuizResponse->is_correct = true;
        $userQuizResponse->save();

        $userQuizResponse = new \App\Models\UserQuizResponse();
        $userQuizResponse->user_quiz_attempt_id = 2;
        $userQuizResponse->question_id = 27;
        $userQuizResponse->answer_id = null;
        $userQuizResponse->open_answer = 'Britney Spears';
        $userQuizResponse->is_correct   = false;
        $userQuizResponse->save();

        $userQuizResponse = new \App\Models\UserQuizResponse();
        $userQuizResponse->user_quiz_attempt_id = 2;
        $userQuizResponse->question_id = 28;
        $userQuizResponse->answer_id = null;
        $userQuizResponse->open_answer = 'Acda en de Munnik';
        $userQuizResponse->is_correct   = null;
        $userQuizResponse->save();

        $userQuizResponse = new \App\Models\UserQuizResponse();
        $userQuizResponse->user_quiz_attempt_id = 2;
        $userQuizResponse->question_id = 29;
        $userQuizResponse->answer_id = null;
        $userQuizResponse->open_answer = 'Dreetje Hazes';
        $userQuizResponse->is_correct   = false;
        $userQuizResponse->save();

        $userQuizResponse = new \App\Models\UserQuizResponse();
        $userQuizResponse->user_quiz_attempt_id = 2;
        $userQuizResponse->question_id = 30;
        $userQuizResponse->answer_id = null;
        $userQuizResponse->open_answer = 'De poemas';
        $userQuizResponse->is_correct   = false;
        $userQuizResponse->save();

        $userQuizResponse = new \App\Models\UserQuizResponse();
        $userQuizResponse->user_quiz_attempt_id = 2;
        $userQuizResponse->question_id = 31;
        $userQuizResponse->answer_id = null;
        $userQuizResponse->open_answer = 'Die young';
        $userQuizResponse->is_correct   = true;
        $userQuizResponse->save();
    }
}
