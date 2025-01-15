@extends('layouts.main')

@section('title', 'Adicionar cliente')
    
@section('content')

<div id="client-create-container" class="col-md-6 offset-md-3">

    <h2>Adicionar novo cliente</h2>

    <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input class="form-control" type="text" id="name" name="name" placeholder="Nome do cliente" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email" placeholder="Endereço de email" required>
        </div>

        <div class="form-group">
            <label for="address">Endereço:</label>
            <input class="form-control" type="text" id="address" name="address" placeholder="Endereço local" required>
        </div>

        <div class="form-group">
            <label for="phone">Telefone:</label>
            <input class="form-control" type="tel" id="phone" name="phone" placeholder="Telefone para contato" required>
        </div>

        <div class="form-group">
            <label for="type">Tipo:</label>
            <div class="input-group">
                    <select name="type" id="type" class="form-select">
                        <option value="0">Pessoa Física (CPF)</option>
                        <option value="1">Pessoa Jurídica (CNPJ)</option>
                    </select>
                
                    <input class="form-control" type="text" id="cpfCnpj" name="cpfCnpj" placeholder="CPF ou CNPJ do cliente" required>
            </div>
        </div>

        <input type="submit" id="create-btn" class="btn btn-outline-dark w-100 mt-4" value="Adicionar cliente">

    </form>

</div>

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush