<?php

namespace App\Filament\Admin\Resources\UserQuizResource\Pages;

use App\Filament\Admin\Resources\UserQuizResource;
use App\Models\Quiz;
use App\Models\User;
use App\Models\UserQuiz;
use Filament\Actions;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Resources\Pages\CreateRecord;

class CreateUserQuiz extends CreateRecord
{
    protected static string $resource = UserQuizResource::class;



    protected function mutateFormDataBeforeCreate(array $data): array
{

    //get the data from the form and create a new UserQuiz record for each user in users

    
    $students = $data['users'];

    foreach ($students as $userId) {
        UserQuiz::create([
            'user_id'      => $userId,
            'quiz_id'      => $data['quiz_id'],
            'prepared_by'  => 3,
            'started_at'   => $data['started_at'],
            'completed_at' => $data['completed_at'],
        ]);
    }

    unset($data['users ']);
    return $data;
}


}




