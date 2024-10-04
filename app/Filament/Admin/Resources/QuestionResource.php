<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\QuestionResource\Pages;
use App\Filament\Admin\Resources\QuestionResource\RelationManagers;
use App\Models\Category;
use App\Models\Question;
use App\Models\Type;
use Faker\Core\Number;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationLabel = 'Vragen';

    protected static ?string $modelLabel = 'Vraag';

    protected static ?string $pluralModelLabel = 'Vragen';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type_id')
                    ->label('Type vraag')
                    ->relationship('type', 'name')
                    ->live()
                    ->options(
                        Type::all()->pluck('type', 'id')
                    )
                    ->required(),

                TextInput::make('question')
                    ->label('Vraag')
                    ->columnSpanFull()
                    ->required(),

                Select::make('question.category_id')
                    ->label('Categorie')
                    ->multiple()
                    ->relationship('category', 'name')
                    ->options(
                        Category::all()->pluck('name', 'id')
                    )
                   
                ->required(),
                // TextInput::make('answer')
                //     ->label('Antwoord')
                //     ->columnSpanFull()
                //     ->visible(function ($record, Get $get) {
                //         if($get('type_id') == 1) {
                //             return true;
                //         }
                // })
                // ->required(),

                Hidden::make('created_by')
                    ->default(function() {
                        $user = auth()->user();
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->searchable()
                    ->label('Vraag'),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Categorie'),
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
            RelationManagers\AnswersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
