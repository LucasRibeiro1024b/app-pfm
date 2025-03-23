@extends('layouts.main')

@section('title', 'Financeiro')
    
@section('content')

<div class="d-flex justify-content-between">
    <h2>Lista de Receitas e Despesas</h2>

    <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Opções
        </button>
        <ul class="dropdown-menu">
          <li><a href="{{ route('receipt.create') }}" class="dropdown-item">Adicionar receita</a></li>
          <li><a href="{{ route('expense.create') }}" class="dropdown-item">Adicionar despesa</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a href="{{ route('categories.index') }}" class="dropdown-item">Ver categorias</a></li>
        </ul>
    </div>

</div>

<div class="mt-5">
    @livewire(App\Livewire\FinancesTable::class)
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