<?php
include '../conexion.php';
session_start();
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    $contador = 1;
    //AND user_update=".$_SESSION['id_usuario']
    $table = " ciudadanonacional c, departamentos d";
    $condicion = "WHERE (c.expedido_en=d.id_departamento); " ;

    $cantidad = mysqli_query($conexion, "SELECT count(*) as cantidad from ciudadanonacional c, departamentos d WHERE c.expedido_en=d.id_departamento");
    $ejecucion_cantidad = mysqli_fetch_array($cantidad);

    $cantidad1 = $ejecucion_cantidad['cantidad'];


    $sql="SELECT * FROM $table $condicion ";
    $result=mysqli_query($conexion,$sql);
    if ($cantidad1 > 0) {
        ?>   
        <table id="tablaParticipantes" class="display table table-striped table-hover" >
            <thead>
                <tr>
                    <th>No.</th>
                    <th>C.I.</th>
                    <th>NOMBRE Y APELLIDOS</th>
                    <th>FECHA NAC.</th>
                    <th>GENERO</th>
                    <th>CEL.</th>
                    <th>ACCIONES</th>
                
           
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No.</th>
                    <th>C.I.</th>
                    <th>NOMBRE Y APELLIDOS</th>
                    <th>FECHA NAC.</th>
                    <th>GENERO</th>
                    <th>CEL.</th>
                    <th>ACCIONES</th>
                  
            
                </tr>
            </tfoot>
                        
                        <tbody>
                            <?php
                            //$conexion=mysqli_connect('localhost','root','','aspirantes');
                            
                            while($mostrar=mysqli_fetch_array($result)){
                            ?>
                                <tr>
                                <td><?php echo $contador ?></td>
                                    <td><?php echo $mostrar['nrodocumento']?></td>
                                    <td><?php echo $mostrar['nombre1'].' ' .$mostrar['nombre2'].' '. $mostrar['appaterno'].' '.$mostrar['apmaterno'] ?></td>
                                    <td><?php echo $mostrar['fecha_nacimiento']?></td>
                                    <td><?php
                                    	if ($mostrar['genero']=='M') {
                                    	echo "Mascuilno";
                                    	}else{
                                    		echo "Femenino";
                                    	}
                                		?></td>
                                    <td><?php echo $mostrar['telefono']?></td>
                                    
                                    <td><button type="button" class="btn btn-icon btn-round btn-info" data-toggle="modal" data-target="#modificarEsfm" data-id_esfm="<?php echo $mostrar['id_esfm']?>" data-nombre_esfm="<?php echo $mostrar['nombre_esfm']?>" data-id_departamento="<?php echo $mostrar['id_departamento']?>" >
                                            <i class="fas fa-user-edit"></i>
                                        </button></td>
                                
                                      <?php
                                        }$contador = $contador + 1;
                                        ?>
                                        
                                    
                                    
                                </tr>
                            <?php } ?>
                                

                        </tbody>
                        
                    </table>
        <?php
    } else {
        ?>
        <div class="alert alert-warning" role="alert">
            No existen registro de Personas  !!!!
        </div>
        <?php
    }
 
?>
<script type="text/javascript">
$(document).ready(function() {
    $('#tablaParticipantes').DataTable( {
        language: {
    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %d fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "1": "Mostrar 1 fila",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
    },
    "decimal": ",",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
            "date": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "not": "No",
                "notBetween": "No entre",
                "notEmpty": "No Vacio"
            },
            "moment": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "not": "No",
                "notBetween": "No entre",
                "notEmpty": "No vacio"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacio",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual que",
                "not": "No",
                "notBetween": "No entre",
                "notEmpty": "No vacío"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina en",
                "equals": "Igual a",
                "not": "No",
                "notEmpty": "No Vacio",
                "startsWith": "Empieza con"
            }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d"
    },
    "select": {
        "1": "%d fila seleccionada",
        "_": "%d filas seleccionadas",
        "cells": {
            "1": "1 celda seleccionada",
            "_": "$d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        }
    },
    "thousands": "."
} 
    } );
} );
</script>
  <!-- datatable-->
   
    <script src="https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"></script>