<?php

include '../conexion.php';

$id_idioma = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_idioma'], ENT_QUOTES)));
$nombre_idioma = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nombre_idioma'], ENT_QUOTES)));
$ilc = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['ilc'], ENT_QUOTES)));
$nacion = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nacion'], ENT_QUOTES)));
$estado_i = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['estado_i'], ENT_QUOTES)));

$sql="UPDATE idiomas SET nombre_idioma='".strtoupper($nombre_idioma)."', ilc='".strtoupper($ilc)."', nacion='".strtoupper($nacion)."',estado_i='".$estado_i."' WHERE id_idioma=$id_idioma";

    echo $ejecutar_insercion = mysqli_query($conexion, $sql);
  
?>