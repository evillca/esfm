 

<!-- Modal -->
<form id="formModificarModalidad" name="formModificarModalidad" method="POST">
<div class="modal fade" id="modificarModalidad" tabindex="-1" role="dialog" aria-labelledby="modificarModalidad" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modificarModalidad">Actualizar Modalidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <label for="nombre1">Descripcion</label>
            <input type="hidden" class="form-control" id="modalidad" name="modalidad">
            <input type="text" class="form-control" id="nombre_modalidad" name="nombre_modalidad" placeholder="Nombre Modalidad" required="">
          </div>
          <div class="col-md-12">
            <label for="nombre1">Descripcion</label>
            <textarea id="descripcion_modalidad" name="descripcion_modalidad" rows="5" cols="5" class="form-control" placeholder="Descripcion" ></textarea>
          </div>
           <div class="form-group col-md-6">
              <label for="squareSelect">Estado</label>
              <select class="form-control input-square" id="estado_modalidad" name="estado_modalidad">
                <option value="0">Inactivo</option>
                <option value="1">Activo</option>
              </select>
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
