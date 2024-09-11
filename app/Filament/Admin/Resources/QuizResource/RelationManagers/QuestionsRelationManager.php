<?php

namespace App\Filament\Admin\Resources\QuizResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionsRelationManager extends RelationManager
{
    protected static string $relationship = 'questions';

    protected static ?string $modelLabel = 'Vraag';

    protected static ?string $navigationLabel = 'Vragen';



    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->label('Vraag')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Vraag')
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->searchable()
                    ->label('Vraag'),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Categorie')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //attach an existing question from QuestionResource to a quiz
                Action::make('attachQuestion')
                    ->label('Vraag toevoegen')
                    ->form([
                        Select::make('question_id')
                            ->label('Vraag')
                            ->options(
                                \App\Models\Question::all()->pluck('question', 'id')
                            )
                            ->required(),
                    ])
                    ->action(function($data, Get $get) {
                        $question_id = $data['question_id'];
                        $quiz_id = $this->ownerRecord->id;
                        $this->ownerRecord->questions()->attach($question_id);
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
