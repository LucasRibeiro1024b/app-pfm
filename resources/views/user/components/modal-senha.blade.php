<!-- Modal -->
<div class="modal fade" id="redefinirSenha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Redefinir senha</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('login.resetPassword')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">

                <div class="form-group">

                    
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    
                    <div class="form-group">
                        <label for="password">Nova senha</label>
                        <input id="password" class="form-control" type="password" name="password" placeholder="Senha" required>
                    </div>
        
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar nova senha</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Confirmar senha" required>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Redefinir senha</button>
            </div>
        </form>
      </div>
    </div>
</div>