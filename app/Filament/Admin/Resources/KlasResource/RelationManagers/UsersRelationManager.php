<?php

namespace App\Filament\Admin\Resources\KlasResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Component;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action as ActionsAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';
    protected static ?string $modelLabel = 'Gebruiker';

    protected static ?string $navigationLabel = 'Gebruikers';
    protected static ?string $pluralModelLabel = 'Gebruikers';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->unique('users', 'email')
                    ->maxLength(255),
                TextInput::make('password')
                    ->hint('Alleen invoeren indien je deze wilt wijzigen.')
                    ->label('Wachtwoord')
                    ->prefixAction(
                        Action::make('generate-password')
                            ->icon('heroicon-o-finger-print')
                            ->color('success')
                            ->label('Genereer wachtwoord')
                            ->action(function (Set $set, $state) {
                                $set('password', Str::random(16));
                            })
                    )
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->hiddenOn('view'),
                Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'teacher' => 'Teacher',
                        'student' => 'Student',
                    ])
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Naam gebruiker'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Nieuwe gebruiker toevoegen'),
                ActionsAction::make('attachUser')
                ->label('Bestaande gebruiker toevoegen')
                ->form([
                    Select::make('user_id')
                        ->label('Gebruiker')
                        ->options(
                            \App\Models\User::all()->pluck('name', 'id')
                        )
                        ->required(),
                ])
                ->action(function($data, Get $get) {
                    $user_id = $data['user_id'];
                    $this->ownerRecord->users()->attach($user_id);
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
