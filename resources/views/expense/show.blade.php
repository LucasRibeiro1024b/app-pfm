@extends('layouts.main')

@section('title', 'Criar Receita')

@section('content')

<div id="layout-form-container" class="col-md-6 offset-md-3">

    @include('components.alert.error')
    
    @if(isset($expense))
        <h2>Atualizar Despesa</h2>
    @else 
        <h2>Criar Despesa</h2>
    @endif
    
    <form action="{{ isset($expense) ? route('expense.update', $expense->id) : route('expense.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($expense))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="title">Título:</label>
        <input class="form-control" type="text" id="title" name="title" placeholder="" value="{{ old('title', $expense->title ?? '') }}" required>
    </div>
    
    <div class="form-group">
        <label for="description">Descrição:</label>
        <textarea class="form-control" id="description" name="description" placeholder="">{{ old('description', $expense->description ?? '') }}</textarea>
    </div>
    
    <div class="form-group">
        <label for="value">Valor:</label>
        <input class="form-control" type="number" id="value" name="value" step="0.01" placeholder="" value="{{ old('value', $expense->value ?? '') }}" required>
    </div>
    
    <div class="form-group">
        <label for="payment_date">Data de Pagamento:</label>
        <input class="form-control" type="date" id="payment_date" name="payment_date" placeholder="" value="{{ old('payment_date', $expense->payment_date ?? '') }}">
    </div>

    <div class="form-group">
        <label for="quantity">Quantidade:</label>
        <input class="form-control" type="number" id="quantity" name="quantity" placeholder="" value="{{ old('quantity', $expense->quantity ?? '') }}">
    </div>

    <div class="form-group">
        <label for="hours">Horas:</label>
        <input class="form-control" type="number" id="hours" name="hours" placeholder="" value="{{ old('hours', $expense->hours ?? '') }}">
    </div>
    
    <div class="form-group">
        <label for="project_id">Projeto:</label>
        <select class="form-control" id="project_id" name="project_id" required>
            <option value="" disabled selected>Selecione um projeto</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ old('project_id', $expense->project_id ?? '') == $project->id ? 'selected' : '' }}>
                    {{ $project->title }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="supplier_id">Fornecedor:</label>
        <select class="form-control" id="supplier_id" name="supplier_id" required>
            <option value="" disabled selected>Selecione um fornecedor</option>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ old('supplier_id', $expense->supplier_id ?? '') == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="category_id">Categoria:</label>
        <select class="form-control" id="category_id" name="category_id" required>
            <option value="" disabled selected>Selecione uma categoria</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $expense->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('finance.index') }}" class="btn btn-secondary" style="width: 45%">Cancelar</a>
        <input type="submit" id="create-btn" class="btn btn-primary" style="width: 45%" value="{{ isset($expense) ? 'Salvar mudanças' : 'Criar Despesa' }}">
    </div>
</form>
</div>

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush