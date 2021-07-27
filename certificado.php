<?php
include 'conexion.php';

use setasign\Fpdi\Fpdi;
require 'libs/vendor/autoload.php';
//verificar si existe el valor
$nrodocumento_verifica =  base64_decode($_GET['nrodocumento']);
$query_verifica="SELECT nrodocumento FROM solicitudes s, ciudadanonacional c WHERE (s.id_ciudadano=c.id_ciudadano) AND nrodocumento='".$nrodocumento_verifica."' ";

if(!isset($_GET) || ($_GET['nrodocumento'])==""){
	header('Location: index.php');

}else{

$nrodocumento =  base64_decode($_GET['nrodocumento']);
$date = date_default_timezone_get();
$cantidad = mysqli_query($conexion, "SELECT nrodocumento, nombre1,nombre2,appaterno,apmaterno,oral,escrito,nombre_idioma,ilc, id_idioma, cod_certificado FROM solicitudes s, ciudadanonacional c,idiomas i WHERE (s.id_ciudadano=c.id_ciudadano) AND (s.idioma=i.id_idioma)   AND nrodocumento='".$nrodocumento."'");

$ejecucion_cantidad = mysqli_fetch_array($cantidad);
$nombre1 = $ejecucion_cantidad['nombre1'];
$nombre2 = $ejecucion_cantidad['nombre2'];
$appaterno = $ejecucion_cantidad['appaterno'];
$apmaterno = $ejecucion_cantidad['apmaterno'];
$oral = $ejecucion_cantidad['oral'];
$escrito = $ejecucion_cantidad['escrito'];
$idioma = $ejecucion_cantidad['nombre_idioma'];
$nombre_ilc = $ejecucion_cantidad['ilc'];

$codigo = $ejecucion_cantidad['cod_certificado'];



if($oral==1){
	$oral= "BÁSICO";
}elseif ($oral==2) {
	$oral= "INTERMEDIO";
}elseif($oral==3){
	$oral= "AVANZADO";
}elseif($oral==0){
	$escrito= "NINGUNO";
}
else{
	$oral="APRENDIZAJE ";
}

if($escrito==1){
	$escrito= "BÁSICO";
}elseif ($escrito==2) {
	$escrito= "INTERMEDIO";
}elseif($escrito==3){
	$escrito= "AVANZADO";
}elseif($escrito==0){
	$escrito= "NINGUNO";
}
else{
	$escrito="APRENDIZAJE ";
}






/*
if ($ejecucion_cantidad['estado_evaluacion']!=1) {
	header("Location: aspirantes.php");
}*/

$pdf = new Fpdi();
$pdf->AddPage();
$pdf->setSourceFile('certificado.pdf');
$tplIdx=$pdf->importPage(1);
$pdf->useTemplate($tplIdx,null,null,null,null,true);

$nombrecompleto=strtoupper($nombre1.' '.$nombre2.' '.$appaterno.' '.$apmaterno);
$dota='evillca';
$fecha=$date;

//codigo certificado
$pdf->SetFont('Arial','B',18);
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(242, 35);
$pdf->Write(0, utf8_decode($codigo));

//evento
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(220, 35);
$pdf->Write(0, utf8_decode('COD-CERT:'));

//nombre
$pdf->SetFont('Arial','B',18);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(90,86);
$pdf->Write(0, utf8_decode($nombrecompleto));


//ILC
$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(90,125);
$pdf->Write(0, utf8_decode($nombre_ilc),);




//nivel oral
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(60, 106);
$pdf->Write(0, utf8_decode($oral));

//nivel escrito
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(135, 106);

$pdf->Write(0, utf8_decode($escrito));

//idioma
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(200, 106);
$pdf->Write(0, utf8_decode($idioma));

//fecha
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(20, 190);
$pdf->Write(0, utf8_decode('Fecha de Impresion:'));
//fecha
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(48, 190);
$pdf->Write(0, utf8_decode('18-12-2020'));
$qrs='https://chart.apis.google.com/chart?cht=qr&chs=180x180&chld=L|0&chl=';
//qr
 $pdf->Image($qrs.'IPELC',30,165,20,20,'png');

//evento
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(225, 30);
$pdf->Write(0, utf8_decode('EVENTO:'));
//codigo evento
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(242, 30);
$pdf->Write(0, utf8_decode('COVID-19'));



$pdf->Output($nrodocumento.'-'.strtoupper($idioma).'.pdf','I');
$pdf->Output();
}