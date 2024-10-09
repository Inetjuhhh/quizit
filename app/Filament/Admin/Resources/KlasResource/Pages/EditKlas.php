<?php

namespace App\Filament\Admin\Resources\KlasResource\Pages;

use App\Filament\Admin\Resources\KlasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKlas extends EditRecord
{
    protected static string $resource = KlasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
