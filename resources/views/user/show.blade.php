@extends('layouts.main')

@section('title', 'Usuários')

@section('content')

    <div id="client-create-container" class="col-md-6 offset-md-3">

        @include('components.alert.error')

        <h2>{{$user->name}}</h2>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Endereço de email"
                    value="{{$user->email}}" disabled>
            </div>

            <div class="form-group">
                <label for="value">Valor</label>
                <input class="form-control" type="text" name="value_hour" id="value"
                    placeholder="Valor por hora trabalhada" value="{{$user->value_hour}}" disabled>
            </div>

            <div class="form-group">
                <label for="type">Cargo</label>
                <select id="type" name="type" class="form-select" disabled>
                    @foreach(['Sócio', 'Consultor', 'Financeiro', 'Estagiário'] as $key => $type)
                        <option value="{{$key}}" {{ old('type', $user->type) == $key ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="form-group">
                <label for="password">Nova senha</label>
                <input id="password" class="form-control" type="password" name="password" placeholder="Senha" disabled>
            </div> --}}

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('users.index') }}" id="create-btn" class="btn btn-dark w-100">Voltar</a>
            </div>

    </div>

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush

@push('script')
    <script src="/js/formatacao/phone.js"></script>
    <script src="/js/formatacao/value.js"></script>
@endpush
