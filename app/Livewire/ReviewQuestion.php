<?php

namespace App\Livewire;

use App\Models\Question;
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

        if ($question) {
            $reviewQuestion = $question->reviewQuestion;

            if ($reviewQuestion) {
                $reviewQuestion->score += 1;
            } else {
                $reviewQuestion = new ReviewQuestion();
                $reviewQuestion->question->id = $this->questionId;
                $reviewQuestion->score = 1;
            }

            $reviewQuestion->save();
            $this->score = $reviewQuestion->score;
        }
    }

    public function downvoteQuestionScore()
    {
        $question = Question::find($this->questionId);

        if ($question && $question->reviewQuestion) {
            $reviewQuestion = $question->reviewQuestion;
            $reviewQuestion->score -= 1;
            $reviewQuestion->save();

            $this->score = $reviewQuestion->score;
        }
    }

    public function render()
    {
        return view('livewire.review-question');
    }
}
