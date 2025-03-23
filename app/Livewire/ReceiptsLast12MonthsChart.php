<?php

namespace App\Livewire;

use App\Models\Receipt;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class ReceiptsLast12MonthsChart extends ChartWidget
{
    protected static ?string $heading = 'Despesas dos Últimos 12 Meses';

    protected function getData(): array
    {
        // Obtém a data de 12 meses atrás
        $startDate = Carbon::now()->subMonths(12)->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        // Busca despesas dentro desse período e agrupa por mês
        $receipts = Receipt::whereBetween('payment_date', [$startDate, $endDate])
            ->get()
            ->groupBy(fn($receipt) => Carbon::parse($receipt->payment_date)->format('Y-m'));

        // Cria um array com os últimos 12 meses, inicializando com 0
        $labels = collect(range(0, 11))->map(fn($i) => Carbon::now()->subMonths($i)->format('Y-m'))->reverse()->values();

        // Inicializa os valores de cada mês com 0
        $data = $labels->mapWithKeys(fn($month) => [$month => 0]);

        // Preenche os valores reais
        foreach ($receipts as $month => $receiptList) {
            $data[$month] = $receiptList->sum('value');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total de Receitas (R$)',
                    'data' => array_values($data->toArray()), // Pegamos apenas os valores ordenados corretamente
                    'backgroundColor' => '#2196F3', 
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
