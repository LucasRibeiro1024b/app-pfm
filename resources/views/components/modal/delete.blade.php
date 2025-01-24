<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$id}}"><i class="material-icons">delete</i></button>

<div class="modal fade" id="delete-modal-{{$id}}" tabindex="-1" aria-labelledby="delete-modalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

        <div class="modal-header">
            <h1 class="modal-title fs-5" id="delete-modalLabel">{{ $name }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        
        <form action="{{ route($route, $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <div class="modal-body">

                <p>Deseja apagar "{{ $name }}"?</p>
                
            </div>

            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 45%">Cancelar</button>
                <button type="submit" class="btn btn-danger" style="width: 45%">Apagar</button>
            </div>

        </form>
        
        </div>
    </div>

</div>