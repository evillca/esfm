
<?php 
session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
       header("location: index.php");
       exit;
    }
include 'assets/header.php';
include 'modal/agregarAspirante.php';
include 'modal/modificarPostulante.php';


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
								<h4 class="card-title">Gestionar Solicitudes</h4>
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#agregarAspirante">
									<i class="fa fa-plus"></i>
									Añadir Participante
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
            url: 'ajax/solicitud_ajax.php?action=ajax&page=' + page,
            
            success: function (data) {
                $(".mostrar_datos").html(data).fadeIn('slow');
               
            }
        });
    }
    ;

		

        $("#formAgregaPostulante").submit(function (event) {
            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "actions/agregarParticipante.php",
                data: parametros,
                
                success: function (r) {
                    if(r==1){
                        load(1);
                        document.getElementById("formAgregaPostulante").reset();
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
            $('#agregarAspirante').modal('hide');
           
        });
        //codigo para modificar postulante
    $('#modificarAspirante').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id_ciudadano = button.data('id_ciudadano');
        var id_solicitud = button.data('id_solicitud');
        var nombre1 = button.data('nombre1');
        var nombre2 = button.data('nombre2');
        var appaterno = button.data('appaterno');
        var apmaterno = button.data('apmaterno');
        var nrodocumento = button.data('nrodocumento');
        var expedido_en = button.data('expedido_en');
        var fecha_nacimiento = button.data('fecha_nacimiento');
        var genero = button.data('genero');
        var esfm_postula = button.data('esfm_postula');
        var idioma = button.data('idioma');
        var modalidad = button.data('modalidad');
        var estado_evaluacion = button.data('estado_evaluacion');
        var oral = button.data('oral');
        var escrito = button.data('escrito');

        var modal = $(this);

        modal.find('#id_ciudadano').val(id_ciudadano);
        modal.find('#id_solicitud').val(id_solicitud);
        modal.find('#nombre1').val(nombre1);
        modal.find('#nombre2').val(nombre2);
        modal.find('#appaterno').val(appaterno);
        modal.find('#apmaterno').val(apmaterno);
        modal.find('#nrodocumento').val(nrodocumento);
        modal.find('#expedido_en').val(expedido_en);
        modal.find('#fecha_nacimiento').val(fecha_nacimiento);
        modal.find('#genero').val(genero);
        modal.find('#esfm_postula').val(esfm_postula);
        modal.find('#idioma').val(idioma);
        modal.find('#modalidad').val(modalidad);
        modal.find('#estado_evaluacion').val(estado_evaluacion);
        modal.find('#oral').val(oral);
        modal.find('#escrito').val(escrito);

    });

    $("#formModificarPostulante").submit(function (event) {
        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "actions/evaluarparticipante.php",
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
            $('#modificarAspirante').modal('hide');
        
    });
    

	</script>
 