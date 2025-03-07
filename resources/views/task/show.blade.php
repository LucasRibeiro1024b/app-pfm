@extends('layouts.main')

@section('title', $task->title)
    
@section('content')

    
<div id="layout-form-container" class="card py-2 col-md-6 offset-md-3">

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
            <span class="input-group-text">Criado em:</span>
            <input class="form-control" type="date" id="created_at" name="created_at" value="{{date('Y-m-d', strtotime($task->created_at));}}" disabled>
        </div>
        
        <div class="input-group mb-4">
            <span class="input-group-text">Horas previstas:</span>
            <input class="form-control" id="predicted_hour" name="predicted_hour" value="{{ $task->formattedTime($task->predicted_hour) }}" disabled>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text">Consultor:</span>
            <input class="form-control" id="consultant" name="consultant" value="{{$task->consultant->name}}" disabled>
        </div>
        
        @if ($task->completed)

        <div class="input-group mb-4">
            <span class="input-group-text">Concluído em:</span>
            <input class="form-control" type="date" id="updated_at" name="updated_at" value="{{date('Y-m-d', strtotime($task->updated_at));}}" disabled>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text">Horas reais:</span>
            <input class="form-control" id="real_hour" name="real_hour" value="{{ $task->formattedTime($task->real_hour) }}" disabled>
        </div>
        @endif
        
    </div>

</div>

@include('components.button.back')

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush