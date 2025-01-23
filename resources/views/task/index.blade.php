<div id="tasks" class="col-md-8 ps-5">
        
    <div id="tasks-header" class="row mb-4">

        <h3 class="col-6 offset-3">Atividades</h3>

        <div class="col-3">
            <form action="{{ route('task.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <button type="submit" class="btn btn-success col-12">nova atividade</button>
            </form>
        </div>

    </div>

    <div id="tasks-list" class="overflow-auto border border-secondary-subtle rounded" style="height: 220px;">
        <table class="table text-center" >
            <thead>
                <tr>
                    <th scope="col">título</th>
                    <th scope="col">valor</th>
                    <th scope="col">horas</th>
                    <th scope="col">ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($project->tasks as $task)
                    <tr class="align-middle">
                        <td><a href="{{ route('task.show', $task->id) }}" class="text-info-emphasis">{{ $task->title }}</a></td>
                        <td>R${{ number_format($task->value, 2, ',', '.') }}</td>
                        <td>{{ $task->predicted_hour }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                
                                @if ($task->completed)

                                    <span class="badge text-bg-success me-2">finalizada</span>

                                @else

                                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#end-task-modal-{{$task->id}}"><i class="material-icons">check</i></button>

                                    <form action="{{ route('task.edit') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$task->id}}">
                                        <button type="submit" class="btn btn-outline-primary mx-1"><i class="material-icons">edit</i></button>
                                    </form>

                                    @include('task.components.modal')

                                @endif
                                
                                
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$task->id}}"><i class="material-icons">delete</i></button>

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