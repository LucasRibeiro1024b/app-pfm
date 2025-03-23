<?php

namespace App\Livewire;

use App\Models\Project;
use Filament\Widgets\ChartWidget;

class ReceiptComparisonChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $realReceipt = Project::all()->sum(fn($project) => $project->realReceipt());
        $expectedReceipt = Project::all()->sum(fn($project) => $project->expectedReceipt());

        return [
            'datasets' => [
                [
                    'label' => 'Comparação de Receitas',
                    'data' => [$realReceipt, $expectedReceipt],
                    'backgroundColor' => ['#2196F3', '#86c1f0'],
                ],
            ],
            'labels' => ['Receita Real', 'Receita Prevista'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
