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

                <td class="td-gray">
                    @foreach ($client->projects as $index => $project)
                        <span>{{$project->title}}</span>
                        @if (count($client->projects) > ($index+1))
                            ; 
                        @endif
                    @endforeach
                </td>

                <td class="td-gray align-middle">
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('client.show', $client->id) }}" class="btn btn-outline-info"><i class="material-icons">info</i></a>
                        <a href="{{ route('client.edit', $client->id) }}" class="btn btn-outline-primary ms-1 me-1"><i class="material-icons">edit</i></a>

                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$client->id}}"><i class="material-icons">delete</i></button>

                        @include('components.modal.delete', [
                            'route' => 'client.destroy',
                            'name' => $client->name,
                            'id' => $client->id
                        ])

                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    
@endsection

@push('style')
    <link rel="stylesheet" href="css/components/table.css">
@endpush