
<?php 
session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
       header("location: index.php");
       exit;
    }
include 'assets/header.php';
include 'modal/agregarEsfm.php';
include 'modal/modificarEsfm.php';


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
								<a href="esfm.php">Escuelas de Formación de Maestros</a>
							</li>
							
						</ul>
					</div>
					
					<!-- inicio contenido-->
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Gestionar Escuelas de Formación de Maestros</h4>
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#agregarEsfm">
									<i class="fa fa-plus"></i>
									Registrar ESFM
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
            url: 'ajax/esfm_ajax.php?action=ajax&page=' + page,
            
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
    $('#modificarEsfm').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id_esfm = button.data('id_esfm');
        var nombre_esfm = button.data('nombre_esfm');
        var id_departamento = button.data('id_departamento');
        var estado_esfm = button.data('estado_esfm');
        var modal = $(this);
        modal.find('#id_esfm').val(id_esfm);
        modal.find('#nombre_esfm').val(nombre_esfm);
        modal.find('#id_departamento').val(id_departamento);
        modal.find('#estado_esfm').val(estado_esfm);

    });

    $("#formModificarEsfm").submit(function (event) {
        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "actions/modificarEsfm.php",
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
            $('#modificarEsfm').modal('hide');
        
    });
    

	</script>
