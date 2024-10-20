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
}
