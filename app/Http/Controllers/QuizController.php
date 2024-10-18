<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\UserQuiz;
use App\Models\UserQuizResponse;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $quizes = Quiz::all();
        $userQuizes = $user->quizes;
        $completedQuizes = [];

        foreach ($userQuizes as $userQuiz) {
            $completedQuizes[$userQuiz->id] = [
                'score' => $userQuiz->pivot->score,
                'completed_at' => $userQuiz->pivot->completed_at
            ];
        }

        return view('quizes.index')
            ->with('quizes', $quizes)
            ->with('user', $user)
            ->with('completedQuizes', $completedQuizes);
        }

    public function show(string $id)
    {
        $quiz = Quiz::findOrFail($id);
        $questions = $quiz->questions;
        $categories = [];
        foreach ($questions as $question) {
            //check which categories belong to the quiz in pivot table question_category and add to $categories
            if ($question->categories->count() > 0) {
                foreach ($question->categories as $category) {
                    $categories[$category->id] = $category->name;
                }
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

    

    public function result(string $id)
    {
    //    return view('quizes.result', [
    //        'userQuizes' => UserQuiz::where('quiz_id', $id)->where('user_id', auth()->id())->get(),
    //        'score' => $score,
    //        'total' => $totalQuestions,
    //        'percentage' => $percentage,
    //        'quiz' => $quiz,
    //    ]);
    }
}
