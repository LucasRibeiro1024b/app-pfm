@extends('layouts.main')

@section('title', 'Projetos')
    
@section('content')

<h2>Lista de Projetos</h2>


@foreach ($projects as $project)
    {{ $project }}
@endforeach
    
@endsection
