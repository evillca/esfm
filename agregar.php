
<?php 
session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
       header("location: index.php");
       exit;
    }
include 'assets/header.php';


include 'conexion.php';
$resultado = "select * from departamentos";
$departamento = mysqli_query($conexion, $resultado);

$resultado = "select * from departamentos";
$expedido_en = mysqli_query($conexion, $resultado);

$esfm_consulta = "select * from esfm";
$esfm = mysqli_query($conexion, $esfm_consulta);

$idioma_consulta = "select * from idiomas";
$idioma = mysqli_query($conexion, $idioma_consulta);

$modalidad_consulta = "select * from modalidades";
$modalidad = mysqli_query($conexion, $modalidad_consulta);

$nivel_consulta = "select * from niveles";
$nivel = mysqli_query($conexion, $nivel_consulta);

?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Solicitudes</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="index.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="aspirantes.php">aspirantes</a>
							</li>
							
						</ul>
					</div>
					
					<!-- inicio contenido-->
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Agregar Postulante</h4>
								
							</div>
						</div>
						<!-- formulario agregar-->
						<form name="agregarParticipante" method="POST" action="actions/agregarParticipante.php">
							<div class="modal-body">
					        <div class="row">
					          <div class="col-md-3">
					            <label for="email2">Nombre 1</label>
					            <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="Primer Nombre" required pattern="[A-Za-z]{3,40}">
					          </div>
					          <div class="col-md-3">
					            <label for="email2">Nombre 2</label>
					            <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Segundo Nombre" pattern="[A-Za-z]{3,40}">
					          </div>
					          <div class="col-md-3">
					            <label for="email2">Apellido Paterno</label>
					            <input type="text" class="form-control" id="appaterno" name="appaterno" placeholder="Ap. Paterno" pattern="[A-Za-z]{3,40}">
					          </div>
					          <div class="col-md-3">
					            <label for="email2">Apellido Materno</label>
					            <input type="text" class="form-control" id="apmaterno" name="apmaterno" placeholder="Ap. Materno" required pattern="[A-Za-z]{3,40}">
					          </div>
					        </div>
					        <div class="row">
					          <div class="form-group col-md-3">
					            <label for="squareInput">Nro Identificacion</label>
					            <input type="number" class="form-control input-square" id="nrodocumento" name="nrodocumento" placeholder="Cedula de Identidad" required>
					          </div>
					            <div class="form-group col-md-3">
					              <label for="squareSelect">Expedido en</label>
					              
					              <select class="form-control input-square" id="expedido_en" name="expedido_en" required="">
					                  <?php
					                  while ($row = mysqli_fetch_array($expedido_en)) {
					                      ?>
					                      <option value="<?php echo $row['id_departamento'] ?>"><?php echo $row['nombre_departamento'] ?></option>
					                      <?php
					                  }
					                  ?>
					              </select>
					          </div>
					          <div class="form-group col-md-3">
					            <label for="squareInput">Fecha Nacimiento</label>
					            <input type="date" step="1" min="01-01-1930" value="<?php echo date("d-m-Y");?>" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control input-square" >
					          </div>
					          <div class="form-group col-md-3">
					              <label for="squareSelect">Genero</label>
					              <select class="form-control input-square" id="genero" name="genero" >
					                <option value="M">Masculino</option>
					                <option value="F">Femenino</option>
					              </select>
					          </div>
					        </div>
					        <div class="row">
					          <div class="form-group col-md-4">
					              <label for="squareSelect">Esfm al que postula</label>
					              <select class="form-control input-square" id="esfm_postula" name="esfm_postula">
					                  <?php
					                  while ($row = mysqli_fetch_array($esfm)) {
					                      ?>
					                      <option value="<?php echo $row['id_esfm'] ?>"><?php echo $row['nombre_esfm'] ?></option>
					                      <?php
					                  }
					                  ?>
					              </select>
					          </div>
					          
					          <div class="form-group col-md-3">
					              <label for="squareSelect">Idioma</label>
					              <select class="form-control input-square" id="idioma" name="idioma">
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

					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					        <button type="submit" class="btn btn-primary">Guardar</button>
					      </div>
						</form>
						<!-- formulario agregar-->

					<!-- fin-->
				</div>
			</div>
			
		</div>
		
	</div>
	<?php include 'assets/scripts.php'; ?>

</body>
</html>