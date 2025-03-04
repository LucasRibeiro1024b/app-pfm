@extends('layouts.main')

@section('title', 'Financeiro')
    
@section('content')

<div class="d-flex justify-content-between">
    <h2>Lista de Receitas e Despesas</h2>
    <a href="{{ route('receipt.create') }}" class="btn btn-outline-success">Adicionar Receita</a>
    <a href="{{ route('expense.create') }}" class="btn btn-outline-success">Adicionar Despesa</a>
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
            <td>{{ $finance->title }}</td>
            <td>{{ $finance->value }}</td>
            <td>{{ $finance->project->title }}</td>
            <td>{{ $finance->payment_date }}</td>
            <td>{{ $finance->end_date }}</td>
            <td>
                @if ( $finance->type == 'Receita' )
                    <a href="{{ route('receipt.edit', $finance->id) }}" class="btn btn-outline-primary me-1">Editar Receita<i class="material-icons">edit</i></a>
                    
                    @include('components.modal.delete', [
                        'route' => 'receipt.destroy',
                        'name' => $finance->title,
                        'id' => $finance->id
                    ])
                @else
                    <a href="{{ route('expense.edit', $finance->id) }}" class="btn btn-outline-primary me-1">Editar Despesa<i class="material-icons">edit</i></a>
                        
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


