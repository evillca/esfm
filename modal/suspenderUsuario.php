<!-- Modal -->
<form id="formSuspenderUsuario" name="formSuspenderUsuario">
<div class="modal fade bd-example-modal-lg" id="suspenderUsuario" tabindex="-1" role="dialog" aria-labelledby="suspenderUsuario" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="suspenderUsuario">Modificar Datos de Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" class="form-control" id="id_usuario" name="id_usuario">
          <h3>Esta seguro de suspender este usuario?</h3>
          <div class="row">
            <div class="col-md-12 mc-auto">
              <input type="text" class="form-control" id="usuario" name="usuario" disabled="">
            </div>
          </div>
          

          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Suspender</button>
      </div>
    </div>
  </div>
</div>
</form>
