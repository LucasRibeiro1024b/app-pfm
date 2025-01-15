@extends('layouts.main')

@section('title', 'Dashboard')
    
@section('content')

    <p>Bem-vindo {{auth()->user()->name}}, este é o dashboard</p>
    
@endsection