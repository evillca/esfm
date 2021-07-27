<?php

include '../conexion.php';

$nombre_modalidad = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nombre_modalidad'], ENT_QUOTES)));
$descripcion_modalidad = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['descripcion_modalidad'], ENT_QUOTES)));
 

$sql="INSERT INTO modalidades VALUES(NULL,'".strtoupper($nombre_modalidad)."','".$descripcion_modalidad."',true) ";

    echo $ejecutar_insercion = mysqli_query($conexion, $sql);
  
?>