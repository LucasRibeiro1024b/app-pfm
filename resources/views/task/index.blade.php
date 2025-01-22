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
                                <a href="" class="btn btn-outline-success me-1"><i class="material-icons">check</i></a>
                                <form action="{{ route('task.edit') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$task->id}}">
                                    <button type="submit" class="btn btn-outline-primary"><i class="material-icons">edit</i></button>
                                </form>
                                <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger ms-1"><i class="material-icons">delete</i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    
</div>