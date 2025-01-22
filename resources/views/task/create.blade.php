@extends('layouts.main')

@section('title', 'Nova tarefa')
    
@section('content')

<div id="client-create-container" class="col-md-6 offset-md-3">

    <h2>Adicionar tarefa</h2>

    <form action="{{ route('task.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Título:</label>
            <input class="form-control" type="text" id="title" name="title" placeholder="Título da atividade" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <input class="form-control" type="text" id="description" name="description" placeholder="Descrição" required>
        </div>

        <div class="form-group">
            <label for="value">Valor:</label>
            <input class="form-control" type="text" name="value" id="value" placeholder="Valor da atividade" required>
        </div>

        <div class="form-group">
            <label for="predicted_hour">Horas:</label>
            <input class="form-control" type="text" name="predicted_hour" id="predicted_hour" placeholder="Horas previstas" required>
        </div>

        <input type="hidden" name="project_id" id="project_id" value="{{ $project->id }}">

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('project.show', $project->id) }}" id="create-btn" class="btn btn-dark" style="width: 45%">Cancelar</a>
            <input type="submit" id="create-btn" class="btn btn-dark" style="width: 45%" value="Adicionar tarefa">
        </div>

    </form>

</div>

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush