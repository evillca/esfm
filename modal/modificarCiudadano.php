<?php
include 'conexion.php';
$resultado = "select * from departamentos";
$departamento = mysqli_query($conexion, $resultado);

$resultado = "select * from departamentos";
$expedido_en = mysqli_query($conexion, $resultado);

$esfm_consulta = "select * from esfm e, departamentos d WHERE (e.id_departamento=d.id_departamento) AND estado_esfm=1";
$esfm = mysqli_query($conexion, $esfm_consulta);

$idioma_consulta = "select * from idiomas WHERE estado_i=1";
$idioma = mysqli_query($conexion, $idioma_consulta);

$modalidad_consulta = "select * from modalidades WHERE estado_modalidad=1";
$modalidad = mysqli_query($conexion, $modalidad_consulta);

$nivel_consulta = "select * from niveles";
$nivel = mysqli_query($conexion, $nivel_consulta);

?>

<!-- Modal -->
<form id="formModificarCiudadano" name="formModificaCiudadano">
<div class="modal fade" id="modificarCiudadano" tabindex="-1" role="dialog" aria-labelledby="modificarCiudadano" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modificarCiudadano">Actualizar Datos de Ciudadano</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="form-group col-md-6">
            <label for="squareInput">Nro Identificacion</label>
            <input type="number" class="form-control input-square" id="nrodocumento" name="nrodocumento" placeholder="Cedula de Identidad" pattern="^[0-9]+" required="">
          </div>
            <div class="form-group col-md-6">
              <label for="squareSelect">Expedido en</label>
              
              <select class="form-control input-square" id="expedido_en" name="expedido_en">
                  <?php
                  while ($row = mysqli_fetch_array($expedido_en)) {
                      ?>
                      <option value="<?php echo $row['id_departamento'] ?>"><?php echo $row['nombre_departamento'] ?></option>
                      <?php
                  }
                  ?>
              </select>
          </div>
          <div class="col-md-6">
            <label for="nombre1">Nombre 1</label>
              <input type="hidden" id="id_ciudadano" name="id_ciudadano" class="form-control">
            <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="Primer Nombre" required="" pattern="[A-Za-z]{2,30}" >
          </div>
          <div class="col-md-6">
            <label for="nombre2">Nombre 2</label>
            <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Segundo Nombre" pattern="[A-Za-z]{0,30}">
          </div>
          <div class="col-md-6">
            <label for="appaterno">Apellido Paterno</label>
            <input type="text" class="form-control" id="appaterno" name="appaterno" placeholder="Ap. Paterno" pattern="[A-Za-z]{0,30}" >
          </div>
          <div class="col-md-6">
            <label for="apmaterno">Apellido Materno</label>
            <input type="text" class="form-control" id="apmaterno" name="apmaterno" placeholder="Ap. Materno" pattern="[A-Za-z]{4,30}" required="" min="2">
          </div>
        </div>
        <div class="row">
          
          <div class="form-group col-md-6">
            <label for="squareInput">Fecha Nacimiento</label>
            <input type="date" step="1" min="1940-01-01" value="<?php echo date("Y-m-d");?>" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control input-square" >
          </div>
          <div class="form-group col-md-6">
              <label for="squareSelect">Genero</label>
              <select class="form-control input-square" id="genero" name="genero" >
              <option selected>Seleccionar...</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
              </select>
          </div>
        </div>
        
        <!--<input type="text" class="form-control" id="id_usuario" name="id_usuario" value="<?php //echo $_SESSION['id_usuario']?>">-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
       

        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</form>
