<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="delete-modalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

        <div class="modal-header">
            <h1 class="modal-title fs-5" id="delete-modalLabel">{{ $task->title }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        
        <form action="{{ route('task.destroy', $task->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <div class="modal-body">

                <p>Deseja apagar "{{ $task->title }}"?</p>
                
            </div>

            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 45%">Cancelar</button>
                <button type="submit" class="btn btn-primary" style="width: 45%">Apagar</button>
            </div>

        </form>
        
        </div>
    </div>

</div>