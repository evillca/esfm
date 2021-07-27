<?php

include '../conexion.php';
$id_ciudadano = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_ciudadano'], ENT_QUOTES)));
$nombre1 = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nombre1'], ENT_QUOTES)));
$nombre2 = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nombre2'], ENT_QUOTES)));
$appaterno = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['appaterno'], ENT_QUOTES)));
$apmaterno = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['apmaterno'], ENT_QUOTES)));
$nrodocumento = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nrodocumento'], ENT_QUOTES)));
$expedido_en = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['expedido_en'], ENT_QUOTES)));
$fecha_nacimiento = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['fecha_nacimiento'], ENT_QUOTES)));
$genero = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['genero'], ENT_QUOTES)));
 
//$id_usuario = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_usuario'], ENT_QUOTES)));
 

$sql = "UPDATE ciudadanonacional SET nombre1='".strtoupper($nombre1)."',nombre2='".strtoupper($nombre2)."',appaterno='".strtoupper($appaterno)."',apmaterno='".strtoupper($apmaterno)."',nrodocumento='".$nrodocumento."',expedido_en='".$expedido_en."', fecha_nacimiento='".$fecha_nacimiento."',genero='".$genero."' WHERE id_ciudadano='".$id_ciudadano."' ";
echo $ejecutar_insercion = mysqli_query($conexion, $sql);


/*
$sql = "UPDATE postulantes SET cod_certificado='".$generado."',nombre1='".$nombre1."',nombre2='".$nombre2."',appaterno='".$appaterno."',apmaterno='".$apmaterno."',nrodocumento='".$nrodocumento."',expedido_en='".$expedido_en."',genero='".$genero."',esfm_postula='".$esfm_postula."',idioma='".$idioma."',modalidad='".$modalidad."',fecha_nacimiento='".$fecha_nac."', estado_evaluacion='".$estado_evaluacion."',oral='".$oral."',escrito='".$escrito."',user_update='".$id_usuario."',date_update=now() WHERE id_postulante='".$id_postulante."' ";
    echo $ejecutar_insercion = mysqli_query($conexion, $sql);*/
  
?>