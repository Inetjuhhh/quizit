<?php

namespace App\Filament\Admin\Resources\UserQuizResource\Pages;

use App\Filament\Admin\Resources\UserQuizResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserQuizes extends ListRecords
{
    protected static string $resource = UserQuizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('Assign Quiz')
                ->url(route('filament.admin.resources.user-quizzes.assign-user-quiz'))
                ->label('Ken een quiz toe'),
        ];
    }
}
