<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizAttemptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quizes = \App\Models\Quiz::all();

        foreach($quizes as $quiz){
            $rand = rand(0, 1);
            if($rand === 0){
                continue;
            }
            else{
                $quizAttempt = new \App\Models\QuizAttempt();
                $quizAttempt->quiz_id = $quiz->id;
                $quizAttempt->prepared_by = rand(1, 10);
                $quizAttempt->starting_at = now()->subDays(rand(0, 10));
                $quizAttempt->ending_at = now()->addDays(rand(0, 10));
                $quizAttempt->status = ['pending', 'completed'][rand(0, 1)];
                $quizAttempt->save();
            }
        }

        $quizAttempt = new \App\Models\QuizAttempt();
        $quizAttempt->quiz_id = 7;
        $quizAttempt->prepared_by = 1;
        $quizAttempt->starting_at = now()->subDays(10);
        $quizAttempt->ending_at = now()->addDays(10);
        $quizAttempt->status = 'pending';
        $quizAttempt->save();
    }
}
