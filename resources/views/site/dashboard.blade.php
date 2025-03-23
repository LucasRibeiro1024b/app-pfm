@extends('layouts.main')

@section('title', 'Dashboard')
    
@section('content')

    <div class="text-center text-body-emphasis">
        <div>
            @livewire(App\Livewire\FinanceOverview::class)
        </div>
        
        <div class="mt-5 col-10 offset-1">
            <h3>Top 4 projetos mais lucrativos</h3>
            @livewire(App\Livewire\TopProfitableProjectsChart::class)
        </div>
        
        <div class="mt-5 row">
            <div id="receipt" class="col-4">
                <h3 class="">Receita Real x Receita Prevista</h3>
                @livewire(App\Livewire\ReceiptComparisonChart::class)
            </div>
            <div id="expense" class="col-4">
                <h3 class="">Despesa Real x Despesa Prevista</h3>
                @livewire(App\Livewire\ExpenseComparisonChart::class)
            </div>
            <div id="profit" class="col-4">
                <h3 class="">Lucro Real x Lucro Previsto</h3>
                @livewire(App\Livewire\ProfitComparisonChart::class)
            </div>
        </div>
        
        <div class="mt-5">
            <h3 class="my-2">Despesas dos últimos 12 meses</h3>
            @livewire(App\Livewire\ExpensesLast12MonthsChart::class)
        </div>
    </div>
    
@endsection

@push('style')
    @filamentStyles
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="/css/main/dashboard.css">
@endpush
@push('script')
    @filamentScripts
    @vite('resources/js/app.js')
@endpush