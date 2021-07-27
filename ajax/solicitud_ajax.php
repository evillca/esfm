<?php
include '../conexion.php';
session_start();
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    $contador = 1;
    //AND user_update=".$_SESSION['id_usuario']
    $usuario_ilc=$_SESSION['id_usuario'];
    $table = " solicitudes s,ciudadanonacional c, idiomas i, esfm e,modalidades m, departamentos d, usuarios u";
    $condicion = " WHERE (s.id_ciudadano=c.id_ciudadano) AND (s.esfm_postula=e.id_esfm) AND (s.idioma=i.id_idioma) AND (s.modalidad=m.id_modalidad) AND (e.id_departamento=d.id_departamento) AND (s.user_update=u.id_usuario) " ;

    $cantidad = mysqli_query($conexion, "SELECT count(*) as cantidad FROM solicitudes ");
    $ejecucion_cantidad = mysqli_fetch_array($cantidad);

    $cantidad1 = $ejecucion_cantidad['cantidad'];


    $sql="SELECT * FROM solicitudes s, ciudadanonacional c, esfm e, idiomas i, modalidades m, usuarios u, departamentos d WHERE (s.id_ciudadano=c.id_ciudadano) AND (s.esfm_postula=e.id_esfm) AND (s.idioma=i.id_idioma) AND (s.modalidad=m.id_modalidad) AND (s.user_update=u.id_usuario) AND (e.id_departamento=d.id_departamento) AND user_update='".$_SESSION['id_usuario']."' ";
    $result=mysqli_query($conexion,$sql);
    if ($cantidad1 > 0) {
        ?>   
        
        <table id="tablaParticipantes" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>C.I.</th>
                                <th>Nombre</th>
                                <th>Idioma</th>
                                <th>ESFM</th>
                                <th>Departamento</th>
                                <th>Estado</th>
                                <th>Imprimir</th>
                                <th>Evaluar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>C.I.</th>
                                <th>Nombre</th>
                                <th>Idioma</th>
                                <th>ESFM</th>
                                <th>Departamento</th>
                                <th>Estado</th>
                                <th>Imprimir</th>
                                <th>Evaluar</th>
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
                                    <td><?php echo $mostrar['nombre_idioma']?></td>
                                    <td><?php echo $mostrar['nombre_esfm']?></td>
                                    <td><?php echo $mostrar['nombre_departamento']?></td>
                                    <?php
                                        if ($mostrar['estado_evaluacion'] == 1) {
                                            ?>
                                            <td><span class="badge badge-pill badge-success"> Aprobado</span></td>  
                                            <?php
                                        } elseif($mostrar['estado_evaluacion']==2) {
                                            ?>
                                            <td><span class="badge badge-pill badge-danger"> Aprendizaje</span></td>  
                                            <?php
                                        }elseif($mostrar['estado_evaluacion']==0){
                                    ?>
                                    <td><span class="badge badge-pill badge-warning"> Pendiente</span></td>  <?php }?>
                                        <?php
                                        if ($mostrar['estado_evaluacion']==1) {
                                            ?>
                                            <td><form action="certificado.php?nrodocumento=<?php echo base64_encode($mostrar['nrodocumento'])?>" method="post" target="_blank">
 
                                             <a href="certificado.php?nrodocumento=<?php echo base64_encode($mostrar['nrodocumento'])?>" target="_blank">
                                                    <button type="submit" class="btn btn-icon btn-round btn-success">
                                                        <i class="fas fa-print"></i>
                                                    </button>
                                                </a>
                                            </form>
                                               
                                            </td>
                                            <?php
                                        }else{
                                            ?>
                                            <td><button type="button" class="btn btn-icon btn-round btn-success" disabled="">
                                            <i class="fas fa-print"></i>
                                            </button></td>
                                            <?php
                                        }
                                        ?>
                                        
                                        <?php
                                        if ($mostrar['estado_evaluacion']==1) {
                                            ?>
                                            <td><button type="button" class="btn btn-icon btn-round btn-info" disabled="">
                                            <i class="fas fa-award"></i>
                                        </button></td>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <td><button type="button" class="btn btn-icon btn-round btn-info" data-toggle="modal" data-target="#modificarAspirante" data-id_solicitud="<?php echo $mostrar['id_solicitud']?>" data-id_ciudadano="<?php echo $mostrar['id_ciudadano']?>" data-nombre1="<?php echo $mostrar['nombre1']?>" data-nombre2="<?php echo $mostrar['nombre2']?>" data-appaterno="<?php echo $mostrar['appaterno']?>" data-apmaterno="<?php echo $mostrar['apmaterno']?>" data-nrodocumento="<?php echo $mostrar['nrodocumento']?>" data-expedido_en="<?php echo $mostrar['expedido_en']?>" data-fecha_nacimiento="<?php echo $mostrar['fecha_nacimiento']?>" data-genero="<?php echo $mostrar['genero']?>" data-esfm_postula="<?php echo $mostrar['esfm_postula']?>" data-idioma="<?php echo $mostrar['idioma']?>" data-modalidad="<?php echo $mostrar['modalidad']?>" data-estado_evaluacion="<?php echo $mostrar['estado_evaluacion']?>" data-oral="<?php echo $mostrar['oral']?>" data-escrito="<?php echo $mostrar['escrito']?>">
                                            <i class="fas fa-chalkboard-teacher"></i>
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
            No existen registro de Solicitudes  !!!!
        </div>
        <?php
    }
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