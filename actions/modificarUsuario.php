<?php

include '../conexion.php';

$id_usuario = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_usuario'], ENT_QUOTES)));
$nombre_u = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nombre_u'], ENT_QUOTES)));
$appaterno_u = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['appaterno_u'], ENT_QUOTES)));
$apmaterno_u = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['apmaterno_u'], ENT_QUOTES)));
$usuario = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['usuario'], ENT_QUOTES)));
$email = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['email'], ENT_QUOTES)));
$id_departamento = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_departamento'], ENT_QUOTES)));
$id_idioma = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_idioma'], ENT_QUOTES)));

$sql="UPDATE usuarios SET nombre_u='".strtoupper($nombre_u)."',
						appaterno_u='".strtoupper($appaterno_u)."',
						apmaterno_u='".strtoupper($apmaterno_u)."',
						usuario='".$usuario."',
						email='".$email."',
						id_departamento='".$id_departamento."', 
						id_ilc='".$id_idioma."'

		WHERE id_usuario=$id_usuario ";

    echo $ejecutar_insercion = mysqli_query($conexion, $sql);
  
?>