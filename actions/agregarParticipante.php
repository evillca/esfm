<?php

include '../conexion.php';

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
//$dep_esfm = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['departamento_esfm'], ENT_QUOTES)));
$id_usuario = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['id_usuario'], ENT_QUOTES)));

if($nombre2 == "" && $nombre2=null){
    $nombre2=null;
}else{
    $nombre2;
}
//generar codigo certificado
//$minusculas='abcdefghijklmnopqrstuvwxyz';
//$caracteres = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
//$generado=substr(str_shuffle($caracteres), 0,9);
$sql1="INSERT INTO ciudadanonacional SET id_ciudadano=null, 
                                        nombre1='".strtoupper($nombre1)."',
                                        nombre2='".strtoupper($nombre2)."',
                                        appaterno='".strtoupper($appaterno)."',
                                        apmaterno='".strtoupper($apmaterno)."',
                                        nrodocumento='".strtoupper($nrodocumento)."',
                                        expedido_en='".$expedido_en."',
                                        fecha_nacimiento='".$fecha_nac."',
                                        genero='".$genero."'
                                         ";
$ejecutar_insercion = mysqli_query($conexion, $sql1);
if($ejecutar_insercion == 1){
    $cantidad = mysqli_query($conexion, "SELECT id_ciudadano FROM ciudadanonacional WHERE nrodocumento='".$nrodocumento."' ");
    $ejecucion_cantidad = mysqli_fetch_array($cantidad);
    $nrodocumento = $ejecucion_cantidad['id_ciudadano'];

    $sql = "INSERT INTO solicitudes SET esfm_postula='".$esfm_postula."',
                                        idioma='".$idioma."',
                                        modalidad='".$modalidad."',
                                        user_update='".$id_usuario."',
                                        id_ciudadano='".$nrodocumento."'
                                        ";
    echo $ejecutar_insercion = mysqli_query($conexion, $sql);
}
  
?>