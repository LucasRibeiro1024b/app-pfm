<div id="tasks" class="col-md-8 ps-5">

    @include('components.alert.error')
        
    <div id="tasks-header" class="row mb-4">

        <h3 class="col-6 offset-3">Atividades</h3>

        <a href="{{ route('task.create', $project->id) }}" class="btn btn-success col-3">nova atividade</a>
      
    </div>

    <div id="tasks-list" class="overflow-auto border border-secondary-subtle rounded" style="height: 220px;">
        <table class="table text-center" >
            <thead>
                <tr class="align-middle lh-sm">
                    <th scope="col">título</th>
                    <th scope="col">valor</th>
                    <th scope="col" class="col-1">horas previstas</th>
                    <th scope="col" class="col-1">horas reais</th>
                    <th scope="col">ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($project->tasks as $task)
                    <tr class="align-middle">
                        <td><a href="{{ route('task.show', $task->id) }}" class="text-info-emphasis">{{ $task->title }}</a></td>
                        <td>R${{ number_format($task->value, 2, ',', '.') }}</td>
                        <td>{{ $task->predicted_hour }}</td>
                        <td>{{ $task->real_hour }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                
                                @if ($task->completed)

                                    <span class="badge text-bg-success me-2">finalizada</span>

                                @else

                                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#end-task-modal-{{$task->id}}"><i class="material-icons">check</i></button>

                                        <a href="{{ route('task.edit', $task->id) }}" class="btn btn-outline-primary mx-1"><i class="material-icons">edit</i></a>
                                  

                                    @include('task.components.modal')
                                    
                                @endif
                                    @include('components.modal.delete', [
                                        'route' => 'task.destroy',
                                        'name' => $task->title,
                                        'id' => $task->id
                                        ])

                            </div>
                        </td>
                    </tr>

                    

                @endforeach
            </tbody>
          </table>
    </div>
    
</div>