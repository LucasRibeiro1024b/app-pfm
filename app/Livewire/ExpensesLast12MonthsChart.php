<?php

namespace App\Livewire;

use App\Models\Expense;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class ExpensesLast12MonthsChart extends ChartWidget
{
    protected static ?string $heading = 'Despesas dos Últimos 12 Meses';

    protected function getData(): array
    {
        // Obtém a data de 12 meses atrás
        $startDate = Carbon::now()->subMonths(12)->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        // Busca despesas dentro desse período e agrupa por mês
        $expenses = Expense::whereBetween('payment_date', [$startDate, $endDate])
            ->get()
            ->groupBy(fn($expense) => Carbon::parse($expense->payment_date)->format('Y-m'));

        // Cria um array com os últimos 12 meses, inicializando com 0
        $labels = collect(range(0, 11))->map(fn($i) => Carbon::now()->subMonths($i)->format('Y-m'))->reverse()->values();

        // Inicializa os valores de cada mês com 0
        $data = $labels->mapWithKeys(fn($month) => [$month => 0]);

        // Preenche os valores reais
        foreach ($expenses as $month => $expenseList) {
            $data[$month] = $expenseList->sum('value');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total de Despesas (R$)',
                    'data' => array_values($data->toArray()), // Pegamos apenas os valores ordenados corretamente
                    'backgroundColor' => '#E91E63', // Vermelho para despesas
                ],
            ],
            'labels' => $labels->map(fn($date) => Carbon::parse($date)->translatedFormat('M/Y'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Gráfico de barras
    }
}
