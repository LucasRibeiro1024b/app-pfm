@extends('layouts.main')

@section('title', 'Categorias')
    
@section('content')

<div class="d-flex justify-content-between">
    <h2>Categorias</h2>
    @can('create', 'App\Models\Category')
        <a href="{{ route('category.create') }}" class="btn btn-success">adicionar categoria</a>
    @endcan
</div>

{{-- botão de filtro por categoria --}}

<table class="table">
    <thead class="table text-center">
        <tr>
            <th scope="col text-center">#</th>
            <th scope="col">NOME</th>
            @can('action', 'App\Models\Category')
                <th scope="col">AÇÕES</th>
            @endcan
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($categories as $index => $category)
            <tr>
                <th scope="row">{{ ($categories->currentPage() - 1) * $categories->perPage() + $index + 1 }}</th>

                <td scope="row">{{ $category->name }}</td>

                @can('action', $category)
                    <td class="td-gray align-middle">
                        <div class="d-flex justify-content-center align-items-center">

                            @can('update', $category)
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-outline-primary me-1"><i class="material-icons">edit</i></a>
                            @endcan
                            
                            @can('delete', $category)
                                @include('components.modal.delete', [
                                    'route' => 'category.destroy',
                                    'name' => $category->name,
                                    'id' => $category->id
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
    {{ $categories->links('pagination::pagination') }}
</div>
    
@endsection

@push('style')
    <link rel="stylesheet" href="css/components/table.css">
@endpush