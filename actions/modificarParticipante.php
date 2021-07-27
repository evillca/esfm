<?php

include '../conexion.php';
$id_postulante = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_postulante'], ENT_QUOTES)));
$nombre1 = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nombre1'], ENT_QUOTES)));
$nombre2 = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nombre2'], ENT_QUOTES)));
$appaterno = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['appaterno'], ENT_QUOTES)));
$apmaterno = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['apmaterno'], ENT_QUOTES)));
$nrodocumento = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['nrodocumento'], ENT_QUOTES)));
$expedido_en = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['expedido_en'], ENT_QUOTES)));
$fecha_nac = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['fecha_nacimiento'], ENT_QUOTES)));
$genero = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['genero'], ENT_QUOTES)));
$esfm_postula = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['esfm_postula'], ENT_QUOTES)));
$idioma = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['idioma'], ENT_QUOTES)));
$modalidad = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['modalidad'], ENT_QUOTES)));

$estado_evaluacion = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['estado_evaluacion'], ENT_QUOTES)));
$oral = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['oral'], ENT_QUOTES)));
$escrito = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['escrito'], ENT_QUOTES)));
$id_usuario = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_usuario'], ENT_QUOTES)));




//generar codigo certificado
$minusculas='abcdefghijklmnopqrstuvwxyz';
$caracteres = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$generado=substr(str_shuffle($caracteres), 0,8);

$sql = "UPDATE postulantes SET cod_certificado='".$generado."',nombre1='".strtoupper($nombre1)."',nombre2='".strtoupper($nombre2)."',appaterno='".strtoupper($appaterno)."',apmaterno='".strtoupper($apmaterno)."',nrodocumento='".$nrodocumento."',expedido_en='".$expedido_en."',genero='".$genero."',esfm_postula='".$esfm_postula."',idioma='".$idioma."',modalidad='".$modalidad."',fecha_nacimiento='".$fecha_nac."', estado_evaluacion='".$estado_evaluacion."',oral='".$oral."',escrito='".$escrito."',user_update='".$id_usuario."',date_update=now() WHERE id_postulante='".$id_postulante."' ";
echo $ejecutar_insercion = mysqli_query($conexion, $sql);


/*
$sql = "UPDATE postulantes SET cod_certificado='".$generado."',nombre1='".$nombre1."',nombre2='".$nombre2."',appaterno='".$appaterno."',apmaterno='".$apmaterno."',nrodocumento='".$nrodocumento."',expedido_en='".$expedido_en."',genero='".$genero."',esfm_postula='".$esfm_postula."',idioma='".$idioma."',modalidad='".$modalidad."',fecha_nacimiento='".$fecha_nac."', estado_evaluacion='".$estado_evaluacion."',oral='".$oral."',escrito='".$escrito."',user_update='".$id_usuario."',date_update=now() WHERE id_postulante='".$id_postulante."' ";
    echo $ejecutar_insercion = mysqli_query($conexion, $sql);*/
  
?>