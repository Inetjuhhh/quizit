<?php

namespace App\Filament\Admin\Resources\CourseResource\RelationManagers;

use App\Filament\Admin\Actions\DetachActionBelongsTo;
use App\Models\Quiz;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuizesRelationManager extends RelationManager
{
    protected static string $relationship = 'quizes';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('attachQuiz')
                    ->label('Quiz koppelen')
                    ->form([
                        Hidden::make('../../course_id')
                            ->default(request()->route('record')),
                        Select::make('quiz_id')
                            ->label('Quiz')
                            ->placeholder('Selecteer een quiz')
                            ->options(function($get){

                                return Quiz::whereNull('course_id')->get()->mapWithKeys(function ($quiz) {
                                    $key = $quiz->id;
                                    $value = $quiz->id;
                                    return [$key => $value];
                                });
                            })
                            ->required(),
                    ])
                    ->action(function($data, Get $get) {

                        $courseId = $this->ownerRecord->id;
                        $quizId = $data['quiz_id'];
                        $quiz = Quiz::find($quizId);
                        $quiz->course_id = $courseId;
                        $quiz->save();
                    }),            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DetachActionBelongsTo::make()->label('Ontkoppel quiz'),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
