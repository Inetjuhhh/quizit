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
        $userQuizAttempts = \App\Models\UserQuizAttempt::all();
        $questionsMultiple = Question::where('type_id', 1)->get();

        $questionsOpen = \App\Models\Question::where('type_id', 4)->get();
        $openAnswer = ['banaan', 'appel', 'peer', 'kiwi', 'mango', 'ananas', 'druif', 'sinaasappel', 'citroen', 'mandarijn'];

        foreach($userQuizAttempts as $userQuizAttempt){
            $questions = $userQuizAttempt->attempt->quiz->questions;
            foreach($questions as $question){
                if($question->type->type == 'meerkeuze'){
                    $answer = $question->answers->random();
                    $correctAnswer = $answer->is_correct;
                        $userQuizResponse = new \App\Models\UserQuizResponse();
                        $userQuizResponse->user_quiz_attempt_id = $userQuizAttempt->id;
                        $userQuizResponse->question_id = $question->id;
                        $userQuizResponse->answer_id = $question->answers->random()->id;
                        $userQuizResponse->open_answer = null;
                        $userQuizResponse->is_correct = $correctAnswer;
                        $userQuizResponse->save();
                }
                elseif($question->type->type === 'open'){
                    $userQuizResponse = new \App\Models\UserQuizResponse();
                    $userQuizResponse->user_quiz_attempt_id = $userQuizAttempt->id;
                    $userQuizResponse->question_id = $question->id;
                    $userQuizResponse->answer_id = null;
                    $userQuizResponse->open_answer = $openAnswer[array_rand($openAnswer)];
                    $userQuizResponse->save();
                }
            }
        }
    }
}
