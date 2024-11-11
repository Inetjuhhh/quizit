<?php

namespace App\Livewire\QuizAttempt;

use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Livewire\Component;

class UserQuizResponse extends Component
{
    use InteractsWithRecord;

    public function render()
    {
        return view('livewire.quiz-attempt.user-quiz-response');
    }
}
