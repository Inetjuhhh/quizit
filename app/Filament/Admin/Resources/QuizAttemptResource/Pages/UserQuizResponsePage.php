<?php

namespace App\Filament\Admin\Resources\QuizAttemptResource\Pages;

use App\Models\UserQuizAttempt;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Filament\Tables\Concerns\HasTable;
use App\Models\UserQuizResponse;

class UserQuizResponsePage extends Page
{
    protected static string $view = 'filament.quiz-attempts.user-quiz-response-page';

    public UserQuizAttempt $userQuizAttempt;

    protected function getTableQuery()
    {
        return $this->userQuizAttempt->userQuizResponses();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('question')
                ->label('Question'),
            Tables\Columns\TextColumn::make('answer')
                ->label('Answer'),
            Tables\Columns\BooleanColumn::make('open_answer')
                ->label('Open Answer'),
            Tables\Columns\BooleanColumn::make('is_correct')
                ->label('Correct?')
                ->editable(fn ($record) => $record->open_answer),
        ];
    }

    protected static function getModalWidth(): string
    {
        return '4xl';
    }
}
