<?php
include 'conexion.php';
	    session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
       header("location: index.php");
       exit;
    }

$dep= "select nombre_departamento from departamentos WHERE id_departamento=".$_SESSION['id_departamento'];
$depar = mysqli_query($conexion, $dep);

$ilcs= "select nombre_idioma from idiomas WHERE id_idioma=".$_SESSION['id_ilc'];
$ilc = mysqli_query($conexion, $ilcs);

$users= "SELECT * FROM usuarios WHERE id_usuario=".$_SESSION['id_usuario'];
$user = mysqli_query($conexion, $users);
$usrs= mysqli_fetch_array($user);

 ?>
<?php include 'assets/header.php'; ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Editar Perfil</h4>
					</div>
					
					<!-- inicio contenido-->
					<div class="row">
						<div class="col-md-8">
							<div class="card card-with-nav">
							<form name="agregarParticipante" method="POST" action="actions/modificarPerfil.php">
								<div class="card-body">
									<div class="row mt-3">
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Nombre</label>
												<input type="text" class="form-control" name="nombre" placeholder="Nombres" value="<?php echo $usrs['nombre_u'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Apellido Paterno</label>
												<input type="text" class="form-control" name="appaterno" placeholder="Apellido Paterni" value="<?php echo $usrs['appaterno_u'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Apellido Materno</label>
												<input type="text" class="form-control" name="apmaterno" placeholder="Apellido Materno" value="<?php echo $usrs['apmaterno_u'] ?>">
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<!--<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Birth Date</label>
												<input type="text" class="form-control" id="datepicker" name="datepicker" value="03/21/1998" placeholder="Birth Date">
											</div>
										</div>-->
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Usuario</label>
												<input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php echo $_SESSION['usuario']?>" disabled>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Email</label>
												<input type="email" class="form-control" name="email" placeholder="email" value="<?php echo $_SESSION['email']?>" disabled∫>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Actualizar Contraseña</label>
												<input type="password" class="form-control" name="password_nueva" placeholder="Contraseña Nueva">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>ILC</label>
												<select class="form-control" id="ilc">
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
										
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>DEPARTAMENTO</label>
												<select class="form-control" id="depa">
													<?php
									                  while ($row = mysqli_fetch_array($depar)) {
									                      ?>
									                      <option value="<?php echo $row['id_departamento'] ?>"><?php echo $row['nombre_departamento'] ?></option>
									                      <?php
									                  }
									                  ?>
												</select>
											</div>
										</div>
										<input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['id_usuario']?>">
									</div>
									<!--<div class="row mt-3">
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>Address</label>
												<input type="text" class="form-control" value="st Merdeka Putih, Jakarta Indonesia" name="address" placeholder="Address">
											</div>
										</div>
									</div>
									<div class="row mt-3 mb-1">
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>About Me</label>
												<textarea class="form-control" name="about" placeholder="About Me" rows="3">A man who hates loneliness</textarea>
											</div>
										</div>
									</div>-->
									<div class="text-right mt-3 mb-3">
										<button type="submit" class="btn btn-success">Actualizar</button>
										
									</div>
								</div>
							</form>
							</div>
						</div>
						
					</div>
				</div>
					<!-- fin-->
				</div>
			</div>
			
		</div>
		
	</div>
	<?php include 'assets/scripts.php'; ?>
</body>
</html>