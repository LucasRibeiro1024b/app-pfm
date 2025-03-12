@extends('layouts.main')

@section('title', 'Editar categoria')
    
@section('content')

<div id="layout-form-container" class="col-md-6 offset-md-3">

    @include('components.alert.error')
        
    <h2>Editar categoria</h2>

    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome:</label>
            <input class="form-control" type="text" id="name" name="name" placeholder="Nome da categoria" value="{{$category->name}}" required>
        </div>
        
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary" style="width: 45%">Cancelar</a>
            <input type="submit" id="create-btn" class="btn btn-primary" style="width: 45%" value="Salvar mudanças">
        </div>
    </form>

</div>

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush
