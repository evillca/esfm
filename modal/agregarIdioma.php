<?php
include 'conexion.php';
$resultado = "select * from departamentos";
$departamento = mysqli_query($conexion, $resultado);

?>

<!-- Modal -->
<form id="formAgregarIdioma" name="formAgregaIdioma">
<div class="modal fade" id="agregarIdioma" tabindex="-1" role="dialog" aria-labelledby="agregarIdioma" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarIdioma">Agregar Idioma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
	        <div class="col-md-12">
	            <label for="nombre_idioma">Nombre Idioma</label>
	        	<input type="text" class="form-control" id="nombre_idioma" name="nombre_idioma" placeholder="Nombre Escuela de Formación de Maestros" required="">
	        </div>
	        <div class="col-md-12">
	            <label for="ilc">ILC</label>
	        	<input type="text" class="form-control" id="ilc" name="ilc" placeholder="Nombre Instituto de Lengua y Cultura" required="">
	        </div>
	        <div class="col-md-12">
	            <label for="nacion">Nacion</label>
	        	<input type="text" class="form-control" id="nacion" name="nacion" placeholder="Nombre Nacion de Pueblo Indígena Originario" required="">
	        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>
</form>
