<?php

namespace App\Livewire;

use App\Models\Project;
use Filament\Widgets\ChartWidget;

class ProfitComparisonChart extends ChartWidget
{

    protected function getData(): array
    {
        // Somar lucro real e lucro previsto de todos os projetos
        $realProfit = Project::all()->sum(fn($project) => $project->realProfit());
        $expectedProfit = Project::all()->sum(fn($project) => $project->expectedProfit());


        return [
            'datasets' => [
                [
                    'label' => 'Comparação de Lucros',
                    'data' => [$realProfit, $expectedProfit],
                    'backgroundColor' => ['#4CAF50', '#8ae78d'], 
                ],
            ],
            'labels' => ['Lucro Real', 'Lucro Previsto'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
