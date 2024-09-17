<?php

namespace Database\Seeders;

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

        foreach ($users as $user) {
                $quiz = $quizes->random();
                $user->quizes()->attach($quiz->id);
                $user->quizes()->updateExistingPivot($quiz->id, ['score' => rand(0, 3)]);
        }
    }
}
