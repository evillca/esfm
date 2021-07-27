<!DOCTYPE html>
<html lang="es">
<?php

    include 'conexion.php';
    include 'libreria_password/password_compatibility_library.php';
    include 'login/logueo.php';

    $login = new Login();
    if ($login->isUserLoggedIn() == true) {
        header("location: principal.php");
    } else {
        ?>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Iniciar sesion</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">

</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<?php
	                if (isset($login)) {
	                    if ($login->errors) {
	                        ?>
	                        <div class="alert alert-danger alert-dismissible" role="alert">
	                            <strong>Error!</strong> 

	                            <?php
	                            foreach ($login->errors as $error) {
	                                echo $error;
	                            }
	                            ?>
	                        </div>
	                        <?php
	                    }
	                    if ($login->messages) {
	                        ?>
	                        <div class="alert alert-success alert-dismissible" role="alert">
	                            <strong>Aviso!</strong>
	                            <?php
	                            foreach ($login->messages as $message) {
	                                echo $message;
	                            }
	                            ?>
	                        </div> 
	                        <?php
	                    }
	                }
                ?>

			<h3 class="text-center">CERTIFICACION IPELC - ESFM</h3>
				
			<form action="index.php" method="POST">
				<div class="login-form">

					<div class="form-group form-floating-label">
						<input id="usuario" name="usuario" type="text" class="form-control input-border-bottom" required>
						<label for="username" class="placeholder">Usuario</label>
					</div>
					<div class="form-group form-floating-label">
						<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
						<label for="password" class="placeholder">Contraseña</label>
						<div class="show-password">
							<i class="flaticon-interface"></i>
						</div>
					</div>
					
					<div class="form-action mb-3">
						
						<button type="submit" class="btn btn-primary btn-rounded btn-login" id="login" name="login">Ingresar</button>
					</div>

				</div>
			</form>
		</div>
	</div>
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/ready.js"></script>
	
    </script>
</body>
</html>

    <?php
}

?>