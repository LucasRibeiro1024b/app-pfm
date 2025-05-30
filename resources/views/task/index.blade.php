<div id="tasks" class="ps-5 mb-4">

    @include('components.alert.error')
        
    <div id="tasks-header" class="row mb-4">

        <h3 class="col-6 offset-3">Atividades</h3>

        @can('create', 'App\Models\Task')
            <a href="{{ route('task.create', $project->id) }}" class="btn btn-success col-3">nova atividade</a>
        @endcan
      
    </div>

    <div id="tasks-list" class="overflow-auto border border-secondary-subtle rounded" style="height: 220px;">
        <table class="table text-center" >
            <thead>
                <tr class="align-middle lh-sm">
                    <th scope="col">título</th>
                    <th scope="col">valor</th>
                    <th scope="col" class="col-1">horas previstas</th>
                    <th scope="col" class="col-2">horas reais</th>
                    {{-- {{formatação acima para as horas de "horas" ocuparem mais espaço se não tiver a coluna de "ações"}} --}}
                    @can('action', 'App\Models\Task')
                        <th scope="col">ações</th>
                    @endcan
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($project->tasks as $task)
                    <tr class="align-middle">
                        <td><a href="{{ route('task.show', $task->id) }}" class="text-info-emphasis">{{ $task->title }}</a></td>
                        <td>R${{ number_format($task->value, 2, ',', '.') }}</td>
                        <td>{{ $task->formattedTime($task->predicted_hour) }}</td>
                        <td>{{ $task->formattedTime($task->real_hour) }}</td>

                        @can('action', $task)
                            
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    
                                    @if ($task->completed)

                                        <span class="badge text-bg-success me-2">finalizada</span>

                                    @else

                                        @can('update', $task)

                                            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#end-task-modal-{{$task->id}}"><i class="material-icons">check</i></button>

                                            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-outline-primary mx-1"><i class="material-icons">edit</i></a>

                                            @include('task.components.modal')

                                        @endcan
                                        
                                    @endif
                                        
                                    @can('delete', $task)
                                        @include('components.modal.delete', [
                                            'route' => 'task.destroy',
                                            'name' => $task->title,
                                            'id' => $task->id
                                        ])
                                    @endcan

                                </div>
                            </td>

                        @endcan

                    </tr>

                    

                @endforeach
            </tbody>
          </table>
    </div>
    
</div>