@extends('layouts.main')

@section('title', 'Projetos')

@section('content')

<div id="project-details" class="row">

    <div id="project-show" class="card col-md-4 p-0">

        <h5 class="card-header text-center">{{ $project->title }}</h5>
        
        <div class="card-body py-3">

            <span class="card-text py-3">Cliente: {{ $project->client->name }}</span>

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

            <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('project.edit', $project->id) }}" class="btn btn-outline-primary ms-1 me-1"><i class="material-icons">edit</i></a>
                <form action="{{route('project.destroy', $project->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger ms-1"><i class="material-icons">delete</i></button>
                </form>
            </div>

        </div>
    </div>

    @include('task.index')

</div>

@endsection