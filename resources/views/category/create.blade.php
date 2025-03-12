@extends('layouts.main')

@section('title', 'Adicionar categoria')
    
@section('content')


<div id="layout-form-container" class="col-md-6 offset-md-3">

    @include('components.alert.error')

    <h2>Adicionar nova categoria</h2>

    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input class="form-control" type="text" id="name" name="name" placeholder="Nome da categoria" value="{{old('name')}}" required>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary" style="width: 45%">Cancelar</a>
            @include('components.button.add', ['entity' => 'categoria'])
        </div>

    </form>

</div>


@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush
