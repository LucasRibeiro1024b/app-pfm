@extends('layouts.main')

@section('title', 'Clientes')
    
@section('content')

<div class="d-flex justify-content-between">
    <h2>Lista de clientes</h2>

    <input class="form-control" type="text" placeholder="pesquisar" style="width: 300px">

    @can('create', 'App\Models\Client')
        <a href="{{ route('client.create') }}" class="btn btn-success">adicionar novo cliente</a>
    @endcan
</div>

<table class="table">
    <thead class="table text-center">
        <tr>
            <th scope="col text-center">#</th>
            <th scope="col">NOME</th>
            <th scope="col">TIPO</th>
            <th scope="col" class="d-none d-md-table-cell">EMAIL</th>
            <th scope="col" class="col-4 d-none d-md-table-cell">PROJETOS</th>
            @can('action', 'App\Models\Client')
                <th scope="col">AÇÕES</th>
            @endcan
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($clients as $index => $client)
            <tr>
                <th scope="row">{{ ($clients->currentPage() - 1) * $clients->perPage() + $index + 1 }}</th>

                <td><a href="{{ route('client.show', $client->id) }}" class="text-info-emphasis">{{ $client->name }}</a></td>
                
                <td class="td-gray">
                    {{ $client->type ? 'PJ' : 'PF' }}
                </td>

                <td class="td-gray d-none d-md-table-cell">{{ $client->email }}</td>

                <td class="td-gray d-none d-md-table-cell">
                    @foreach ($client->projects as $index => $project)
                        <span>{{$project->title}}</span>
                        @if (count($client->projects) > ($index+1))
                            ; 
                        @endif
                    @endforeach
                </td>

                @can('action', $client)
                    <td class="td-gray align-middle">
                        <div class="d-flex justify-content-center align-items-center">

                            @can('update', $client)
                                <a href="{{ route('client.edit', $client->id) }}" class="btn btn-outline-primary me-1"><i class="material-icons">edit</i></a>
                            @endcan
                            
                            @can('delete', $client)
                                @include('components.modal.delete', [
                                    'route' => 'client.destroy',
                                    'name' => $client->name,
                                    'id' => $client->id
                                    ])
                            @endcan

                        </div>
                    </td>
                @endcan
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Paginação -->
<div class="d-flex justify-content-center pb-3 mt-auto">
    {{ $clients->links('pagination::pagination') }}
</div>
    
@endsection

@push('style')
    <link rel="stylesheet" href="css/components/table.css">
@endpush