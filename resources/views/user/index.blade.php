@extends('layouts.main')

@section('title', 'Usuários')
    
@section('content')

<div class="d-flex justify-content-between">
    <h2>Lista de usuários</h2>

    @can('create', 'App\Models\User')
        <a href="{{ route('user.create') }}" class="btn btn-success">novo usuário</a>
    @endcan
</div>

<table class="table">
    <thead class="table text-center">
        <tr>
            <th scope="col">#</th>
            <th scope="col">NOME</th>
            <th scope="col">TIPO</th>
            <th scope="col">EMAIL</th>
            <th scope="col">PROJETOS</th>
            @can('action', 'App\Models\User')
                <th scope="col">AÇÕES</th>
            @endcan
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($users as $index => $user)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                
                @can('view', $user)
                    <td><a href="{{ route('user.show', $user->id) }}" class="text-info-emphasis">{{ $user->name }}</a></td>
                @else
                    <td>{{ $user->name }}</td>
                @endcan
                
                <td class="td-gray">
                @switch($user->type)
                    @case(0)
                        Sócio
                        @break
                    @case(1)
                        Consultor
                        @break
                    @case(2)
                        Financeiro
                        @break
                    @case(3)
                        Estagiário
                        @break
                    @default
                        
                @endswitch
                </td>

                <td class="td-gray">{{ $user->email }}</td>
                <td class="td-gray">
                    @foreach ($user->projects as $index => $project)
                        <span>{{$project->title}}</span>
                        @if (count($user->projects) > ($index+1))
                            ; 
                        @endif
                    @endforeach
                </td>
                @can('action', $user)
                    <td class="td-gray align-middle">
                        <div class="d-flex justify-content-center align-items-center">
                            
                            @can('update', $user)
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-primary me-1"><i class="material-icons">edit</i></a>
                            @endcan
                            
                            @can('delete', $user)
                                @include('components.modal.delete', [
                                    'route' => 'user.destroy',
                                    'name' => $user->name,
                                    'id' => $user->id
                                    ])
                            @endcan
                            
                        </div>
                    </td>
                @endcan
            </tr>
        @endforeach
    </tbody>
</table>
    
@endsection

@push('style')
    <link rel="stylesheet" href="css/components/table.css">
@endpush