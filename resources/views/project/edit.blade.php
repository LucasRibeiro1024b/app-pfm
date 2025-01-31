@extends('layouts.main')

@section('title', 'Projetos')
    
@section('content')

<div class="col-md-6 offset-md-3">

    @include('components.alert.error')

    <h2>Atualizar Projeto: {{ $project->title }}</h2>

    <form action="{{route("project.update", $project->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titulo:</label>
            <input class="form-control" type="text" id="title" name="title" placeholder="Titulo do Projeto" value="{{ $project->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <input class="form-control" type="text" id="description" name="description" placeholder="Descrição" value="{{ $project->description }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">Data Término:</label>
            <input class="form-control" type="date" name="end_date" id="end_date" value="{{ $project->end_date }}">
        </div>

        <div class="form-group">
            <label for="value">Valor</label>
            {{old('value')}}
            <input class="form-control" type="text" name="value" id="value" value="{{ number_format(((old('value') ? old('value') : $project->value)) ?? 0, 2, ',', '.') }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-select" aria-label="Default select example">
                <option selected>Selecione uma opção</option>
                @foreach(['Criado', 'Em Andamento', 'Finalizado'] as $key => $status)
                    <option value="{{ $key }}" {{ old('status', $project->status) == $key ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Cliente:</label>
            <select name="client_id" class="form-select" aria-label="Default select example">
                <option disabled selected>Selecione um cliente</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{old('client_id', $project->client_id) == $client->id ? 'selected' : ''}}>{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Consultores:</label>
            <select name="consultants[]" class="form-select select2" aria-label="Default select example" multiple>
                <option disabled selected>Selecione um consultor</option>
                @foreach ($consultants as $consultant)
                    <option value="{{ $consultant->id }}" {{ $project->consultants->contains($consultant->id) ? 'selected' : '' }}>{{ $consultant->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-1">
            <input type="submit" class="btn btn-primary" value="Atualizar">
        </div>
    </form>
</div>

@endsection

@push('script')
    <script src="/js/formatacao/value.js"></script>
@endpush