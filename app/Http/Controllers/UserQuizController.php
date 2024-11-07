<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\UserQuiz;
use App\Models\UserQuizAttempt;
use App\Models\UserQuizResponse;
use Illuminate\Http\Request;

class UserQuizController extends Controller
{
    public function index()
    {
        $executedUserQuizAttempts = [];
        $userQuizAttempts = UserQuizAttempt::where('user_id', auth()->id())->get();

        foreach ($userQuizAttempts as $userQuizAttempt) {
            $userQuizResponses = UserQuizResponse::where('user_quiz_attempt_id', $userQuizAttempt->id)->get();
            if ($userQuizResponses->count() > 0) {
                $executedUserQuizAttempts[] = $userQuizAttempt;
            }
        }

        return view('userquiz.index')
            ->with([
                'executedUserQuizAttempts' => $executedUserQuizAttempts,
            ]);
    }

    public function checkQuestions(string $id, string $userQuizAttempt)
    {
        $quiz = Quiz::with('questions.answers')->findOrFail($id);
        $userQuizAttempt = UserQuizAttempt::findOrFail($userQuizAttempt);
        $questions = $quiz->questions;
        $answers = request()->except('_token');

        $score = 0;
        $answerComplete = [];
        $openAnswers = [];

        foreach($questions as $question) {
            $submittedAnswerId = $answers[$question->id] ?? null;

            if($question->type->type == 'meerkeuze'){
                $correctAnswer = $question->answers->firstWhere('is_correct', true);

                if($submittedAnswerId){
                    $submittedAnswer = $question->answers->find($submittedAnswerId);
                    $answerComplete[$question->id] = $submittedAnswer;

                    if($correctAnswer && $submittedAnswerId == $correctAnswer->id){
                        $score++;
                    }

                    UserQuizResponse::updateOrCreate([
                        'user_quiz_attempt_id' => $userQuizAttempt->id,
                        'question_id' => $question->id,
                        'answer_id' => $submittedAnswerId,
                        'is_correct' => $submittedAnswerId == $correctAnswer->id,
                        'completed_at' => now(),
                    ]);
                }
            }
            elseif($question->type->type == 'open'){
                $openAnswers[$question->id] = $answers[$question->id] ?? null;

                UserQuizResponse::updateOrCreate([
                    'user_quiz_attempt_id' => $userQuizAttempt->id,
                    'question_id' => $question->id,
                    'open_answer' => $answers[$question->id] ?? null,
                    'completed_at' => now(),
                ]);
                $openAnswers[$question->id] = $submittedAnswerId;
            }
        }

        $totalQuestions = $questions->count();
        $percentage = $totalQuestions > 0 ? round(($score / $totalQuestions) * 100, 1) : 0;

        return redirect()->route('userquizes.index', [
        ]);
    }


    public function result(string $id)
    {
        $userQuizAttempt = UserQuizAttempt::findOrFail($id);
        $userQuizResponses = UserQuizResponse::where('user_quiz_attempt_id', $userQuizAttempt->id)->get();

        if (!$userQuizAttempt) {
            return redirect()->back()->with('error', 'Gemaakte gebruikersquiz niet gevonden.');
        }

        $score = $userQuizAttempt->responses->sum('is_correct');
        $totalQuestions = $userQuizAttempt->responses->count();
        $percentage = $totalQuestions > 0 ? round(($score / $totalQuestions) * 100, 1) : 0;

        return view('userquiz.result', [
            'userQuizAttempt' => $userQuizAttempt,
            'userQuizResponses' => $userQuizResponses,
            'score' => $score,
            'total' => $totalQuestions,
            'percentage' => $percentage,

        ]);
    }
}
