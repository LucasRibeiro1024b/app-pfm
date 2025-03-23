@extends('layouts.main')

@section('title', 'Dashboard')
    
@section('content')

    <div>
        @livewire(App\Livewire\FinanceOverview::class)
    </div>

    <div class="mt-5 col-10 offset-1">
        <h3>Top 4 projetos mais lucrativos</h3>
        @livewire(App\Livewire\TopProfitableProjectsChart::class)
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