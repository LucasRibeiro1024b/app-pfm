@isset($user->tasks[0])

    <h3 class="card-title pb-3 text-center">Projetos e Atividades</h3>

    <div class="accordion" id="accordionPanelsStayOpenExample">
        @foreach ($user->tasks->pluck('project')->unique('id') as $project)
            {{-- <a href="{{ route('project.show', $project->id) }}"
                class="list-group-item list-group-item-action">{{ $project->title }}</a> --}}
            <div class="accordion-item">

                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapse-{{ $project->id }}" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapse-{{ $project->id }}">
                        {{ $project->title }}
                    </button>
                </h2>

                <div id="panelsStayOpen-collapse-{{ $project->id }}" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ol class="list-group list-group-flush w-100">
                            @foreach ($project->tasks as $task)
                                @if ($task->consultant->id == $user->id)
                                    <a href="{{ route('task.show', $task->id) }}"
                                        class="list-group-item text-info-emphasis d-flex justify-content-between">{{ $task->title }}
                                        @if ($task->completed)
                                            <span class="badge text-bg-success top-0 end-0 m-2">finalizada</span>
                                        @else
                                            <span class="badge text-bg-warning top-0 end-0 m-2">em andamento</span>
                                        @endif

                                    </a>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </div>

            </div>
        @endforeach
    </div>



@endisset


@push('style')
    <link rel="stylesheet" href="/css/components/accordion.css">
@endpush
