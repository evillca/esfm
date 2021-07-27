<?php

//fin sacar aprobados
	    session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
       header("location: principal.php");
       exit;
    }
    
 ?>
<?php 
include 'conexion.php';
include 'assets/header.php';

$tecnicoilc= $_SESSION['nombre_u'];
//sacar aprobados
$aprobados = mysqli_query($conexion, "SELECT count(*) as 'aprobados' FROM solicitudes WHERE user_update='{$_SESSION['id_usuario']}'  AND estado_evaluacion=1;");
$ejecuta_aprobados = mysqli_fetch_array($aprobados);
//pendientes
$pendientes = mysqli_query($conexion, "SELECT count(*) as 'pendientes' FROM solicitudes WHERE user_update='{$_SESSION['id_usuario']}'  AND estado_evaluacion=0;");
$ejecuta_pendiente=mysqli_fetch_array($pendientes);

//aprendizaje
$aprendizajes = mysqli_query($conexion, "SELECT count(*) as 'aprendizajes' FROM solicitudes WHERE user_update='{$_SESSION['id_usuario']}'  AND  estado_evaluacion=2;");
$ejecuta_aprendizaje=mysqli_fetch_array($aprendizajes);

//total
$total = mysqli_query($conexion, "SELECT count(*) as 'total' FROM solicitudes WHERE user_update='{$_SESSION['id_usuario']}' ;");
$ejecuta_total=mysqli_fetch_array($total);
?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Sistema de Certificación ESFM</h4>
					</div>
					<div class="page-category">Bienvenido: <?php echo $_SESSION['nombre_u']?></div>
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-primary card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-users"></i>
											</div>
										</div>
										<div class="col col-stats">
											<div class="numbers">
												<p class="card-category">Aprobados</p>
												<h4 class="card-title"><?php echo $ejecuta_aprobados['aprobados']; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-info card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-interface-6"></i>
											</div>
										</div>
										<div class="col col-stats">
											<div class="numbers">
												<p class="card-category">Pendientes</p>
												<h4 class="card-title"><?php echo $ejecuta_pendiente['pendientes']; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-success card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-analytics"></i>
											</div>
										</div>
										<div class="col col-stats">
											<div class="numbers">
												<p class="card-category">Aprendizaje</p>
												<h4 class="card-title"><?php echo $ejecuta_aprendizaje['aprendizajes']; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-secondary card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-success"></i>
											</div>
										</div>
										<div class="col col-stats">
											<div class="numbers">
												<p class="card-category">Total Solicitudes</p>
												<h4 class="card-title"><?php echo $ejecuta_total['total']; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
	</div>
	<?php include 'assets/scripts.php'; ?>
</body>
</html>
