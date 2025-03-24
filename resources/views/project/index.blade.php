@extends('layouts.main')

@section('title', 'Projetos')
    
@section('content')

<div class="d-flex justify-content-between mb-4">
    <h2>Lista de Projetos</h2>
    <input class="form-control" type="text" placeholder="pesquisar" style="width: 300px">
    <a href="{{ route('project.create') }}" class="btn btn-success">Novo projeto</a>
</div>

<div class="row row-cols-3 row-cols-md-3 g-4">
    @foreach ($projects as $project)
        <div class="col">
            <div class="card " style="height: 300px">
                <div class="card-body d-flex row align-items-between">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ $project->description }}</p>
                    <p class="card-text"><small class="text-body-secondary">{{ date('d/m/Y', strtotime($project->created_at)) }}</small></p>
                    <div>
                        <a href="{{ route('project.show', ['id' => $project->id]) }}" class="btn btn-primary">Visualizar</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Paginação -->
<div class="d-flex justify-content-center pb-3 mt-auto">
    {{ $projects->links('pagination::pagination') }}
</div>

@endsection


