<?php
include 'conexion.php';
$resultado = "select * from departamentos";
$departamento = mysqli_query($conexion, $resultado);

 
$esfm_consulta = "select * from esfm";
$esfm = mysqli_query($conexion, $esfm_consulta);


?>

<!-- Modal -->
<form id="formAgregaEsfm" name="formAgregaEsfm">
<div class="modal fade" id="agregarEsfm" tabindex="-1" role="dialog" aria-labelledby="agregarEsfm" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarEsfm">Registrar ESFM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <label for="nombre1">Nombre ESFM</label>
            <input type="text" class="form-control" id="nombre_esfm" name="nombre_esfm" placeholder="Nombre Escuela de Formación de Maestros" required="" >
          </div>
           
          <div class="col-md-12">
            
            <label for="squareSelect">Departamento ESFM</label>
              
              <select class="form-control input-square" id="expedido_en" name="expedido_en">
                <option value="">Selecionar...</option>
                  <?php
                  while ($row = mysqli_fetch_array($departamento)) {
                      ?>
                      <option value="<?php echo $row['id_departamento'] ?>"><?php echo $row['nombre_departamento'] ?></option>
                      <?php
                  }
                  ?>
              </select>
          </div>
           
          <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['id_usuario']?>">

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
       

        <button type="submit" class="btn btn-primary">registrar</button>
      </div>
    </div>
  </div>
</div>
</form>
