<?php

namespace App\Livewire;

use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FinanceOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $projects = Project::all();
        
        // Calcule os totais
        $totalReceipt = $projects->sum(function ($project) {
            return $project->realReceipt();
        });
        $totalExpense = $projects->sum(function ($project) {
            return $project->realExpense();
        });
        $totalProfit = $projects->sum(function ($project) {
            return $project->realProfit();
        });

        $chartReceipt = $projects->map(fn($project) => $project->realReceipt())->toArray();
        $chartExpense = $projects->map(fn($project) => $project->realExpense())->toArray();
        $chartProfit  = $projects->map(fn($project) => $project->realProfit())->toArray();

        return [
            // Receita
            Stat::make('Receita', 'R$ ' . number_format($totalReceipt, 2, ',', '.'))
                ->description('Receita real de todos os projetos')
                ->descriptionIcon($totalReceipt >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($chartReceipt) 
                ->color($totalReceipt >= 0 ? 'success' : 'danger'),

            // Despesa
            Stat::make('Despesa', 'R$ ' . number_format($totalExpense, 2, ',', '.'))
                ->description('Despesa total dos projetos')
                ->descriptionIcon('heroicon-m-credit-card')
                ->chart($chartExpense)
                ->color('danger'),

            // Lucro
            Stat::make('Lucro', 'R$ ' . number_format($totalProfit, 2, ',', '.'))
                ->description('Lucro real de todos os projetos')
                ->descriptionIcon($totalProfit >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart($chartProfit)
                ->color($totalProfit >= 0 ? 'success' : 'danger'),
        ];
    }
}
