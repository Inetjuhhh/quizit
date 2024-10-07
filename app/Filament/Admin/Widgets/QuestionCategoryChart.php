<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class QuestionCategoryChart extends ChartWidget
{
    protected static ?string $heading = 'Vraag categorieën';

    protected function getData(): array
    {
        $categories = Category::all();
        $questionsPerCategory = $categories->map(function ($category) {
            return $category->questions->count();
        });

        return [
            'datasets' => [
                [
                    'label' => 'Aantal vragen in categorie',
                    'data' => $questionsPerCategory,
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => $categories->pluck('name'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
