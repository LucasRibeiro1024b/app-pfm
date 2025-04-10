@extends('layouts.main')

@section('title', 'Usuários')

@section('content')

    <div id="layout-form-container" class="col-md-6 offset-md-3">

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
                <label for="type">Cargo</label>
                <select id="type" name="type" class="form-select" required>
                    <option value="{{auth()->user()->roles()[0]}}">Sócio</option>
                    <option value="{{auth()->user()->roles()[1]}}">Consultor</option>
                    <option value="{{auth()->user()->roles()[2]}}">Financeiro</option>
                    <option value="{{auth()->user()->roles()[3]}}">Estagiário</option>
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
                <a href="{{ route('users.index') }}" class="btn btn-secondary" style="width: 45%">Cancelar</a>
                @include('components.button.add', ['entity' => 'usuário'])
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
