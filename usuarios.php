
<?php 
session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
       header("location: index.php");
       exit;
    }
include 'assets/header.php';
include 'modal/agregarUsuario.php';
include 'modal/modificarUsuario.php';
include 'modal/modificarPassword.php';
include 'modal/suspenderUsuario.php';


?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Usuarios</h4>
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
								<a href="usuarios.php">Usuarios</a>
							</li>
							
						</ul>
					</div>
					
					<!-- inicio contenido-->
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Gestionar Usuarios</h4>
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#agregarUsuario">
									<i class="fa fa-plus"></i>
									Registrar Usuarios
                                </button>
                                
                            </div>
                            <div class="col-md-6">
                                    <input type="hidden" class="form-control" id="q" name="q" onkeyup="load(1)" placeholder="Ingrese el nombre del usuario">
                                </div>
                                <br>
                                <div class="mostrar_datos"></div>
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
<script type="text/javascript">

$(document).ready(function () {
        load(1);
    });
    function load(page) {
         
        $("#loader").fadeIn('slow');
        $.ajax({
            url: 'ajax/usuarios_ajax.php?action=ajax&page=' + page,
            
            success: function (data) {
                $(".mostrar_datos").html(data).fadeIn('slow');
               
            }
        });
    }
    ;
        $("#formAgregarUsuario").submit(function (event) {
            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "actions/agregarUsuario.php",
                data: parametros,
                
                success: function (r) {
                    if(r==1){
                        load(1);
                        document.getElementById("formAgregarUsuario").reset();
                        swal("Registrado Correctamente!", "Click en Aceptar!", {
						icon : "success",
						buttons: {        			
							confirm: {
								className : 'btn btn-success'
							}
						},
					});
                    }else{                    	
                        swal("Good job!", "You clicked the button!", {
						icon : "error",
						buttons: {        			
							confirm: {
								className : 'btn btn-danger'
							}
						},
					});
                    }
                }
            });
            event.preventDefault();
            $('#agregarUsuario').modal('hide');
           
        });

        //codigo para modificar Usuarios
	    $('#modificarUsuario').on('show.bs.modal', function (event) {
	        var button = $(event.relatedTarget);

	        var id_usuario= button.data('id_usuario');
	        var nombre_u = button.data('nombre_u');
	        var appaterno_u = button.data('appaterno_u');
	        var apmaterno_u = button.data('apmaterno_u');
	        var usuario = button.data('usuario');
	        var email = button.data('email');
	        var id_idioma = button.data('id_idioma');
	        var id_departamento = button.data('id_departamento');

	        var modal = $(this);

	        modal.find('#id_usuario').val(id_usuario);
	        modal.find('#nombre_u').val(nombre_u);
	        modal.find('#appaterno_u').val(appaterno_u);
	        modal.find('#apmaterno_u').val(apmaterno_u);
	        modal.find('#usuario').val(usuario);
	        modal.find('#email').val(email);
	        modal.find('#id_idioma').val(id_idioma);
	        modal.find('#id_departamento').val(id_departamento);
	    });

    $("#formModificarUsuario").submit(function (event) {
        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "actions/modificarUsuario.php",
            data: parametros,
            success: function (r) {
                if(r==1){
                    load(1);
                    swal("Modificado correctamente!", " Click en el boton!", {
						icon : "success",
						buttons: {        			
							confirm: {
								className : 'btn btn-success'
							}
						},
					});
                }else{
                    swal("Good job!", "You clicked the button!", {
						icon : "error",
						buttons: {        			
							confirm: {
								className : 'btn btn-danger'
							}
						},
					});
                }
            }
        });
        event.preventDefault();
            $('#modificarUsuario').modal('hide');
        
    });

        //codigo para modificar Usuarios
	    $('#modificarPassword').on('show.bs.modal', function (event) {
	        var button = $(event.relatedTarget);

	        var id_usuario= button.data('id_usuario');
	        var pass = button.data('pass');


	        var modal = $(this);

	        modal.find('#id_usuario').val(id_usuario);
	        modal.find('#pass').val(pass);
	    });

    $("#formModificarPassword").submit(function (event) {
        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "actions/modificarPassword.php",
            data: parametros,
            success: function (r) {
                if(r==1){
                    load(1);
                    swal("Modificado correctamente!", " Click en el boton!", {
						icon : "success",
						buttons: {        			
							confirm: {
								className : 'btn btn-success'
							}
						},
					});
                }else{
                    swal("Good job!", "You clicked the button!", {
						icon : "error",
						buttons: {        			
							confirm: {
								className : 'btn btn-danger'
							}
						},
					});
                }
            }
        });
        event.preventDefault();
            $('#modificarPassword').modal('hide');
        
    });
//
        $('#suspenderUsuario').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id_usuario= button.data('id_usuario');
        var usuario= button.data('usuario');

        var modal = $(this);
        modal.find('#id_usuario').val(id_usuario);
        modal.find('#usuario').val(usuario);
    });

        $("#formSuspenderUsuario").submit(function (event) {
        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "actions/suspenderUsuario.php",
            data: parametros,
            success: function (r) {
                if(r==1){
                    load(1);
                    swal("Modificado correctamente!", " Click en el boton!", {
						icon : "success",
						buttons: {        			
							confirm: {
								className : 'btn btn-success'
							}
						},
					});
                }else{
                    swal("Good job!", "You clicked the button!", {
						icon : "error",
						buttons: {        			
							confirm: {
								className : 'btn btn-danger'
							}
						},
					});
                }
            }
        });
        event.preventDefault();
            $('#suspenderUsuario').modal('hide'); 
    });
	</script>

