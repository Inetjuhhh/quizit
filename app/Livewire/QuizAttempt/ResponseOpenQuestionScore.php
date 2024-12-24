<?php

namespace App\Livewire\QuizAttempt;

use Livewire\Component;

class ResponseOpenQuestionScore extends Component
{
    public $response;
    public $score = NULL;

    public function mount($response)
    {
        $this->response = $response;

        if($this->response->is_correct){
            $this->score = $this->response->is_correct;
        }
    }

    public function setScore()
    {
        $this->response->is_correct = $this->score;
        $this->response->save();

    }

    public function render()
    {
        return view('livewire.quiz-attempt.response-open-question-score');
    }
}
