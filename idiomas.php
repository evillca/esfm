
<?php 
session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
       header("location: index.php");
       exit;
    }
include 'assets/header.php';
include 'modal/agregarIdioma.php';
include 'modal/modificarIdioma.php';


?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">IDIOMA</h4>
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
								<a href="esfm.php">Idioma Originario</a>
							</li>
							
						</ul>
					</div>
					
					<!-- inicio contenido-->
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Gestionar Idiomas,  ILC, Nacion de pueblo indígena Originario</h4>
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#agregarIdioma">
									<i class="fa fa-plus"></i>
									Registrar Nuevo
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
            url: 'ajax/idiomas_ajax.php?action=ajax&page=' + page,
            
            success: function (data) {
                $(".mostrar_datos").html(data).fadeIn('slow');
               
            }
        });
    }

		

        $("#formAgregarIdioma").submit(function (event) {
            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "actions/agregarUsuario.php",
                data: parametros,
                
                success: function (r) {
                    if(r==1){
                        load(1);
                        document.getElementById("formAgregarIdioma").reset();
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
           	$('#agregarIdioma').modal('hide');
           
        });
        //codigo para modificar postulante
    $('#modificarIdioma').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id_idioma = button.data('id_idioma');
        var nombre_idioma = button.data('nombre_idioma');
        var ilc = button.data('ilc');
        var nacion = button.data('nacion');
        var estado_i = button.data('estado_i');
        var modal = $(this);
        modal.find('#id_idioma').val(id_idioma);
        modal.find('#nombre_idioma').val(nombre_idioma);
        modal.find('#ilc').val(ilc);
        modal.find('#nacion').val(nacion);
        modal.find('#estado_i').val(estado_i);

    });

    $("#formModificarIdioma").submit(function (event) {
        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "actions/modificarIdioma.php",
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
            $('#modificarIdioma').modal('hide');
        
    });
    //establecer nueva contraseña
    $('#modificarIdioma').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id_idioma = button.data('id_idioma');
        var nombre_idioma = button.data('nombre_idioma');
        var ilc = button.data('ilc');
        var nacion = button.data('nacion');
        var estado_i = button.data('estado_i');
        var modal = $(this);
        modal.find('#id_idioma').val(id_idioma);
        modal.find('#nombre_idioma').val(nombre_idioma);
        modal.find('#ilc').val(ilc);
        modal.find('#nacion').val(nacion);
        modal.find('#estado_i').val(estado_i);

    });

    $("#formModificarIdioma").submit(function (event) {
        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "actions/modificarIdioma.php",
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
            $('#modificarIdioma').modal('hide');
        
    });

	</script>
