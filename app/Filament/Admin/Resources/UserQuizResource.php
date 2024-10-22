<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserQuizResource\Pages;
use App\Filament\Admin\Resources\UserQuizResource\RelationManagers;
use App\Models\Quiz;
use App\Models\User;
use App\Models\UserQuiz;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserQuizResource extends Resource
{
    protected static ?string $model = UserQuiz::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Toegekende quizes';
    protected static ?string $name = 'Toegekende quizes';
    protected static ?string $modelLabel = 'Quiz toekennen';
    protected static ?string $pluralModelLabel = 'Toegekende quizes';

    public static function getSlug(): string
    {
        return 'user-quizes';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('quiz_id')
                        ->label('Kies Quiz')
                        ->schema([
                            Select::make('quiz_id')
                                ->label('Quiz')
                                ->options(Quiz::all()->pluck('name', 'id'))
                                ->required(),
                        ]),
                    Wizard\Step::make('attendees')
                        ->label('Deelnemers')
                        ->schema([
                            Select::make('users')
                                ->multiple()
                                ->label('Deelnemers')
                                ->options(User::all()->pluck('name', 'id'))
                                ->required(),
                        ]),
                    Wizard\Step::make('period')
                        ->label('Periode')
                        ->schema([
                            DateTimePicker::make('started_at')
                                ->label('Geopend op')
                                ->default(now())
                                ->required(),
                            DateTimePicker::make('completed_at')
                                ->label('Sluit op')
                                ->default(now()->addDays(7))
                                ->required(),
                        ]),
                ]),
            ]);
        }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('quiz.name')
                    ->label('Quiz'),
                TextColumn::make('user.name')
                    ->label('Toegekend aan'),
                TextColumn::make('user.klas.name')
                    ->label('Klas'),
                TextColumn::make('started_at')
                    ->label('Geopend op'),
                TextColumn::make('completed_at')
                    ->label('Sluit op'),
                IconColumn::make('status')
                    ->icon(fn (string $state): string => match ($state) {
                        'pending' => 'heroicon-o-clock',
                        'completed' => 'heroicon-o-check-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'completed' => 'success',
                    })
                    ->label('Status'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserQuizes::route('/'),
            'create' => Pages\CreateUserQuiz::route('/create'),
            'edit' => Pages\EditUserQuiz::route('/{record}/edit'),
        ];
    }
}
