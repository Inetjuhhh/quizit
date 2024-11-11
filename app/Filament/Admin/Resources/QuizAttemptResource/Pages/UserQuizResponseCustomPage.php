<?php

namespace App\Filament\Admin\Resources\QuizAttemptResource\Pages;

use App\Filament\Admin\Resources\QuizAttemptResource;
use App\Models\UserQuizAttempt;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;

class UserQuizResponseCustomPage extends Page
{
    use InteractsWithRecord;

    public function mount(int | string $record): void {
        $this->record = UserQuizAttempt::findOrFail($record);
    }

    protected static string $resource = QuizAttemptResource::class;

    protected static string $view = 'filament.admin.resources.quiz-attempt-resource.pages.user-quiz-response-custom-page';
}
