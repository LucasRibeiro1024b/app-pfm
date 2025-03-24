@extends('layouts.main')

@section('title', 'Editar fornecedor')
    
@section('content')

<div id="layout-form-container" class="col-md-6 offset-md-3">

    @include('components.alert.error')

    <h2>Editar fornecedor</h2>

    <form action="{{ route('supplier.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Laravel directive for PUT method in form --}}

        <div class="form-group">
            <label for="name">Nome:</label>
            <input class="form-control" type="text" id="name" name="name" placeholder="Nome do fornecedor" value="{{ old('name', $supplier->name) }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email" placeholder="Email do fornecedor" value="{{ old('email', $supplier->email) }}">
        </div>
        
        <div class="form-group">
            <label for="personType">Tipo de Pessoa:</label>
            <select class="form-control" id="personType" name="personType" required>
                <option value="0" {{ old('personType', $supplier->personType) == 0 ? 'selected' : '' }}>Física</option>
                <option value="1" {{ old('personType', $supplier->personType) == 1 ? 'selected' : '' }}>Jurídica</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="personTypeCode">CPF/CNPJ:</label>
            <input class="form-control" type="text" id="personTypeCode" name="personTypeCode" placeholder="CPF ou CNPJ" value="{{ old('personTypeCode', $supplier->personTypeCode) }}" required>
        </div>
        
        <div class="form-group">
            <label for="address">Endereço:</label>
            <input class="form-control" type="text" id="address" name="address" placeholder="Endereço do fornecedor" value="{{ old('address', $supplier->address) }}">
        </div>
        
        <div class="form-group">
            <label for="telephone">Telefone:</label>
            <input class="form-control" type="text" id="telephone" name="telephone" placeholder="Telefone do fornecedor" value="{{ old('telephone', $supplier->telephone) }}">
        </div>
        
        <div class="form-group">
            <label for="user_id">Usuário é Consultor?</label>
            <select class="form-control" id="user_id" name="user_id">
                <option value="">Não</option>
                @foreach($consultants as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $supplier->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('finance.index') }}" class="btn btn-secondary" style="width: 45%">Cancelar</a>
            @include('components.button.update', ['entity' => 'fornecedor'])
        </div>
    </form>
</div>

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush
