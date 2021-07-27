<?php

include '../conexion.php';

$id_usuario = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_usuario'], ENT_QUOTES)));
$sql="UPDATE usuarios SET estado_u=0 WHERE id_usuario='".$id_usuario."' ";



    echo $ejecutar_insercion = mysqli_query($conexion, $sql);
  
?>