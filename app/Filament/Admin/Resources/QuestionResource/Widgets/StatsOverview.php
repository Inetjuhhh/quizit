<?php

namespace App\Filament\Admin\Resources\QuestionResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Questions', 'questions')->primary(),
        ];
    }
}
