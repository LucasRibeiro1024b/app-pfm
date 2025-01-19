@extends('layouts.main')

@section('title', 'Cliente')
    
@section('content')

<div id="client-create-container" class="card py-2 col-md-6 offset-md-3">

    <div class="card-body px-5 py-3">
        <h2 class="card-title pb-3">{{$client->name}}</h2>
        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons">email</i></span>
            <input class="form-control" type="email" id="email" name="email" placeholder="Endereço de email" value="{{$client->email}}" disabled>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons">home</i></span>
            <input class="form-control" type="text" id="address" name="address" placeholder="Endereço local" value="{{$client->address}}" disabled>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons">phone</i></span>
            <input class="form-control" type="tel" id="phone" name="phone" placeholder="Telefone para contato" value="{{$client->phone}}" disabled>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons">badge</i></span>
                <input class="form-control" type="text" id="cpfCnpj" name="cpfCnpj" placeholder="CPF ou CNPJ do cliente" value=" {{$client->cpfCnpj}} ({{ $client->type ? 'CNPJ' : 'CPF' }})" disabled>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text"><i class="material-icons">work</i></span>
            <input class="form-control" type="text" id="project" name="project" placeholder="Projetos" value="projetos..." disabled>
        </div>
        <a href="{{ route('clients.index') }}" id="create-btn" class="btn btn-dark w-100 mt-1" value="Voltar">Voltar</a>
    </div>

</div>

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush