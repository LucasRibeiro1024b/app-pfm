@extends('layouts.main')

@section('title', 'Clientes')
    
@section('content')

<h2>Lista de clientes</h2>

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
        @foreach ($clients as $index => $client)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>

                <td>{{ $client->name }}</td>
                
                <td class="td-gray">
                    {{ $client->type ? 'PJ' : 'PF' }}
                </td>

                <td class="td-gray">{{ $client->email }}</td>
                <td class="td-gray">x</td>
            </tr>
        @endforeach
    </tbody>
</table>
    
@endsection

@push('style')
    <link rel="stylesheet" href="">
@endpush