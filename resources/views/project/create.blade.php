@extends('layouts.main')

@section('title', 'Adicionar projeto')
    
@section('content')

<div class="col-md-6 offset-md-3">

    <h2>Adicionar novo projeto</h2>

    <form action="{{route("project.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titulo:</label>
            <input class="form-control" type="text" id="title" name="title" placeholder="Titulo do Projeto" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <input class="form-control" type="text" id="description" name="description" placeholder="Descrição" required>
        </div>

        <div class="form-group">
            <label for="">Data Término:</label>
            <input class="form-control" type="text">
        </div>

        <div class="form-group">
            <label for="">Valor</label>
            <input class="form-control" type="text">
        </div>

        <div class="form-group">
            <label for="description">Cliente:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Selecione uma opção</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Consultores:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Selecione um consultor</option>
                @foreach ($consultants as $consultant)
                    <option value="{{ $consultant->id }}">{{ $consultant->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-1">
            <input type="submit" class="btn btn-primary" value="Adicionar projeto">
        </div>

    </form>

</div>

@endsection