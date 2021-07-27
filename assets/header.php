<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Sistema de Gestión de Cerificación</title>
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

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">
	<link href="js/select2.min.css" rel="stylesheet" />
	
	<!--<link rel="stylesheet" href="http://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">-->
</head>
<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="index.php" class="logo">
					<img src="assets/img/logo.png" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Buscar ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						
						
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="assets/img/perfil.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="assets/img/perfil.jpg" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4><?php echo $_SESSION['nombre_u']?></h4>
											<p class="text-muted"><?php echo $_SESSION['email']?></p>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="perfil.php">Editar Perfil</a>

									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="index.php?logout">Salir</a>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					
					<ul class="nav">
						<li class="nav-item active">
							<a href="principal.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								
							</a>
						</li>			
						
						<li class="nav-item">
							<a href="aspirantes.php">
								<i class="fas fa-user-graduate"></i>
								<p>Solicitudes</p>
							
							</a>
						</li>
						
						
						<li class="nav-item">
							<a href="esfm.php">
								<i class="fas fa-school"></i>
								<p>ESFM</p>
							
							</a>
						</li>

						<li class="nav-item">
							<a href="personas.php">
								<i class="fas fa-users"></i>
								<p>Personas</p>
							
							</a>
						</li>
						
						<li class="nav-item">
							<a href="modalidades.php">
								<i class="fas fa-clone"></i>
								<p>Modalidades</p>
							
							</a>
						</li>

						<li class="nav-item">
							<a href="idiomas.php">
								<i class="fas fa-language"></i>
								<p>Idiomas</p>
							
							</a>
						</li>
						<!--<li class="nav-item">
							<a href="#">
								<i class="fas fa-list-ol"></i>
								<p>Niveles</p>
							
							</a>
						</li>-->
						
						
						

						<li class="nav-item">
							<a href="#">
								<i class="fas fa-print"></i>
								<p>Reportes</p>
															</a>
						</li>

						<li class="nav-item">
							<a href="usuarios.php">
								<i class="fas fa-users-cog"></i>
								<p>Gestionar Usuarios</p>
							
							</a>
						</li>
						<!--<li class="nav-item">
							<a href="#">
								<i class="fas fa-cogs"></i>
									<p>Configuraciones</p>
								
							</a>
							
						</li>--> 

						
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->