@extends('layouts.main')

@section('title', 'Financeiro')
    
@section('content')

<div class="mb-4 d-flex justify-content-between">
    <h2>Lista de Receitas e Despesas</h2>

    <input class="form-control" type="text" placeholder="pesquisar" style="width: 200px">

    <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Opções
        </button>
        <ul class="dropdown-menu">
          <li><a href="{{ route('receipt.create') }}" class="dropdown-item">Adicionar receita</a></li>
          <li><a href="{{ route('expense.create') }}" class="dropdown-item">Adicionar despesa</a></li>
          <li><a href="{{ route('supplier.create') }}" class="dropdown-item">Adicionar Fornecedor</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a href="{{ route('categories.index') }}" class="dropdown-item">Ver categorias</a></li>
          <li><a href="{{ route('supplier.index') }}" class="dropdown-item">Ver Fornecedores</a></li>
        </ul>
    </div>

</div>

<table class="table">
    <thead class="table text-center">
        <tr>
            <th scope="col">#</th>
            <th scope="col">TÍTULO</th>
            <th scope="col">VALOR</th>
            <th scope="col">DATA PAGAMENTO</th>
            <th scope="col">DATA VENCIMENTO</th>
            @can('action', 'App\Models\Expense')
                <th scope="col">AÇÕES</th>
            @endcan
        </tr>
    </thead>
    <tbody class="text-center align-middle">
        @foreach ($finances as $finance)
        <tr>
            <td>{{ $finance->type }}</td>
            
            @if ($finance->type == 'Despesa')
                <td><a href=" {{route('expense.show', $finance->id)}}" class="text-info-emphasis">{{ $finance->title }}</a></td>
            @else
                <td><a href=" {{route('receipt.show', $finance->id)}}" class="text-info-emphasis">{{ $finance->title }}</a></td>
            @endif

            <td>R${{ number_format($finance->value, 2, ',', '.') }}</td>
            <td>{{ $finance->payment_date ? date('d/m/Y', strtotime($finance->payment_date)) : 'Aguardando Pagamento' }}</td>
            <td>{{ date('d/m/Y', strtotime($finance->end_date)) }}</td>
            
            @can('action', 'App\Models\Expense')
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        @if ( $finance->type == 'Receita' )
                            <a href="{{ route('receipt.edit', $finance->id) }}" class="btn btn-outline-primary me-1"><i class="material-icons">edit</i></a>
                            
                            @include('components.modal.delete', [
                                'route' => 'receipt.destroy',
                                'name' => $finance->title,
                                'id' => $finance->id
                            ])
                        @else
                            <a href="{{ route('expense.edit', $finance->id) }}" class="btn btn-outline-primary me-1"><i class="material-icons">edit</i></a>
                                
                            @include('components.modal.delete', [
                                'route' => 'expense.destroy',
                                'name' => $finance->title,
                                'id' => $finance->id
                            ])
                        @endif
                    </div>
                </td>
            @endcan
        </tr>
    @endforeach
    </tbody>
</table>

<!-- Paginação -->
<div class="d-flex justify-content-center pb-3 mt-auto">
    {{ $finances->links('pagination::pagination') }}
</div>
@endsection


