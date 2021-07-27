
<?php 
session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
       header("location: index.php");
       exit;
    }
include 'assets/header.php';
include 'modal/agregarCiudadano.php';
include 'modal/modificarCiudadano.php';


?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Personas</h4>
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
								<a href="esfm.php">Personas</a>
							</li>
							
						</ul>
					</div>
					
					<!-- inicio contenido-->
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Gestionar Personas</h4>
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#agregarCiudadano">
									<i class="fa fa-plus"></i>
									Registrar Persona
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
            url: 'ajax/personas_ajax.php?action=ajax&page=' + page,
            
            success: function (data) {
                $(".mostrar_datos").html(data).fadeIn('slow');
               
            }
        });
    }
    ;

		

        $("#formAgregaEsfm").submit(function (event) {
            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "actions/agregarEsfm.php",
                data: parametros,
                
                success: function (r) {
                    if(r==1){
                        load(1);
                        document.getElementById("formAgregaEsfm").reset();
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
            $('#agregarEsfm').modal('hide');
           
        });
        //codigo para modificar postulante
    $('#modificarCiudadano').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id_ciudadano= button.data('id_ciudadano');
        var nombre1 = button.data('nombre1');
        var nombre2 = button.data('nombre2');
        var appaterno = button.data('appaterno');
        var apmaterno = button.data('apmaterno');
        var nrodocumento = button.data('nrodocumento');
        var expedido_en = button.data('expedido_en');
        var fecha_nacimiento = button.data('fecha_nacimiento');
        var genero = button.data('genero');
        var modal = $(this);
        modal.find('#id_ciudadano').val(id_ciudadano);
        modal.find('#nombre1').val(nombre1);
        modal.find('#nombre2').val(nombre2);
        modal.find('#appaterno').val(appaterno);
        modal.find('#appaterno').val(appaterno);
        modal.find('#apmaterno').val(apmaterno);
        modal.find('#nrodocumento').val(nrodocumento);
        modal.find('#expedido_en').val(expedido_en);
        modal.find('#expedido_en').val(expedido_en);
        modal.find('#fecha_nacimiento').val(fecha_nacimiento);
        modal.find('#genero').val(genero);

    });

    $("#formModificarCiudadano").submit(function (event) {
        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "actions/modificarCiudadano.php",
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
            $('#modificarCiudadano').modal('hide');
        
    });
    

	</script>

