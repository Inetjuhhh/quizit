<?php

namespace App\Filament\Resources\UserQuizResource\Pages;

use App\Filament\Admin\Resources\UserQuizResource;
use Filament\Resources\Pages\Page;

    class AssignUserQuiz extends Page
    {
        protected static string $resource = UserQuizResource::class;

        protected static string $view = 'livewire.assign-quiz-wizard';
    }
?>
