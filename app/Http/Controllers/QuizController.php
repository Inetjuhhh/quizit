<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\UserQuiz;
use App\Models\UserQuizAttempt;
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
        $userQuizAttempts = UserQuizAttempt::where('user_id', $user->id)->get();
        $quizes = Quiz::all();

        $completedQuizes = [];

        foreach ($userQuizAttempts as $userQuizAttempt) {
            if($userQuizAttempt->completed_at) {
                $completedQuizes[$userQuizAttempt->id] = [
                    'score' => $userQuizAttempt->responses->sum('is_correct'),
                    'completed_at' => $userQuizAttempt->completed_at
                ];
            }
        }

        return view('quizes.index')
            ->with('quizes', $quizes)
            ->with('user', $user)
            ->with('userQuizAttempts', $userQuizAttempts)
            ->with('completedQuizes', $completedQuizes);
        }

    public function show(string $id, string $userQuizAttemptId)
    {
        $quiz = Quiz::findOrFail($id);
        $userQuizAttempt = UserQuizAttempt::findOrFail($userQuizAttemptId);
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
            ->with('userQuizAttempt', $userQuizAttempt)
            ->with('categories', $categories);
    }

    public function play(string $id, string $userQuizAttemptId)
    {
        $quiz = Quiz::findOrFail($id);
        $userQuizAttempt = UserQuizAttempt::findOrFail($userQuizAttemptId);
        return view('quizes.play')
            ->with('quiz', $quiz)
            ->with('userQuizAttempt', $userQuizAttempt);
    }



}
