<?php

namespace App\Filament\Admin\Resources\QuestionResource\Pages;

use App\Filament\Admin\Resources\QuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateQuestion extends CreateRecord
{
    protected static string $resource = QuestionResource::class;

    protected function afterFill() : void
    {
        $user = auth()->user();
        $this->data['created_by'] = $user->id;
    }

}
