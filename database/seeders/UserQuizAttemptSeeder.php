<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserQuizAttemptSeeder extends Seeder
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
        $attempts = \App\Models\QuizAttempt::all();

        // foreach($usersNotAdmin as $user){
        //     foreach($attempts as $attempt){
        //         $rand = rand(0, 1);
        //         if($rand === 0){
        //             continue;
        //         }
        //         else{

        //             $userQuizAttempt = new \App\Models\UserQuizAttempt();
        //             $userQuizAttempt->user_id = $user->id;
        //             $userQuizAttempt->attempt_id = $attempt->id;
        //             $userQuizAttempt->save();
        //         }
        //     }
        // }

        $userQuizAttempt = new \App\Models\UserQuizAttempt();
        $userQuizAttempt->attempt_id = 5;
        $userQuizAttempt->user_id = 1;
        $userQuizAttempt->save();

        $userQuizAttempt = new \App\Models\UserQuizAttempt();
        $userQuizAttempt->attempt_id = 5;
        $userQuizAttempt->user_id = 3;
        $userQuizAttempt->completed_at = now();
        $userQuizAttempt->save();

        $userQuizAttempt = new \App\Models\UserQuizAttempt();
        $userQuizAttempt->attempt_id = 5;
        $userQuizAttempt->user_id = 4;
        $userQuizAttempt->save();

        $userQuizAttempt = new \App\Models\UserQuizAttempt();
        $userQuizAttempt->attempt_id = 5;
        $userQuizAttempt->user_id = 5;
        $userQuizAttempt->save();

        $userQuizAttempt = new \App\Models\UserQuizAttempt();
        $userQuizAttempt->attempt_id = 5;
        $userQuizAttempt->user_id = 6;
        $userQuizAttempt->save();

        $userQuizAttempt = new \App\Models\UserQuizAttempt();
        $userQuizAttempt->attempt_id = 5;
        $userQuizAttempt->user_id = 7;
        $userQuizAttempt->save();
    }
}
