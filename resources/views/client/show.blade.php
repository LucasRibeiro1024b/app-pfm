@extends('layouts.main')

@section('title', 'Cliente')
    
@section('content')

<div id="layout-form-container" class="card py-2 col-md-6 offset-md-3">

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
        <div class="form-group mb-4">

            @isset($client->projects[0])
                <h3 class="card-title pb-3 text-center">Seus projetos</h3>
                
                <ol id="projects" class="list-group list-group-numbered w-100">
                    @foreach ($client->projects as $project)
                    <a href="{{ route('project.show', $project->id) }}" class="list-group-item list-group-item-action">{{$project->title}}</a>
                    @endforeach
                </ol>
            @endisset
        </div>
        
    </div>
    
</div>

@include('components.button.back', [
    'route' => 'clients.index',
    'id' => ''
])

@endsection

@push('style')
    <link rel="stylesheet" href="/css/client/create.css">
@endpush