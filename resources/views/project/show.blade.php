@extends('layouts.main')

@section('title', 'Projetos')

@section('content')

<div id="project-details" class="row">

    <div id="project-show" class="card col-md-4 p-0">

        <h5 class="card-header text-center">{{ $project->title }}</h5>
        
        <div class="card-body py-3 d-flex row align-items-between">

            <span class="card-text py-3">Cliente: 
            @isset($project->client)
                {{ $project->client->name  }}
            @else
                {{'não disponível'}}
            @endisset</span>

            <p class="card-text text-justify py-3">{{$project->description}}</p>

            <p class="card-text py-3"> Status: 
                @switch($project->status)
                    @case(0)
                        criado
                        @break
                    @case(1)
                        em andamento
                        @break
                    @case(2)
                        finalizado
                        @break
                    @default
                        
                @endswitch
            </p>

            <div class="d-flex justify-content-between align-items-center row">

                <div class="row">
                    <p>Despesa Prevista: R$ {{ number_format($project->expectedExpense(), 2, ',', '.') }}</p>
                    <p>Receita Prevista: R$ {{ number_format($project->expectedReceipt(), 2, ',', '.') }}</p>
                    <p>Lucro Previsto: R$ {{ number_format($project->expectedProfit(), 2, ',', '.') }}</p>
                
                    <p>Despesa: R$ {{ number_format($project->realExpense(), 2, ',', '.') }}</p>
                    <p>Receita: R$ {{ number_format($project->realReceipt(), 2, ',', '.') }}</p>
                    <p>Lucro: R$ {{ number_format($project->realProfit(), 2, ',', '.') }}</p>
                
                    <p>andamento: {{ number_format($project->progress(), 2, ',', '.') }}%</p>
                </div>

                <div class="d-flex">
                    
                    @can('update', $project)
                        <a href="{{ route('project.edit', $project->id) }}" class="btn btn-outline-primary ms-1 me-1"><i class="material-icons">edit</i></a>
                    @endcan
                    
                    @can('delete', $project)
                        @include('components.modal.delete', [
                            'route' => 'project.destroy',
                            'name' => $project->title,
                            'id' => $project->id
                        ])
                    @endcan
                </div>

            </div>

        </div>
    </div>

    <div class="col-md-8">
        @include('task.index')
        @include('finance.index-project')
    </div>

</div>
   
@endsection