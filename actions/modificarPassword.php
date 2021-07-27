<?php

include '../conexion.php';

$id_usuario = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_usuario'], ENT_QUOTES)));
$pass = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['pass'], ENT_QUOTES)));
$pass_nuevo=password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);
$sql="UPDATE usuarios SET pass='".$pass_nuevo."' WHERE id_usuario='".$id_usuario."' ";



    echo $ejecutar_insercion = mysqli_query($conexion, $sql);
  
?>