@extends('layouts.main')

@section('title', 'Projetos')
    
@section('content')

<div class="d-flex justify-content-between">
    <h2>Lista de Projetos</h2>
    <a href="{{ route('project.create') }}" class="btn btn-outline-success">Adicionar</a>
</div>

<div class="row row-cols-3 row-cols-md-3 g-4">
    @foreach ($projects as $project)
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ $project->description }}</p>
                    <p class="card-text"><small class="text-body-secondary">{{ $project->created_at }}</small></p>
                    <a href="{{ route('project.show', ['id' => $project->id]) }}" class="btn btn-primary">Visualizar</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Paginação -->
<div class="d-flex justify-content-center mt-3 pb-3">
    {{ $projects->links('pagination::pagination') }}
</div>

@endsection


