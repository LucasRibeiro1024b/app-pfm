@extends('layouts.main')

@section('title', 'Fornecedores')
    
@section('content')

<div class="d-flex justify-content-between">
    <h2>Fornecedores</h2>
    @can('create', 'App\Models\Supplier')
        <a href="{{ route('supplier.create') }}" class="btn btn-success">Adicionar fornecedor</a>
    @endcan
</div>

{{-- Botão de filtro por fornecedor, se necessário --}}
{{-- <button class="btn btn-info">Filtrar fornecedores</button> --}}

<table class="table">
    <thead class="table text-center">
        <tr>
            <th scope="col text-center">#</th>
            <th scope="col">NOME</th>
            <th scope="col">TIPO DE PESSOA</th>
            <th scope="col">CNPJ/CPF</th>
            <th scope="col">TELEFONE</th>
            @can('action', 'App\Models\Supplier')
                <th scope="col">AÇÕES</th>
            @endcan
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($suppliers as $index => $supplier)
            <tr>
                <th scope="row">{{ ($suppliers->currentPage() - 1) * $suppliers->perPage() + $index + 1 }}</th>
                <td scope="row">{{ $supplier->name }}</td>
                <td>{{ $supplier->personType ? 'Pessoa Física' : 'Pessoa Jurídica' }}</td>
                <td>{{ $supplier->personTypeCode }}</td>
                <td>{{ $supplier->telephone }}</td>

                @can('action', $supplier)
                    <td class="td-gray align-middle">
                        <div class="d-flex justify-content-center align-items-center">

                            @can('update', $supplier)
                                <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-outline-primary me-1"><i class="material-icons">edit</i></a>
                            @endcan
                            
                            @can('delete', $supplier)
                                @include('components.modal.delete', [
                                    'route' => 'supplier.destroy',
                                    'name' => $supplier->name,
                                    'id' => $supplier->id
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
    {{ $suppliers->links('pagination::pagination') }}
</div>
    
@endsection

@push('style')
    <link rel="stylesheet" href="/css/components/table.css">
@endpush
