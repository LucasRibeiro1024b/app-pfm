@extends('layouts.main')

@section('title', 'Receita')

@section('content')

<div id="layout-form-container" class="card py-2 col-md-6 offset-md-3">

    <div class="card-body px-5 py-3">

        <h2 class="card-title pb-3">{{$receipt->title}}</h2>

        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons"></i>Descrição:</span>
            <input class="form-control" value="{{$receipt->description}}" disabled>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons"></i>Valor:</span>
            <input class="form-control" value="{{$receipt->value}}" disabled>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons"></i>Projeto:</span>
            <input class="form-control" value="{{$receipt->project->title}}" disabled>
        </div>
        
        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons"></i>Data de pagamento:</span>
            <input class="form-control" value="{{ $receipt->payment_date ? $receipt->payment_date : 'Aguardando Pagamento' }}" disabled>
        </div>
        
        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons"></i>Data de vencimento:</span>
            <input class="form-control" value="{{$receipt->end_date}}" disabled>
        </div>
        
    </div>

</div>

@include('components.button.back')

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush