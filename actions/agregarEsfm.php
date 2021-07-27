<?php

include '../conexion.php';

$nombre_esfm = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nombre_esfm'], ENT_QUOTES)));

$id_departamento = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['expedido_en'], ENT_QUOTES)));



//generar codigo certificado
//$minusculas='abcdefghijklmnopqrstuvwxyz';
//$caracteres = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
//$generado=substr(str_shuffle($caracteres), 0,9);

$sql="INSERT INTO esfm (nombre_esfm,id_departamento)VALUES('".strtoupper($nombre_esfm)."',$id_departamento)";

    echo $ejecutar_insercion = mysqli_query($conexion, $sql);
  
?>