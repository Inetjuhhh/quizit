<?php

namespace App\Filament\Admin\Resources\QuestionResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Form;
use Filament\Resources\Pages\ViewRecord;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnswersRelationManager extends RelationManager
{
    protected static ?string $model = \App\Models\Answer::class;

    protected static string $relationship = 'answers';

    protected static ?string $navigationLabel = 'Antwoorden';

    protected static ?string $modelLabel = 'Antwoord';

    protected static ?string $pluralModelLabel = 'Antwoorden';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('question')
                ->formatStateUsing(function () {
                    return $this->ownerRecord->question;
                })
                    ->default($this->ownerRecord->question)
                    ->dehydrated()
                    ->disabled()
                    ->label('Vraag'),
                Forms\Components\TextInput::make('answer')
                    ->required()
                    ->label('Antwoord')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_correct')
                    ->label('Is juist?')

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('answer')
            ->columns([
                Tables\Columns\TextColumn::make('answer'),
                Tables\Columns\IconColumn::make('is_correct')
                    ->label('Is juist?')
                    ->icon(function ($record) {
                        return $record->is_correct ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle';
                    })
                    ->color(fn ($record) => $record->is_correct ? 'success' : 'danger'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
