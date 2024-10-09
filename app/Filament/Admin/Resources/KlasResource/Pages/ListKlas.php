<?php

namespace App\Filament\Admin\Resources\KlasResource\Pages;

use App\Filament\Admin\Resources\KlasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKlas extends ListRecords
{
    protected static string $resource = KlasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
