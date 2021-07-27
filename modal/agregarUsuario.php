<?php
include 'conexion.php';
$resultado = "select * from departamentos";
$departamento = mysqli_query($conexion, $resultado);

$result = "select * from idiomas";
$ilc = mysqli_query($conexion, $result);

?>

<!-- Modal -->
<form id="formAgregarUsuario" name="formAgregarUsuario">
<div class="modal fade bd-example-modal-lg" id="agregarUsuario" tabindex="-1" role="dialog" aria-labelledby="agregarUsuario" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarUsuario">Agregar Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <label for="nombre_u">Nombres</label>
            <input type="text" class="form-control" id="nombre_u" name="nombre_u" placeholder="Nombres" required="">
          </div>
          <div class="col-md-4">
            <label for="appaterno_u">Ap. Paterno</label>
            <input type="text" class="form-control" id="appaterno_u" name="appaterno_u" placeholder="Ap. Paterno" required="">
          </div>
          <div class="col-md-4">
            <label for="apmaterno_u">Ap. Materno</label>
            <input type="text" class="form-control" id="apmaterno_u" name="apmaterno_u" placeholder="Ap. Materno" required="">
          </div>
          <div class="col-md-4">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" required="">
          </div>
          <div class="col-md-4">
            <label for="pass">Contraseña</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required="">
          </div>
          <div class="col-md-4">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
          </div>
          <div class="col-md-6">
            <label for="squareSelect">Departamento</label>
              <select class="form-control input-square" id="id_departamento" name="id_departamento">
                  <?php
                  while ($row = mysqli_fetch_array($departamento)) {
                      ?>
                      <option value="<?php echo $row['id_departamento'] ?>"><?php echo $row['nombre_departamento'] ?></option>
                      <?php
                  }
                  ?>
              </select>
          </div>
           <div class="col-md-6">            
            <label for="squareSelect">Instituto de Lengua y Cultura</label>             
              <select class="form-control input-square" id="id_idioma" name="id_idioma">
                  <?php
                  while ($row = mysqli_fetch_array($ilc)) {
                      ?>
                      <option value="<?php echo $row['id_idioma'] ?>"><?php echo $row['nombre_idioma'] ?></option>
                      <?php
                  }
                  ?>
              </select>
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
