<?php
include '../conexion.php';
session_start();
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    $contador = 1;

    $cantidad = mysqli_query($conexion, "SELECT COUNT(*) as cantidad FROM modalidades");
    $ejecucion_cantidad = mysqli_fetch_array($cantidad);

    $cantidad1 = $ejecucion_cantidad['cantidad'];


    $sql="SELECT * FROM modalidades";
    $result=mysqli_query($conexion,$sql);
    if ($cantidad1 > 0) {
        ?>   
        <table id="tablaParticipantes" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>COD. MODALIDAD</th>
                                <th>Descripcion</th>
                                <th>EDITAR</th>
                                <th>ESTADO</th>
                       
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>COD. MODALIDAD</th>
                                <th>Descripcion</th>
                                <th>EDITAR</th>
                                <th>ESTADO</th>
                        
                            </tr>
                        </tfoot>
                        
                        <tbody>
                            <?php
                            //$conexion=mysqli_connect('localhost','root','','aspirantes');
                            
                            while($mostrar=mysqli_fetch_array($result)){
                            ?>
                                <tr>
                                <td><?php echo $contador ?></td>
                                    <td><?php echo $mostrar['nombre_modalidad']?></td>
                                    <td><?php echo $mostrar['descripcion_modalidad']?></td>
                                    
                                    <td><button type="button" class="btn btn-icon btn-round btn-info" data-toggle="modal" data-target="#modificarModalidad" data-modalidad="<?php echo $mostrar['id_modalidad']?>" data-nombre_modalidad="<?php echo $mostrar['nombre_modalidad'] ?>" data-descripcion_modalidad="<?php echo $mostrar['descripcion_modalidad']?>" data-estado_modalidad="<?php echo $mostrar['estado_modalidad']?>" >
                                            <i class="fas fa-user-edit"></i>
                                        </button></td>
                                
                                    <?php
                                        if ($mostrar['estado_modalidad'] == 1) {
                                            ?>
                                            <td><span class="badge badge-pill badge-success"> Activo</span></td>  
                                            <?php
                                        } 
                                        else{
                                    ?>
                                    <td><span class="badge badge-pill badge-danger"> Inactivo</span></td> 
                                
                                    <?php } $contador = $contador + 1; ?>
                                    
                                       

                                        
                                            <?php
                                        }
                                        ?>
                                        
                                    
                                    
                                </tr>
                            <?php } ?>
                                

                        </tbody>
                        
                    </table>
        <?php
    } else {
        ?>
        <div class="alert alert-warning" role="alert">
            No existen registro de Postulantes  !!!!
        </div>
        <?php $contador = $contador + 1;
    }

?>
<script type="text/javascript">
$(document).ready(function() {
    $('#tablaParticipantes').DataTable( {
        language: {
    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ning??n dato disponible en esta tabla",
    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "??ltimo",
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
        "collection": "Colecci??n",
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
        "add": "A??adir condici??n",
        "button": {
            "0": "Constructor de b??squeda",
            "_": "Constructor de b??squeda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condici??n",
        "conditions": {
            "date": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vac??o",
                "equals": "Igual a",
                "not": "No",
                "notBetween": "No entre",
                "notEmpty": "No Vacio"
            },
            "moment": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vac??o",
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
                "notEmpty": "No vac??o"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vac??o",
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
        "rightTitle": "Criterios de sangr??a",
        "title": {
            "0": "Constructor de b??squeda",
            "_": "Constructor de b??squeda (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de b??squeda",
            "_": "Paneles de b??squeda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de b??squeda",
        "loadMessage": "Cargando paneles de b??squeda",
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