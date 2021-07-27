<?php
include 'conexion.php';
$resultado = "select * from departamentos";
$departamento = mysqli_query($conexion, $resultado);

$resultado = "select * from departamentos";
$expedido_en = mysqli_query($conexion, $resultado);

$esfm_consulta = "select * from esfm WHERE estado_esfm=1";
$esfm = mysqli_query($conexion, $esfm_consulta);

$idioma_consulta = "select * from idiomas";
$idioma = mysqli_query($conexion, $idioma_consulta);

$modalidad_consulta = "select * from modalidades";
$modalidad = mysqli_query($conexion, $modalidad_consulta);

$nivel_consulta = "select * from niveles";
$nivel = mysqli_query($conexion, $nivel_consulta);

$nivelEscrito= "select * from niveles";
$nivel_escrito = mysqli_query($conexion, $nivelEscrito);



?>

<!-- Modal -->
<form id="formModificarPostulante" name="formAgregaPostulante">
<div class="modal fade" id="modificarAspirante" tabindex="-1" role="dialog" aria-labelledby="agregarAspirante" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modificarAspirante">Modificar Participante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3">
          <input type="hidden" class="form-control" id="id_ciudadano" name="id_ciudadano">
          <input type="hidden" class="form-control" id="id_solicitud" name="id_solicitud">
            <label for="email2">Nombre 1</label>
            <input type="text" class="form-control" id="nombre1" name="nombre1" disabled="">
          </div>
          <div class="col-md-3">
            <label for="email2">Nombre 2</label>
            <input type="text" class="form-control" id="nombre2" name="nombre2" disabled="">
          </div>
          <div class="col-md-3">
            <label for="email2">Apellido Paterno</label>
            <input type="text" class="form-control" id="appaterno" name="appaterno" disabled="">
          </div>
          <div class="col-md-3">
            <label for="email2">Apellido Materno</label>
            <input type="text" class="form-control" id="apmaterno" name="apmaterno" disabled="">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-3">
            <label for="squareInput">Nro Identificacion</label>
            <input type="number" class="form-control input-square" id="nrodocumento" name="nrodocumento" disabled="">
          </div>
            <div class="form-group col-md-3">
              <label for="squareSelect">Expedido en</label>
              
              <select class="form-control input-square" id="expedido_en" name="expedido_en" disabled="">
              <option selected>Seleccionar...</option>
                  <?php
                  while ($row = mysqli_fetch_array($expedido_en)) {
                      ?>
                      <option value="<?php echo $row['id_departamento'] ?>"><?php echo strtoupper($row['nombre_departamento']) ?></option>
                      <?php
                  }
                  ?>
              </select>
          </div>
          <div class="form-group col-md-3">
            <label for="squareInput">Fecha Nacimiento</label>
            <input type="date" step="1" min="1950-01-01" value="<?php echo date("Y-m-d");?>" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control input-square" disabled="">
          </div>
          <div class="form-group col-md-3">
              <label for="squareSelect">Genero</label>
              <select class="form-control input-square" id="genero" name="genero" required disabled="">
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
                      <option value="<?php echo $row['id_esfm'] ?>"><?php echo strtoupper($row['nombre_esfm']) ?></option>
                      <?php
                  }
                  ?>
              </select>
          </div>
          
          <div class="form-group col-md-4">
              <label for="squareSelect">Idioma</label>
              <select class="form-control input-square" id="idioma" name="idioma" style="width: 100%>
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
          
        </div>
        <div class="row">
            <hr/>
        <div class="form-group col-md-4">
              <label for="squareSelect">Estado</label>
              <select class="form-control input-square" id="estado_evaluacion" name="estado_evaluacion">
              
                <option value="0">Pendiente</option>
                <option value="2">Aprendizaje</option>
                <option value="1">Aprobado</option>
              </select>
          </div>
          <div class="form-group col-md-4">
              <label for="squareSelect">Oral</label>
              <select class="form-control input-square" id="oral" name="oral">
              <option value="0">Seleccionar...</option>
                  <?php
                  while ($row = mysqli_fetch_array($nivel)) {
                      ?>
                      <option value="<?php echo $row['id_nivel'] ?>"><?php echo $row['nombre_nivel'] ?></option>
                      <?php
                  }
                  ?>
              </select>
          </div>
          <div class="form-group col-md-4">
              <label for="squareSelect">Escrito</label>
              <select class="form-control input-square" id="escrito" name="escrito">
              <option value="0">Seleccionar...</option>
                  <?php
                  while ($row = mysqli_fetch_array($nivel_escrito)) {
                      ?>
                      <option value="<?php echo $row['id_nivel'] ?>"><?php echo $row['nombre_nivel'] ?></option>
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
       

        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</form>