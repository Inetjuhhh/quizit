<?php

namespace App\Filament\Admin\Resources\QuizAttemptResource\RelationManagers;

use App\Filament\Admin\Actions\DetachActionBelongsTo;
use App\Filament\Admin\Actions\OpenResultsToUserQuizAttempt;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    protected static ?string $navigationLabel = 'Studenten';

    protected static ?string $modelLabel = 'Student';

    protected static ?string $pluralModelLabel = 'Studenten';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Naam student ')
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
                Tables\Columns\TextColumn::make('')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Action::make('viewResponses')
                ->label('Bekijk antwoorden')
                ->url(function($record){
                    return route('filament.admin.resources.quiz-attempts.response', $record->id);
                })
                ->color('info')
                ->modalHeading('Gebruiker antwoorden')
                ->modalWidth('4xl'),
                Tables\Actions\EditAction::make(),
                DetachActionBelongsTo::make()->label('Ontkoppel student'),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
