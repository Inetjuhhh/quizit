<?php

namespace App\Filament\Resources\UserQuizResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\UserQuizResource;
use App\Models\Quiz;
use App\Models\User;
use Filament\Actions;
use App\Models\UserQuiz;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;

class CreateUserQuiz extends CreateRecord
{
    protected static string $resource = UserQuizResource::class;

    protected function getFormSchema(): array
    {
        return [
            
        ];
    }

    protected function beforeCreate(array $data): array
    {
        foreach ($data['attendees'] as $userId) {
            UserQuiz::create([
                'user_id'      => $userId,
                'quiz_id'      => $data['quiz_id'],
                'started_at'   => $data['started_at'],
                'completed_at' => $data['completed_at'],
            ]);
        }

        return $data;
    }
}
