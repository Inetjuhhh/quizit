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

        foreach($users as $user){
            foreach($quizes as $quiz){
                $rand = rand(0, 1);
                if($rand === 0){
                    continue;
                }
                else{
                    $userQuiz = new \App\Models\UserQuiz();
                    $userQuiz->user_id = $user->id;
                    $userQuiz->quiz_id = $quiz->id;
                    $userQuiz->save();
                }
            }
        }
    }
}
