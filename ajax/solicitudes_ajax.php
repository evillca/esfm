<?php
include '../conexion.php';

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    $contador = 1;
    $q = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
    $tabla="postulantes p,departamentos d, idiomas i, esfm e, modalidades m";
    $condicion=" where (p.idioma=i.id_idioma) and (p.expedido_en=d.id_departamento) and (p.esfm_postula=e.id_esfm) and (p.modalidad=m.id_modalidad) and estado_p=1 ORDER BY appaterno ASC";
    if ($_GET['q'] != "") {
        $condicion .= " and (p.nombre1 LIKE '%" . $q . "%' or p.nrodocumento LIKE '%" . $q . "%' or c.appaterno LIKE '%".$q."%')  order by p.nombre1 ";
    }

  
                        $sql="SELECT nrodocumento,nombre1,nombre2,appaterno,apmaterno,nombre_idioma,nombre_esfm,nombre_departamento,estado_evaluacion,oral,escrito FROM $tabla $condicion";
                        $result=mysqli_query($conexion,$sql);
                        if ($cantidad1 > 0) {
                            ?>   
                       
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tablaparticipantes" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Nro Documento</th>
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
                                <th>Nro Documento</th>
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
                                            <td><span class="badge badge-pill badge-danger"> En aprendizaje</span></td>  
                                            <?php
                                        }elseif($mostrar['estado_evaluacion']==0){
                                    ?>
                                    <td><span class="badge badge-pill badge-warning"> Pendiente</span></td>  <?php }?>
                                    
                                        <?php

                            
                            
                                        if ($mostrar['estado_evaluacion']==1) {
                                            ?>
                                            <td>
                                
                            <a href="pdf.php?nrodocumento=<?php echo $mostrar['nrodocumento']?>" target="_blank">
                                <button type="button" class="btn btn-icon btn-round btn-success">
                                <i class="fas fa-print"></i>
                            </button></a>
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
                                            <i class="fas fa-user-edit" ></i>
                                        </button></td>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <td><button type="button" class="btn btn-icon btn-round btn-info" data-toggle="modal" data-target="#modificarAspirante" data-id_postulante="<?php echo $mostrar['id_postulante']?>" data-nombre1="<?php echo $mostrar['nombre1']?>" data-nombre2="<?php echo $mostrar['nombre2']?>" data-appaterno="<?php echo $mostrar['appaterno']?>" data-apmaterno="<?php echo $mostrar['apmaterno']?>" data-nrodocumento="<?php echo $mostrar['nrodocumento']?>" data-expedido_en="<?php echo $mostrar['expedido_en']?>" data-fecha_nacimiento="<?php echo $mostrar['fecha_nacimiento']?>" data-genero="<?php echo $mostrar['genero']?>" data-esfm_postula="<?php echo $mostrar['esfm_postula']?>" data-idioma="<?php echo $mostrar['idioma']?>" data-modalidad="<?php echo $mostrar['modalidad']?>" data-estado_evaluacion="<?php echo $mostrar['estado_evaluacion']?>" data-oral="<?php echo $mostrar['oral']?>" data-escrito="<?php echo $mostrar['escrito']?>">
                                            <i class="fas fa-user-edit"></i>
                                        </button></td>
                                            <?php
                                        }
                                        ?>
                                        
                                    
                                    
                                </tr>
                            <?php }?>
                                

                        </tbody>
                        
                    </table>
                </div>
            </div>
                                   
        <?php
    } else {
        ?>
        <div class="alert alert-warning" role="alert">
            No existe aún registros !!!!
        </div>
        <?php
    }

?>