<?php

include '../conexion.php';

$id_esfm = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_esfm'], ENT_QUOTES)));
$nombre_esfm = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nombre_esfm'], ENT_QUOTES)));
$id_departamento = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_departamento'], ENT_QUOTES)));
$estado_esfm = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['estado_esfm'], ENT_QUOTES)));



//generar codigo certificado
//$minusculas='abcdefghijklmnopqrstuvwxyz';
//$caracteres = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
//$generado=substr(str_shuffle($caracteres), 0,9);
$sql = "UPDATE esfm SET nombre_esfm='".strtoupper($nombre_esfm)."', id_departamento='".$id_departamento."', estado_esfm='".$estado_esfm."' WHERE id_esfm='".$id_esfm."' ";

    echo $ejecutar_insercion = mysqli_query($conexion, $sql);
  

?>