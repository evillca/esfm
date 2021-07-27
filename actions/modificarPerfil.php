<?php 
include '../conexion.php';
$nombre = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nombre'], ENT_QUOTES)));
$appaterno = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['appaterno'], ENT_QUOTES)));
$apmaterno = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['apmaterno'], ENT_QUOTES)));
$password_nueva = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['password_nueva'], ENT_QUOTES)));
$id_usuario = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_usuario'], ENT_QUOTES)));
$pass_encriptado = password_hash($password_nueva, PASSWORD_BCRYPT,['cost' => 4]);
if (strlen($_POST['password_nueva'])>0) {
	$sql = "UPDATE usuarios SET nombre_u='".strtoupper($nombre)."',appaterno_u='".strtoupper($appaterno)."',apmaterno_u='".strtoupper($apmaterno)."',pass='".$pass_encriptado."' WHERE id_usuario='".$id_usuario."' ";
	 $ejecutar_insercion = mysqli_query($conexion, $sql);
	 header("Location: ../perfil.php");

}else{
	$sql = "UPDATE usuarios SET nombre_u='".strtoupper($nombre)."',appaterno_u='".strtoupper($appaterno)."',apmaterno_u='".strtoupper($apmaterno)."' WHERE id_usuario='".$id_usuario."' ";
	 $ejecutar_insercion = mysqli_query($conexion, $sql);
	 header("Location: ../perfil.php");
	
}
die();