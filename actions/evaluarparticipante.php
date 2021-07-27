<?php

include '../conexion.php';
$id_solicitud= mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_solicitud'], ENT_QUOTES)));
$esfm_postula = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['esfm_postula'], ENT_QUOTES)));
$idioma = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['idioma'], ENT_QUOTES)));
$modalidad = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['modalidad'], ENT_QUOTES)));

$estado_evaluacion = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['estado_evaluacion'], ENT_QUOTES)));
$oral = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['oral'], ENT_QUOTES)));
$escrito = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['escrito'], ENT_QUOTES)));
$id_usuario = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_usuario'], ENT_QUOTES)));


if($estado_evaluacion==1){
	//generar codigo certificado
	$minusculas='abcdefghijklmnopqrstuvwxyz';
	$caracteres = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	$generado=substr(str_shuffle($caracteres), 0,8);
	$sql = "UPDATE solicitudes 
			SET cod_certificado='".$generado."',
				esfm_postula='".$esfm_postula."',
				idioma='".$idioma."',
				modalidad='".$modalidad."',
				estado_evaluacion='".$estado_evaluacion."',
				oral='".$oral."',
				escrito='".$escrito."',
				user_update='".$id_usuario."',
				date_update=now()
				WHERE id_solicitud='".$id_solicitud."' 
	";

	echo $ejecutar_insercion = mysqli_query($conexion, $sql);
}elseif ($estado_evaluacion == 2 || $estado_evaluacion==0) {

	$sql = "UPDATE solicitudes 
			SET 
				estado_evaluacion='".$estado_evaluacion."',
				user_update='".$id_usuario."',
				date_update=now()
				WHERE id_solicitud='".$id_solicitud."'
			";

	echo $ejecutar_insercion = mysqli_query($conexion, $sql);
} 




/*
$sql = "UPDATE postulantes SET cod_certificado='".$generado."',nombre1='".$nombre1."',nombre2='".$nombre2."',appaterno='".$appaterno."',apmaterno='".$apmaterno."',nrodocumento='".$nrodocumento."',expedido_en='".$expedido_en."',genero='".$genero."',esfm_postula='".$esfm_postula."',idioma='".$idioma."',modalidad='".$modalidad."',fecha_nacimiento='".$fecha_nac."', estado_evaluacion='".$estado_evaluacion."',oral='".$oral."',escrito='".$escrito."',user_update='".$id_usuario."',date_update=now() WHERE id_postulante='".$id_postulante."' ";
echo $ejecutar_insercion = mysqli_query($conexion, $sql);*/

?>