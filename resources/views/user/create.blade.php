@extends('layouts.main')

@section('title', 'Usuários')

@section('content')

    <div id="client-create-container" class="col-md-6 offset-md-3">

        @include('components.alert.error')

        <h2>Adicionar usuário</h2>

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Nome do usuário"
                    value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Endereço de email"
                    value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="value">Valor</label>
                <input class="form-control" type="text" name="value_hour" id="value"
                    placeholder="Valor por hora trabalhada" value="{{ old('value') }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Telefone</label>
                <input class="form-control" type="tel" id="phone" name="phone" placeholder="Telefone para contato"
                    value="{{ old('phone') }}" required>
            </div>

            <div class="form-group">
                <label for="type">Cargo</label>
                <select id="type" name="type" class="form-select" required>
                    <option value="0">Sócio</option>
                    <option value="1">Consultor</option>
                    <option value="2">Financeiro</option>
                    <option value="3">Estagiário</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input id="password" class="form-control" type="password" name="password" placeholder="Senha" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar senha</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Confirmar senha" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('users.index') }}" id="create-btn" class="btn btn-dark" style="width: 45%">Cancelar</a>
                <input type="submit" id="create-btn" class="btn btn-dark" style="width: 45%" value="Adicionar usuário">
            </div>

        </form>

    </div>

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush

@push('script')
    <script src="/js/formatacao/phone.js"></script>
    <script src="/js/formatacao/value.js"></script>
@endpush
