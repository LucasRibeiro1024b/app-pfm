@extends('layouts.main')

@section('title', 'Editar tarefa')
    
@section('content')

<div id="layout-form-container" class="col-md-6 offset-md-3 dados">

    @include('components.alert.error')

    <h2>Editar tarefa</h2>

    <form action="{{ route('task.update', $task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título:</label>
            <input class="form-control" type="text" id="title" name="title" placeholder="Título da atividade" value="{{ $task->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea class="form-control" id="description" name="description" placeholder="Descrição" required>{{ $task->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="value">Valor:</label>
            <input class="form-control" type="text" name="value" id="value" placeholder="Valor da atividade" value="{{ number_format($task->value ?? 0, 2, ',', '.') }}" required>
        </div>

        <div class="form-group">
            <label for="value">Consultor:</label>
            <select class="form-select" name="user_id" required>
                <option>Selecione um consultor</option>
                @foreach ($consultants as $consultant)
                    <option value="{{ $consultant->id }}" {{ $task->user_id == $consultant->id ? 'selected' : '' }}>{{ $consultant->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="predicted_hour">Horas Previstas:</label>
            <div class="d-flex" style="gap: 10px;">
                <input type="number" class="form-control hours" placeholder="Horas" min="0" max="999" value="{{$task->hours($task->predicted_hour)}}" required>
                <input  type="number" class="form-control minutes" placeholder="Minutos" min="0" max="59" value="{{$task->minutes($task->predicted_hour)}}" required>
            </div>
        </div>

        <input type="hidden" name="predicted_hour" class="timeHours" value="{{$task->predicted_hour}}">

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('project.show', $task->project_id) }}" class="btn btn-secondary" style="width: 45%">Cancelar</a>
            <input type="submit" id="create-btn" class="btn btn-primary" style="width: 45%" value="Salvar">
        </div>

        <input type="hidden" name="id" value="{{ $task->id }}">

    </form>

</div>

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush

@push('script')
    <script src="/js/formatacao/value.js"></script>
    <script src="/js/formatacao/hour.js"></script>
@endpush