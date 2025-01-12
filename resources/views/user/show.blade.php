@extends('layouts.main')

@section('title', 'Usuários')
    
@section('content')

<h2>Lista de usuários</h2>

<table class="table">
    <thead class="table">
        <tr>
            <th scope="col">#</th>
            <th scope="col">NOME</th>
            <th scope="col">TIPO</th>
            <th scope="col">EMAIL</th>
            <th scope="col">PROJETOS</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">#</th>
                <td>{{ $user->name }}</td>
                
                <td class="user-td">
                @switch($user->type)
                    @case(1)
                        Sócio
                        @break
                    @case(2)
                        Consultor
                        @break
                    @case(3)
                        Financeiro
                        @break
                    @case(4)
                        Estagiário
                        @break
                    @default
                        
                @endswitch
                </td>

                <td class="user-td">{{ $user->email }}</td>
                <td class="user-td">x</td>
            </tr>
        @endforeach
    </tbody>
</table>
    
@endsection