<?php

namespace App\Livewire;

use App\Models\Project;
use Filament\Widgets\ChartWidget;

class ExpenseComparisonChart extends ChartWidget
{

    protected function getData(): array
    {
        $realExpense = Project::all()->sum(fn($project) => $project->realExpense());
        $expectedExpense = Project::all()->sum(fn($project) => $project->expectedExpense());

        return [
            'datasets' => [
                [
                    'label' => 'Despesa Comparativa',
                    'data' => [$realExpense, $expectedExpense],
                    'backgroundColor' => ['#E91E63', '#e67c9f'], 
                ],
            ],
            'labels' => ['Despesa Real', 'Despesa Prevista'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
