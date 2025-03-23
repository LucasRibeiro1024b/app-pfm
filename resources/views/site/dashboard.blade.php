@extends('layouts.main')

@section('title', 'Dashboard')
    
@section('content')

    <div>
        @livewire(App\Livewire\FinanceOverview::class)
    </div>

    <div>
        @livewire(App\Livewire\BlogPostsChart::class)
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