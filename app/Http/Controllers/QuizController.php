<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
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
        $answers = request()->except('_token');


        $score = 0;
        $answerComplete = [];

        foreach($answers as  $question_id => $answer){
            $question = Question::find($question_id);
            $answerTo = Answer::find($answer);
            //add answerTo to answerComplete array
            $answerComplete[$question_id] = $answerTo;
            $correct_answer = $question->answers->where('is_correct', true)->first()->id;
            if($answer == $correct_answer){
                $score++;
            }
        }
        $percentage = round(($score / count($questions)) * 100, 1);

        return view('quizes.result', [
            'score' => $score,
            'total' => count($questions),
            'percentage' => $percentage,
            'quiz' => $quiz,
            'questions' => $questions,
            'answerComplete' => $answerComplete
        ]);
    }
}
