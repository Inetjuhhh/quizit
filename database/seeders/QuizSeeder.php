<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quizes = [
            [
                'author_id' => 1,
                'name' => 'Quiz 1',
                'description' => 'This is quiz 1',
                'starts_at' => now(),
                'ends_at' => now()->addDays(1),
            ],
            [
                'author_id' => 1,
                'name' => 'Quiz 2',
                'description' => 'This is quiz 2',
                'starts_at' => now(),
                'ends_at' => now()->addDays(1),
            ],
            [
                'author_id' => 1,
                'name' => 'Quiz 3',
                'description' => 'This is quiz 3',
                'starts_at' => now(),
                'ends_at' => now()->addDays(1),
            ],
            [
                'author_id' => 3,
                'name' => 'Quiz 4',
                'description' => 'This is quiz 4',
                'starts_at' => now(),
                'ends_at' => now()->addDays(1),
            ],
            [
                'author_id' => 3,
                'name' => 'Quiz 5',
                'description' => 'This is quiz 5',
                'starts_at' => now(),
                'ends_at' => now()->addDays(1),
            ],
            [
                'author_id' => 3,
                'name' => 'Quiz 6',
                'description' => 'This is quiz 6',
                'starts_at' => now(),
                'ends_at' => now()->addDays(1),
            ],
            
        ];

        foreach ($quizes as $quiz) {
            \App\Models\Quiz::create($quiz);
        }

        $questions = \App\Models\Question::all();
        $quizes = \App\Models\Quiz::all();

        foreach ($quizes as $quiz) {
            for($i = 0; $i < 5; $i++){
                $question = $questions->whereNotIn('id', $quiz->questions->pluck('id'))->random();

                if (!$quiz->questions->contains($question->id)) {
                    $quiz->questions()->attach($question->id);
                }
            }
        }
    }
}
