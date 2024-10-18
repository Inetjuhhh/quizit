<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
        $usersNotAdmin = $users->filter(function($user){
            return $user->rol_id !== 1 || $user->rol_id !== 2;
        });
        $quizes = \App\Models\Quiz::all();
        $questionsMultiple = Question::where('type_id', 1)->get();

        $questionsOpen = \App\Models\Question::where('type_id', 4)->get();
        $openAnswer = ['banaan', 'appel', 'peer', 'kiwi', 'mango', 'ananas', 'druif', 'sinaasappel', 'citroen', 'mandarijn'];

        foreach($users as $user){
            foreach($quizes as $quiz){
                $questions = $quiz->questions;
                foreach($questions as $question){
                    if($question->type->type == 'meerkeuze'){
                        $answer = $question->answers->random();
                        $correctAnswer = $answer->is_correct;
                            $userQuiz = new \App\Models\UserQuiz();
                            $userQuiz->user_id = $user->id;
                            $userQuiz->quiz_id = $quiz->id;
                            $userQuiz->question_id = $question->id;
                            $userQuiz->answer_id = $question->answers->random()->id;
                            $userQuiz->open_answer = null;
                            $userQuiz->is_correct = $correctAnswer;
                            $userQuiz->score = rand(0, 3);
                            $userQuiz->time = rand(0, 100);
                            $userQuiz->save();
                    }
                    elseif($question->type->type === 'open'){
                        $userQuiz = new \App\Models\UserQuiz();
                        $userQuiz->user_id = $user->id;
                        $userQuiz->quiz_id = $quiz->id;
                        $userQuiz->question_id = $question->id;
                        $userQuiz->answer_id = null;
                        $userQuiz->open_answer = $openAnswer[array_rand($openAnswer)];
                        $userQuiz->score = rand(0, 3);
                        $userQuiz->time = rand(0, 100);
                        $userQuiz->save();
                    }
                }
            }
        }
    }
}
