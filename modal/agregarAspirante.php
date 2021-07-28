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
<form id="formAgregaPostulante" name="formAgregaPostulante">
<div class="modal fade" id="agregarAspirante" tabindex="-1" role="dialog" aria-labelledby="agregarAspirante" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarAspirante">Registrar Participante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="form-group col-md-6">
            <label for="squareInput">Nro Identificacion</label>
            <input type="text" class="form-control" id="id_ciudadano" name="id_ciudadano">
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
        </div>
        <div class="row">

          <div class="col-md-3">
            
            <label for="nombre1">Nombre 1</label>
            <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="Primer Nombre" required="" pattern="[A-Za-z]{2,30}" >
          </div>
          <div class="col-md-3">
            <label for="nombre2">Nombre 2</label>
            <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Segundo Nombre" pattern="[A-Za-z]{0,30}">
          </div>
          <div class="col-md-3">
            <label for="appaterno">Apellido Paterno</label>
            <input type="text" class="form-control" id="appaterno" name="appaterno" placeholder="Ap. Paterno" pattern="[A-Za-z]{0,30}" >
          </div>
          <div class="col-md-3">
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
        <div class="row">
          <div class="form-group col-md-6">
              <label for="squareSelect">Esfm al que postula</label>
              <select class="form-control input-square" id="esfm_postula" name="esfm_postula">
              <option selected>Seleccionar...</option>
                  <?php
                  while ($row = mysqli_fetch_array($esfm)) {
                      ?>
                      <option value="<?php echo $row['id_esfm'] ?>"> <?php echo $row['nombre_esfm'].' - '.strtoupper($row['nombre_departamento'])  ?></option>
                      <?php
                  }
                  ?>
              </select>
          </div>
          
          <div class="form-group col-md-4">
              <label for="squareSelect">Idioma</label>
              <select class="form-control input-square" id="idioma" name="idioma" style="width: 100%">
              <option selected>Seleccionar...</option>
                  <?php
                  while ($row = mysqli_fetch_array($idioma)) {
                      ?>
                      <option value="<?php echo $row['id_idioma'] ?>"><?php echo $row['nombre_idioma'] ?></option>
                      <?php
                  }
                  ?>
              </select>
          </div>

          <div class="form-group col-md-2">
              <label for="squareSelect">Modalidad</label>
              <select class="form-control input-square" id="modalidad" name="modalidad">
              <option selected>Seleccionar...</option>
                  <?php
                  while ($row = mysqli_fetch_array($modalidad)) {
                      ?>
                      <option value="<?php echo $row['id_modalidad'] ?>"><?php echo $row['nombre_modalidad'] ?></option>
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


