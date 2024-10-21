<?php

namespace App\Filament\Admin\Resources\UserQuizResource\Pages;

use App\Filament\Admin\Resources\UserQuizResource;
use Filament\Actions;
use Filament\Forms\Components\Wizard;
use Filament\Resources\Pages\ListRecords;
use App\Models\Quiz;
use App\Models\User;
use App\Models\UserQuiz;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;

class ListUserQuizes extends ListRecords
{
    protected static string $resource = UserQuizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Ken quiz toe'),
        ];
    }

    // protected function getFormSchema(): array
    // {
    //     return [
    //         Wizard::make([
    //             Wizard\Step::make('quiz_id')
    //                 ->label('Kies Quiz')
    //                 ->schema([
    //                     Hidden::make('user_id')
    //                         ->default(fn() => auth()->id()),
    //                     Select::make('quiz_id')
    //                         ->label('Quiz')
    //                         ->options(Quiz::all()->pluck('name', 'id'))
    //                         ->required(),
    //                 ]),
    //             Wizard\Step::make('attendees')
    //                 ->label('Deelnemers')
    //                 ->schema([
    //                     Select::make('attendees')
    //                         ->multiple()
    //                         ->label('Deelnemers')
    //                         ->options(User::all()->pluck('name', 'id'))
    //                         ->required(),
    //                 ]),
    //             Wizard\Step::make('period')
    //                 ->label('Periode')
    //                 ->schema([
    //                     DateTimePicker::make('started_at')
    //                         ->label('Geopend op')
    //                         ->default(now())
    //                         ->disabled(),
    //                     DateTimePicker::make('completed_at')
    //                         ->label('Sluit op')
    //                         ->default(now()->addDays(7))
    //                         ->required(),
    //                 ]),
    //         ])->submitAction('Assign Quiz'),
    //     ];
    // }
    // public function assignQuiz()
    // {
    //     $data = $this->form->getState();
    //     foreach ($data['attendees'] as $userId) {
    //         UserQuiz::create([
    //             'user_id'      => $userId,
    //             'quiz_id'      => $data['quiz_id'],
    //             'started_at'   => $data['started_at'],
    //             'completed_at' => $data['completed_at'],
    //         ]);
    //     }
    //     session()->flash('success', 'Quiz successfully assigned to users!');
    // }
}
