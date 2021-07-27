<?php

include '../conexion.php';

$nombre_idioma = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nombre_idioma'], ENT_QUOTES)));
$ilc = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['ilc'], ENT_QUOTES)));
$nacion = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nacion'], ENT_QUOTES)));

$sql="INSERT INTO idiomas (nombre_idioma,ilc,nacion)VALUES('".strtoupper($nombre_idioma)."','".strtoupper($ilc)."','".strtoupper($nacion)."' )";

    echo $ejecutar_insercion = mysqli_query($conexion, $sql);
  
?>