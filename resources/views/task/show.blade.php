@extends('layouts.main')

@section('title', $task->title)
    
@section('content')

    
<div id="client-create-container" class="card py-2 col-md-6 offset-md-3">

    <div class="card-body px-5 py-3">

        <h2 class="card-title">{{$task->title}}</h2>

        @if ($task->completed)
            <span class="badge text-bg-success position-absolute top-0 end-0 m-2">finalizada</span>
        @else
            <span class="badge text-bg-warning position-absolute top-0 end-0 m-2">em andamento</span>
        @endif

        <div class="form-group mb-4 text-center">
            <a href="{{ route('project.show', $task->project_id) }}" class="text-info-emphasis">{{$task->project->title}}</a>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text">Descrição:</span>
            <textarea class="form-control" id="title" name="title" disabled>{{$task->description}}</textarea>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text">Valor:</span>
            <input class="form-control" id="value" name="value" value="R${{ number_format($task->value, 2, ',', '.') }}" disabled>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text">Horas previstas:</span>
            <input class="form-control" id="predicted_hour" name="predicted_hour" value="{{ $task->predicted_hour }}" disabled>
        </div>

        @if ($task->completed)
        <div class="input-group mb-4">
            <span class="input-group-text">Horas reais:</span>
            <input class="form-control" id="real_hour" name="real_hour" value="{{ $task->real_hour }}" disabled>
        </div>
        @endif

        

        <a href="{{ route('project.show', $task->project_id) }}" id="create-btn" class="btn btn-dark w-100 mt-1" value="Voltar">Voltar</a>
        
    </div>

</div>

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush