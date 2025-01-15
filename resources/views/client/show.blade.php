@extends('layouts.main')

@section('title', 'Clientes')
    
@section('content')

<div class="d-flex justify-content-between">
    <h2>Lista de clientes</h2>
    <a href="{{ route('client.create') }}" class="btn btn-outline-success">adicionar novo cliente</a>
</div>

<table class="table">
    <thead class="table text-center">
        <tr>
            <th scope="col text-center">#</th>
            <th scope="col">NOME</th>
            <th scope="col">TIPO</th>
            <th scope="col">EMAIL</th>
            <th scope="col">PROJETOS</th>
            <th scope="col">AÇÕES</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($clients as $index => $client)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>

                <td>{{ $client->name }}</td>
                
                <td class="td-gray">
                    {{ $client->type ? 'PJ' : 'PF' }}
                </td>

                <td class="td-gray">{{ $client->email }}</td>

                <td class="td-gray">x</td>

                <td class="d-flex justify-content-center">
                    <a href="{{ route('client.edit', $client->id) }}" class="btn btn-outline-info me-1"><i class="material-icons">edit</i></a>
                    <form action="{{route('client.destroy', $client->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger ms-1"><i class="material-icons">delete</i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    
@endsection

@push('style')
    <link rel="stylesheet" href="css/components/table.css">
@endpush