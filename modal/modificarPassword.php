<!-- Modal -->
<form id="formModificarPassword" name="formModificarPassword">
<div class="modal fade bd-example-modal-lg" id="modificarPassword" tabindex="-1" role="dialog" aria-labelledby="modificarPassword" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modificarUsuario">Modificar Datos de Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <input type="hidden" class="form-control" id="id_usuario" name="id_usuario">
          <div class="col-md-12">
            <label for="nombre_u">Nueva Contraseña</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña Nueva" required="">
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</form>
