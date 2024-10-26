<?php

namespace App\Filament\Admin\Resources\QuizAttemptResource\Pages;

use App\Filament\Admin\Resources\QuizAttemptResource;
use App\Models\QuizAttempt;
use App\Models\UserQuizAttempt;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateQuizAttempt extends CreateRecord
{
    protected static string $resource = QuizAttemptResource::class;

}
