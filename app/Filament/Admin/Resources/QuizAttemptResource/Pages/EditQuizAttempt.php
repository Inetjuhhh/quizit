<?php

namespace App\Filament\Admin\Resources\QuizAttemptResource\Pages;

use App\Filament\Admin\Resources\QuizAttemptResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuizAttempt extends EditRecord
{
    protected static string $resource = QuizAttemptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
