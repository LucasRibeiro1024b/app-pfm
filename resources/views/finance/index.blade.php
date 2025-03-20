@extends('layouts.main')

@section('title', 'Financeiro')
    
@section('content')

<div class="d-flex justify-content-between">
    <h2>Lista de Receitas e Despesas</h2>

    <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Opções
        </button>
        <ul class="dropdown-menu">
          <li><a href="{{ route('receipt.create') }}" class="dropdown-item">Adicionar receita</a></li>
          <li><a href="{{ route('expense.create') }}" class="dropdown-item">Adicionar despesa</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a href="{{ route('categories.index') }}" class="dropdown-item">Ver categorias</a></li>
        </ul>
    </div>

</div>

<table class="table">
    <thead class="table text-center">
        <tr>
            <th scope="col">#</th>
            <th scope="col">TÍTULO</th>
            <th scope="col">VALOR</th>
            <th scope="col">PROJETO</th>
            <th scope="col">DATA PAGAMENTO</th>
            <th scope="col">DATA VENCIMENTO</th>
            <th scope="col">AÇÕES</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($finances as $finance)
        <tr>
            <td>{{ $finance->type }}</td>
            
            @if ($finance->type == 'Despesa')
                <td><a href=" {{route('expense.show', $finance->id)}} ">{{ $finance->title }}</a></td>
            @else
                {{-- <td><a href=" {{route('receipt.show', $finance->id)}} ">{{ $finance->title }}</a></td> --}}
            @endif

            <td>{{ $finance->value }}</td>
            <td>{{ $finance->project->title }}</td>
            <td>{{ $finance->payment_date ? $finance->payment_date : 'Aguardando Pagamento' }}</td>
            <td>{{ $finance->end_date }}</td>
            <td>
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
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection


