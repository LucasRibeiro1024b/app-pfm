 
<!-- Modal -->
<div class="modal fade" id="end-task-modal-{{$task->id}}" tabindex="-1" aria-labelledby="end-task-modalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

        <div class="modal-header">
            <h1 class="modal-title fs-5" id="end-task-modalLabel">{{ $task->title }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form action="{{ route('task.update', $task->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body dados">

                <div class="form-group">
                    <label for="real_hour">Horas Reais:</label>
                    <div class="d-flex" style="gap: 10px;">
                        <input type="number" class="form-control hours" placeholder="Horas" min="0" max="999" value="{{$task->hours($task->predicted_hour)}}" required>
                        <input  type="number" class="form-control minutes" placeholder="Minutos" min="0" max="59" value="{{$task->minutes($task->predicted_hour)}}" required>
                    </div>
                </div>

                <input type="hidden" name="title" value="{{ $task->title }}">
                <input type="hidden" name="description" value="{{ $task->description }}">
                <input type="hidden" name="value" value="{{ $task->value }}">
                <input type="hidden" name="predicted_hour" value="{{ $task->predicted_hour }}">
                <input type="hidden" name="real_hour" class="timeHours" value="{{ $task->predicted_hour }}">
                <input type="hidden" name="user_id" class="timeHours" value="{{ $task->user_id }}">
                <input type="hidden" name="completed" value="1">
                
            </div>

            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 45%">Cancelar</button>
                <button type="submit" class="btn btn-primary" style="width: 45%">Finalizar atividade</button>
            </div>

            </form>
        
        </div>
    </div>

</div>

@push('script')
    <script src="/js/formatacao/hour.js"></script>
@endpush