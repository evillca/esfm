<?php
  $servidor= 'localhost';
  $usuario= 'root';
  $password='';
  $bd='penelope_db';
  $conexion = @mysqli_connect($servidor, $usuario,$password,$bd);
  $conexion->query("SET NAMES 'utf8'");
/*  if($conexion){
     echo 'conectado correctamente';
  }else{
  	die("no se pudo conectar: ".msqli.error($conexion));
  }*/
?>