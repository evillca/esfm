<?php
include 'conexion.php';
$resultado = "select * from departamentos";
$departamento = mysqli_query($conexion, $resultado);

?>

<!-- Modal -->
<form id="formModificarIdioma" name="formModificaIdioma">
<div class="modal fade" id="modificarIdioma" tabindex="-1" role="dialog" aria-labelledby="modificarEsfm" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modificarEsfm">Actualizar Idioma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <input type="hidden" class="form-control" id="id_idioma" name="id_idioma">
	        <div class="col-md-12">
	            <label for="nombre1">Nombre Idioma</label>
	        	<input type="text" class="form-control" id="nombre_idioma" name="nombre_idioma" placeholder="Nombre Escuela de Formación de Maestros" required="">
	        </div>
	        <div class="col-md-12">
	            <label for="nombre1">Instituto de Lengua y Cultura</label>
	        	<input type="text" class="form-control" id="ilc" name="ilc" placeholder="Nombre Instituto de Lengua y Cultura" required="">
	        </div>
	        <div class="col-md-12">
	            <label for="nombre1">Nacion de Pueblo Indígena Originario</label>
	        	<input type="text" class="form-control" id="nacion" name="nacion" placeholder="Nombre Nacion de Pueblo Indígena Originario" required="">
	        </div>

           <div class="form-group col-md-12">
              <label for="squareSelect">Estado</label>
                <select class="form-control input-square" id="estado_i" name="estado_i">
                  <option selected>Seleccionar...</option>
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
