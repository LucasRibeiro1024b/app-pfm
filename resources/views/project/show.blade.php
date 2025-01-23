@extends('layouts.main')

@section('title', 'Projetos')
    
@section('content')

<h2>Lista de Projetos</h2>

    {{ $project }}

    <a href="{{ route('project.edit', $project->id) }}" class="btn btn-outline-primary ms-1 me-1"><i class="material-icons">edit</i></a>

    <form action="{{route('project.destroy', $project->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger ms-1"><i class="material-icons">delete</i></button>
    </form>
@endsection
