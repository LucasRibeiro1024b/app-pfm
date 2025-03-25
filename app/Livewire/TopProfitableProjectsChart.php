<?php

namespace App\Livewire;

use App\Models\Project;
use Filament\Widgets\ChartWidget;

class TopProfitableProjectsChart extends ChartWidget
{
    // protected static ?string $heading = 'Top 4 Projetos Mais Lucrativos';


    protected function getData(): array
    {
        $topProjects = Project::all()
            ->sortByDesc(fn($project) => $project->realProfit()) 
            ->take(4);

        $labels = [];
        $data = [];

        foreach($topProjects as $project) {
            $labels[] = $project->title;
            $data[] = $project->realProfit();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Lucro (R$)',
                    'data' => $data,
                    'backgroundColor' => ['#4CAF50', '#FF9800', '#2196F3', '#E91E63'],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Gráfico de barras
    }
}
