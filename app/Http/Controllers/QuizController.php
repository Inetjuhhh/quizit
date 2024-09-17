<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizes = Quiz::all();
        return view('quizes.index')->with('quizes', $quizes);
    }

    public function show(string $id)
    {
        $quiz = Quiz::findOrFail($id);
        $questions = $quiz->questions;
        $categories = [];
        foreach ($questions as $question) {
            if (!in_array($question->category->name, $categories)) {
                $categories[] = $question->category->name;
            }
        }
        return view('quizes.show')
            ->with('quiz', $quiz)
            ->with('categories', $categories);
    }

    public function play(string $id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('quizes.play')->with('quiz', $quiz);
    }

    public function checkMultiple(string $id)
    {

        $quiz = Quiz::findOrFail($id);
        $questions = $quiz->questions;
        $score = 0;
        foreach ($questions as $question) {
            $answer = request()->input('question_' . $question->id);
            if ($answer == $question->correct_answer) {
                $score++;
            }
        }
        return view('quizes.result')
            ->with('score', $score)
            ->with('total', count($questions))
            ->with('quiz', $quiz);
    }
}
