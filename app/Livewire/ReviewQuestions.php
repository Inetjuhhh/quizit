<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\ReviewQuestion;
use Livewire\Component;

class ReviewQuestions extends Component
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
                $reviewQuestion->question_id = $this->questionId;
                $reviewQuestion->score = 1;
            }

            $reviewQuestion->save();
            $this->score = $reviewQuestion->score;

            $this->emit('scoreUpdated', $this->questionId, $this->score);
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

            $this->emit('scoreUpdated', $this->questionId, $this->score);
        }
    }

    public function render()
    {
        return view('livewire.review-questions');
    }
}
