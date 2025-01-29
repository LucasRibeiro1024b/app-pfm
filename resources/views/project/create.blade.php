@extends('layouts.main')

@section('title', 'Adicionar projeto')
    
@section('content')

<div class="col-md-6 offset-md-3">

    @include('components.alert.error')

    <h2>Adicionar novo projeto</h2>

    <form action="{{route("project.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titulo:</label>
            <input class="form-control" type="text" id="title" name="title" placeholder="Titulo do Projeto" value="{{old('title')}}" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <input class="form-control" type="text" id="description" name="description" placeholder="Descrição" value="{{old('description')}}" required>
        </div>

        <div class="form-group">
            <label for="end_date">Data Término:</label>
            <input class="form-control" type="date" name="end_date" id="end_date" value="{{old('end_date')}}" required>
        </div>

        <div class="form-group">
            <label for="value">Valor</label>
            <input class="form-control" type="text" name="value" id="value" value="{{ number_format(old('value') ?? 0, 2, ',', '.') }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-select" aria-label="Default select example">
                <option disabled selected>Selecione uma opção</option>
                <option value="0" {{old('status') == 0 ? 'selected' : ''}}>Criado</option>
                <option value="1" {{old('status') == 1 ? 'selected' : ''}}>Em Andamento</option>
                <option value="2" {{old('status') == 2 ? 'selected' : ''}}>Finalizado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Cliente:</label>
            <select name="client_id" class="form-select" aria-label="Default select example">
                <option disabled selected>Selecione um cliente</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{old('client_id') == $client->id ? 'selected' : ''}}>{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Consultores:</label>
            <select name="consultants[]" class="form-select select2" aria-label="Default select example" multiple>
                <option disabled selected>Selecione um consultor</option>
                @foreach ($consultants as $consultant)
                    <option value="{{ $consultant->id }}" {{ in_array($consultant->id, old('consultants', [])) ? 'selected' : '' }}>{{ $consultant->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-1">
            <input type="submit" class="btn btn-primary" value="Adicionar projeto">
        </div>
    </form>
</div>

@endsection

@push('script')
    <script src="/js/formatacao/value.js"></script>
@endpush