@extends('layouts.main')

@section('title', 'Editar Receita')
    
@section('content')

<div id="layout-form-container" class="col-md-6 offset-md-3">

    @include('components.alert.error')
        
    <h2>Editar Receita</h2>

    <form action="{{ route('receipt.update', $receipt->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título:</label>
            <input class="form-control" type="text" id="title" name="title" placeholder="" value="{{ $receipt->title }}" required>
        </div>
        
        <div class="form-group">
            <label for="description">Descrição:</label>
            <input class="form-control" type="text" id="description" name="description" placeholder="" value="{{ $receipt->description }}" required>
        </div>
        
        <div class="form-group">
            <label for="value">Valor:</label>
            <input class="form-control" type="number" id="value" name="value" step="0.01" placeholder="" value="{{ $receipt->value }}" required>
        </div>
        
        <div class="form-group">
            <label for="payment_date">Data de Pagamento:</label>
            <input class="form-control" type="date" id="payment_date" name="payment_date" placeholder="" value="{{ $receipt->payment_date }}">
        </div>

        <div class="form-group">
            <label for="payment_date">Data de Vencimento:</label>
            <input class="form-control" type="date" id="end_date" name="end_date" placeholder="" value="{{ $receipt->end_date }}" required>
        </div>
        
        <div class="form-group">
            <label for="project_id">Projeto:</label>
            <select class="form-control" id="project_id" name="project_id" required>
                <option value="" disabled>Selecione um projeto</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ $receipt->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->title }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="client_id">Cliente:</label>
            <select class="form-control" id="client_id" name="client_id" required>
                <option value="" disabled>Selecione um cliente</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $receipt->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('finance.index') }}" class="btn btn-secondary" style="width: 45%">Cancelar</a>
            <input type="submit" id="create-btn" class="btn btn-primary" style="width: 45%" value="Salvar mudanças">
        </div>
    </form>

</div>

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush