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
                'course_id' => 1,
                'name' => 'Quiz 1',
                'description' => 'This is quiz 1',            ],
            [
                'author_id' => 1,
                'course_id' => 1,
                'name' => 'Quiz 2',
                'description' => 'This is quiz 2',
            ],
            [
                'author_id' => 1,
                'course_id' => 2,
                'name' => 'Quiz 3',
                'description' => 'This is quiz 3',
            ],
            [
                'author_id' => 3,
                'course_id' => 1,
                'name' => 'Quiz 4',
                'description' => 'This is quiz 4',
            ],
            [
                'author_id' => 3,
                'course_id' => 2,
                'name' => 'Quiz 5',
                'description' => 'This is quiz 5',
            ],
            [
                'author_id' => 3,
                'course_id' => 3,
                'name' => 'Quiz 6',
                'description' => 'This is quiz 6',
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
        $quiz = new \App\Models\Quiz();
        $quiz->author_id = 1;
        $quiz->course_id = 1;
        $quiz->name = 'MuziekQuiz';
        $quiz->description = 'Dit is een super leuke test muziekquiz';
        $quiz->save();

        $quiz->questions()->attach([13, 14, 27, 28, 29, 30, 31]);


    }
}
