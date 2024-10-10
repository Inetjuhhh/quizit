<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\UserQuestionVote;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReviewQuestion extends Component
{

    public $score;
    public $questionId;

    public function mount($questionId)
    {
        $this->questionId = $questionId;
        $this->loadScore();
    }

    public function loadScore()
    {
        $question = Question::find($this->questionId);

        if ($question && $question->reviewQuestion) {
            $this->score = $question->reviewQuestion->score;
        } else {
            $this->score = 0;
        }
    }

    public function upvoteQuestionScore()
    {
        $question = Question::find($this->questionId);

        $existingVote = UserQuestionVote::where('user_id', Auth::id())
        ->where('question_id', $this->questionId)
        ->where('vote', '1')
        ->first();

        if ($existingVote) {
            return;
        }

        if ($question) {
            $reviewQuestion = $question->reviewQuestion;

            if ($reviewQuestion) {
                $reviewQuestion->score += 1;
            } else {
                $reviewQuestion = new ReviewQuestion();
                $reviewQuestion->question->id = $this->questionId;
                $reviewQuestion->score = 1;
            }
            UserQuestionVote::create([
                'user_id' => Auth::id(),
                'question_id' => $this->questionId,
                'vote' => '1'
            ]);

            $reviewQuestion->save();
            $this->score = $reviewQuestion->score;
        }
    }

    public function downvoteQuestionScore()
    {
        $question = Question::find($this->questionId);

        $existingVote = UserQuestionVote::where('user_id', Auth::id())
        ->where('question_id', $this->questionId)
        ->where('vote', '1')
        ->first();

        if ($existingVote) {
        return;
        }

        if ($question && $question->reviewQuestion) {
            $reviewQuestion = $question->reviewQuestion;
            $reviewQuestion->score -= 1;

            UserQuestionVote::create([
                'user_id' => Auth::id(),
                'question_id' => $this->questionId,
                'vote' => '-1'
            ]);

            $reviewQuestion->save();

            $this->score = $reviewQuestion->score;
        }
    }

    public function render()
    {
        return view('livewire.review-question');
    }
}
