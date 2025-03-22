@extends('layouts.main')

@section('title', 'Dashboard')
    
@section('content')

    <p>Bem-vindo {{auth()->user()->name}}, este é o dashboard</p>

    <div>
        @livewire(App\Livewire\StatsOverview::class)
    </div>

    <div>
        @livewire(App\Livewire\BlogPostsChart::class)
    </div>
    
@endsection