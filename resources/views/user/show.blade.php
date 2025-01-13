@extends('layouts.main')

@section('title', 'Usuários')
    
@section('content')

<h2>Lista de usuários</h2>

<table class="table">
    <thead class="table text-center">
        <tr>
            <th scope="col">#</th>
            <th scope="col">NOME</th>
            <th scope="col">TIPO</th>
            <th scope="col">EMAIL</th>
            <th scope="col">PROJETOS</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($users as $index => $user)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $user->name }}</td>
                
                <td class="td-gray">
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

                <td class="td-gray">{{ $user->email }}</td>
                <td class="td-gray">x</td>
            </tr>
        @endforeach
    </tbody>
</table>
    
@endsection

@push('style')
    <link rel="stylesheet" href="css/user/show.css">
@endpush