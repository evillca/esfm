
<?php 
session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
       header("location: index.php");
       exit;
    }
include 'assets/header.php';
include 'modal/agregarModalidad.php';
include 'modal/modificarModalidad.php';

?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">ESFM</h4>
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
								<a href="esfm.php">Modalidades de Evaluación</a>
							</li>
							
						</ul>
					</div>
					
					<!-- inicio contenido-->
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Gestionar Modalidades</h4>
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#agregarModalidad">
									<i class="fa fa-plus"></i>
									Registrar Nueva Modalidad
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
            url: 'ajax/modalidades_ajax.php?action=ajax&page=' + page,
            
            success: function (data) {
                $(".mostrar_datos").html(data).fadeIn('slow');
               
            }
        });
    }
    ;

		

        $("#formAgregarModalidad").submit(function (event) {
            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "actions/agregarModalidad.php",
                data: parametros,
                
                success: function (r) {
                    if(r==1){
                        load(1);
                        document.getElementById("formAgregarModalidad").reset();
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
            $('#agregarModalidad').modal('hide');
           
        });
        //codigo para modificar postulante
    $('#modificarModalidad').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modalidad = button.data('modalidad');
        var nombre_modalidad = button.data('nombre_modalidad');
        var descripcion_modalidad = button.data('descripcion_modalidad');
        var estado_modalidad = button.data('estado_modalidad');
        var modal = $(this);
        modal.find('#modalidad').val(modalidad);
        modal.find('#nombre_modalidad').val(nombre_modalidad);
        modal.find('#descripcion_modalidad').val(descripcion_modalidad);
        modal.find('#estado_modalidad').val(estado_modalidad);

    });

    $("#formModificarModalidad").submit(function (event) {
        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "actions/modificarModalidad.php",
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
            $('#modificarModalidad').modal('hide');
        
    });
    

	</script>
