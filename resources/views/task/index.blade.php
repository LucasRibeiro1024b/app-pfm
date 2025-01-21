<div id="tasks" class="col-md-8 ps-5">
        
    <div id="tasks-header" class="row mb-4">

        <h3 class="col-6 offset-3">Atividades</h3>

        <a href="" class="btn btn-success col-3">adicionar atividade</a>

    </div>

    <div id="tasks-list" class="border">
        <table class="table text-center">
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
                    <tr>
                        <td><a href="" class="text-info-emphasis">{{ $task->title }}</a></td>
                        <td>R${{ number_format($task->value, 2, ',', '.') }}</td>
                        <td>{{ $task->predicted_hour }}</td>
                        <td>#</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    
</div>