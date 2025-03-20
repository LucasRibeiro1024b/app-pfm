@extends('layouts.main')

@section('title', 'Receita')

@section('content')

<div id="layout-form-container" class="card py-2 col-md-6 offset-md-3">

    <div class="card-body px-5 py-3">

        <h2 class="card-title pb-3">{{$expense->title}}</h2>

        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons"></i>Descrição:</span>
            <input class="form-control" value="{{$expense->description}}" disabled>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons"></i>Valor:</span>
            <input class="form-control" value="{{$expense->value}}" disabled>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons"></i>Quantidade:</span>
            <input class="form-control" value="{{$expense->quantity}}" disabled>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons"></i>Horas:</span>
            <input class="form-control" value="{{$expense->hours}}" disabled>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons"></i>Fornecedor:</span>
            <input class="form-control" value="{{$expense->supplier->name}}" disabled>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons"></i>Categoria:</span>
            <input class="form-control" value="{{$expense->category->name}}" disabled>
        </div>
        
        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons"></i>Data de pagamento:</span>
            <input class="form-control" value="{{$expense->payment_date}}" disabled>
        </div>
        
        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons"></i>Data de vencimento:</span>
            <input class="form-control" value="{{$expense->end_date}}" disabled>
        </div>
        
    </div>

</div>

@include('components.button.back')

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush