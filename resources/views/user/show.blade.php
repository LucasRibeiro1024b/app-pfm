@extends('layouts.main')

@section('title', 'Usuários')

@section('content')

    <div id="layout-form-container" class="card col-md-6 offset-md-3">

        @include('components.alert.error')

        <div class="card-body px-5 py-3">
        
            <h2>{{$user->name}}</h2>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Endereço de email"
                    value="{{$user->email}}" disabled>
            </div>

            <div class="form-group">
                <label for="value">Valor por hora trabalhada</label>
                <input class="form-control" type="text" name="value_hour" id="value"
                    placeholder="Valor por hora trabalhada" value="R${{ number_format($user->value_hour, 2, ',', '.') }}" disabled>
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

            <div class="form-group my-4">

                @isset($user->projects[0])
                    <h3 class="card-title pb-3 text-center">Seus projetos</h3>
                    
                    <ol id="projects" class="list-group list-group-numbered w-100">
                        @foreach ($user->projects as $project)
                        <a href="{{ route('project.show', $project->id) }}" class="list-group-item list-group-item-action">{{$project->title}}</a>
                        @endforeach
                    </ol>
                @endisset
            </div>

        </div>

    </div>

    @include('components.button.back', [
    'route' => 'users.index',
    'id' => ''
    ])

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush

@push('script')
    <script src="/js/formatacao/phone.js"></script>
    <script src="/js/formatacao/value.js"></script>
@endpush
