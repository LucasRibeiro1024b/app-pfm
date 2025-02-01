@extends('layouts.main')

@section('title', 'Adicionar cliente')
    
@section('content')


<div id="layout-form-container" class="col-md-6 offset-md-3">

    @include('components.alert.error')

    <h2>Adicionar novo cliente</h2>

    <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input class="form-control" type="text" id="name" name="name" placeholder="Nome do cliente" value="{{old('name')}}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email" placeholder="Endereço de email" value="{{old('email')}}" required>
        </div>

        <div class="form-group">
            <label for="address">Endereço:</label>
            <input class="form-control" type="text" id="address" name="address" placeholder="Endereço local" value="{{old('address')}}" required>
        </div>

        <div class="form-group">
            <label for="phone">Telefone:</label>
            <input class="form-control" type="tel" id="phone" name="phone" placeholder="Telefone para contato" value="{{old('phone')}}" required>
        </div>

        <div class="form-group">
            <label for="type">Tipo:</label>
            <div class="input-group">
              <select name="type" id="type" class="form-select" onchange="atualizarMascara()">
                <option value="0" {{old('type') ? '' : 'selected'}}>Pessoa Física (CPF)</option>
                <option value="1" {{old('type') ? 'selected' : ''}}>Pessoa Jurídica (CNPJ)</option>
              </select>
              
              <input class="form-control" type="text" id="cpfCnpj" name="cpfCnpj" placeholder="Digite o CPF" oninput="aplicarMascara()" value="{{ old('cpfCnpj') }}" required>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('clients.index') }}" class="btn btn-dark" style="width: 45%">Cancelar</a>
            <input type="submit" id="create-btn" class="btn btn-dark" style="width: 45%" value="Adicionar cliente">
        </div>

    </form>

</div>


@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush

@push('script')
    <script src="/js/formatacao/cpfCnpj.js"></script>
    <script src="/js/formatacao/phone.js"></script>
@endpush

