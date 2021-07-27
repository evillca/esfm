<?php

include '../conexion.php';

$id_modalidad = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['modalidad'], ENT_QUOTES)));
$nombre_modalidad = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nombre_modalidad'], ENT_QUOTES)));
$descripcion_modalidad = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['descripcion_modalidad'], ENT_QUOTES)));
$estado_modalidad = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['estado_modalidad'], ENT_QUOTES)));


//generar codigo certificado
//$minusculas='abcdefghijklmnopqrstuvwxyz';
//$caracteres = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
//$generado=substr(str_shuffle($caracteres), 0,9);
 

$query="UPDATE modalidades SET nombre_modalidad='".$nombre_modalidad."' ,descripcion_modalidad='".$descripcion_modalidad."' ,estado_modalidad='".$estado_modalidad."' WHERE id_modalidad='".$id_modalidad."' ";

    echo $ejecutar_insercion = mysqli_query($conexion, $query);
  

?>
