<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\UserQuiz;
use App\Models\UserQuizResponse;
use Illuminate\Http\Request;

class UserQuizController extends Controller
{
    public function index()
    {
        $userQuizes = [];
        $allUserQuizes = UserQuiz::where('user_id', auth()->id())->get();

        foreach ($allUserQuizes as $oneUserQuiz) {
            $userId = $oneUserQuiz->user_id;
            $quizId = $oneUserQuiz->quiz_id;

            $exists = false;

            foreach ($userQuizes as $userQuiz) {
                if ($userQuiz->user_id === $userId && $userQuiz->quiz_id === $quizId) {
                    $exists = true;
                    break;
                }
            }

            if (!$exists) {
                $userQuizes[] = $oneUserQuiz;
            }
        }


        return view('userquiz.index')
            ->with([
                'userQuizes' => $userQuizes,
            ]);
    }

    public function checkQuestions(string $id)
    {
        $quiz = Quiz::with('questions.answers')->findOrFail($id);
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

                    UserQuiz::updateOrCreate([
                        'user_id' => auth()->id(),
                        'quiz_id' => $quiz->id,
                        'completed_at' => now()
                    ]);
                    $userQuiz = UserQuiz::where('user_id', auth()->id())->where('quiz_id', $quiz->id)->first();
                    UserQuizResponse::updateOrCreate([
                        'user_quiz_id' => $userQuiz->id,
                        'question_id' => $question->id,
                        'answer_id' => $submittedAnswerId,
                        'is_correct' => $submittedAnswerId == $correctAnswer->id,
                    ]);
                }
            }
            elseif($question->type->type == 'open'){
                $openAnswers[$question->id] = $answers[$question->id] ?? null;

                UserQuiz::updateOrCreate([
                    'user_id' => auth()->id(),
                    'quiz_id' => $quiz->id,
                    'score' => $score,
                    'completed_at' => now(),
                ]);
                $userQuiz = UserQuiz::where('user_id', auth()->id())->where('quiz_id', $quiz->id)->first();
                UserQuizResponse::updateOrCreate([
                    'user_quiz_id' => $userQuiz->id,
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
        $userQuiz = UserQuiz::where('quiz_id', $id)
        ->where('user_id', auth()->id())
        ->with('responses')
        ->first();
        $userQuizResponses = UserQuizResponse::where('user_quiz_id', $userQuiz->id)->get();

        if (!$userQuiz) {
            return redirect()->back()->with('error', 'Gemaakte gebruikersquiz niet gevonden.');
        }

        $score = $userQuiz->responses->sum('is_correct');
        $totalQuestions = $userQuiz->responses->count();
        $percentage = $totalQuestions > 0 ? round(($score / $totalQuestions) * 100, 1) : 0;

        return view('userquiz.result', [
            'userQuiz' => $userQuiz,
            'userQuizResponses' => $userQuizResponses,
            'score' => $score,
            'total' => $totalQuestions,
            'percentage' => $percentage,

        ]);
    }
}
