<?php

include '../conexion.php';
$nombre_u = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nombre_u'], ENT_QUOTES)));
$appaterno_u = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['appaterno_u'], ENT_QUOTES)));
$apmaterno_u = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['apmaterno_u'], ENT_QUOTES)));
$usuario = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['usuario'], ENT_QUOTES)));
$email = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['email'], ENT_QUOTES)));
$pass = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['pass'], ENT_QUOTES)));
$id_departamento = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_departamento'], ENT_QUOTES)));
$id_idioma = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_idioma'], ENT_QUOTES)));

$pass_nuevo=password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);
$sql="INSERT INTO usuarios (nombre_u, appaterno_u, apmaterno_u, usuario, email, pass, id_departamento,id_ilc) VALUES($nombre_u,$appaterno_u,$apmaterno_u,$usuario,$email,$pass_nuevo,$id_departamento,$id_idioma); ";

    echo $ejecutar_insercion = mysqli_query($conexion, $sql);
  
?>