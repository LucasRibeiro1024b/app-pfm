<?php

namespace App\Livewire;

use App\Models\Receipt;
use App\Models\Expense;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class ReceiptsVsExpensesChart extends ChartWidget
{
    protected static ?string $heading = 'Receita x Despesa - Últimos 12 Meses';

    protected function getData(): array
    {
        $months = collect();
        $receiptsData = collect();
        $expensesData = collect();

        // Gerar os últimos 12 meses
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i)->format('Y-m');
            $months->push(Carbon::parse($month . '-01')->translatedFormat('M/Y'));

            // Soma das receitas do mês
            $receiptsData->push(
                Receipt::whereBetween('payment_date', [
                    Carbon::parse($month . '-01')->startOfMonth(),
                    Carbon::parse($month . '-01')->endOfMonth(),
                ])->sum('value')
            );

            // Soma das despesas do mês
            $expensesData->push(
                Expense::whereBetween('payment_date', [
                    Carbon::parse($month . '-01')->startOfMonth(),
                    Carbon::parse($month . '-01')->endOfMonth(),
                ])->sum('value')
            );
        }

        return [
            'datasets' => [
                [
                    'label' => 'Receita (R$)',
                    'data' => $receiptsData->toArray(),
                    'backgroundColor' => '#2196F3',
                ],
                [
                    'label' => 'Despesa (R$)',
                    'data' => $expensesData->toArray(),
                    'backgroundColor' => '#E91E63',
                ],
            ],
            'labels' => $months->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Gráfico de barras comparativo
    }
}
