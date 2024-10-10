<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\User;
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

        if ($question && $question->userQuestionVotes) {
            $this->score = $question->userQuestionVotes->sum('vote');
        } else {
            $this->score = 0;
        }
    }

    public function upvoteQuestionScore()
    {
        $question = Question::find($this->questionId);

        $existingVote = UserQuestionVote::where('user_id', Auth::id())
        ->where('question_id', $this->questionId)
        ->first();

        if ($existingVote) {
            return;
        }

        $userVote = new UserQuestionVote();
        $userVote->user_id = Auth::id();
        $userVote->question_id = $question->id;
        $userVote->vote = 1;
        $userVote->save();

        $this->score = $question->userQuestionVotes->sum('vote');
    }

    public function downvoteQuestionScore()
    {
        $question = Question::find($this->questionId);

        $existingVote = UserQuestionVote::where('user_id', Auth::id())
        ->where('question_id', $this->questionId)
        ->first();

        if ($existingVote) {
            return;
        }

        $userVote = new UserQuestionVote();
        $userVote->user_id = Auth::id();
        $userVote->question_id = $question->id;
        $userVote->vote = -1;
        $userVote->save();

        $this->score = $question->userQuestionVotes->sum('vote');

    }

    public function render()
    {
        return view('livewire.review-question');
    }
}
