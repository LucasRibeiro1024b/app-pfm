@extends('layouts.main')

@section('title', 'Usuários')
    
@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Tipo</th>
            <th scope="col">Email</th>
            <th scope="col">Projetos</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">#</th>
                <td>{{ $user->name }}</td>
                
                @switch($user->type)
                    @case(1)
                        <td>Sócio</td>
                        @break
                    @case(2)
                        <td>Consultor</td>
                        @break
                    @case(3)
                        <td>Financeiro</td>
                        @break
                    @case(4)
                        <td>Estagiário</td>
                        @break
                    @default
                        
                @endswitch

                <td>{{ $user->email }}</td>
                <td>x</td>
            </tr>
        @endforeach
        </tbody>
      </table>
    
@endsection