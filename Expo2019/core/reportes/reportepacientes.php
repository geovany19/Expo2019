<?php
//los require necesario para que funcione
require_once("plantilla.php");

require_once("../helpers/database.php");
require_once("../helpers/validator.php");
require_once("../models/dashboard/pacientes.php");

ini_set('date.timezone', 'America/El_Salvador');
$today = date('Y-m-d');
if( $_GET['fechaini'] < $today && $_GET['fechafin'] < $today && $_GET['fechaini'] < $_GET['fechafin']  ){
  $pdf = new PDF('L','mm','Letter');
  $paciente = new Pacientes();
  $ruta = '../../resources/img/dashboard/pacientes/';
  $pdf->head('REPORTE DE PACIENTES');
  $pdf->date();
  $pdf->SetFont('Arial','B', '10');
  $pdf ->SetFillColor(115,168,189);
  $pdf ->SetTextColor(255,255,255);
  $pdf->Cell(25);
  
  $pdf->Cell(37,10,utf8_decode('ID'),1,0,'C',true);
  $pdf->Cell(37,10,utf8_decode('Nombres'),1,0,'C',true);
  $pdf->Cell(37,10,utf8_decode('Apellidos'),1,0,'C',true);
  $pdf->Cell(37,10,utf8_decode('Usuario'),1,0,'C',true);
  $pdf->Cell(37,10,utf8_decode('Fecha'),1,0,'C',true);
  $pdf->Cell(37,10,utf8_decode('Foto'),1,0,'C',true);
  
  $pdf->LN(10);
  
    $fechaini = $_GET['fechaini'];
    $fechafin = $_GET['fechafin'];
    $data = $paciente->pacientesFechas($fechaini, $fechafin);
    foreach($data as $pacientes){
      $pdf->SetFont('Arial','','10');
      $pdf->SetFillColor(255,255,255);
      $pdf->SetTextColor(0,0,0);
      $pdf->Cell(25);
      $pdf->Cell(37,30,utf8_decode($pacientes['id_paciente']),1,0,'C',true);
      $pdf->Cell(37,30,utf8_decode($pacientes['nombre_paciente']),1,0,'C',true);
      $pdf->Cell(37,30,utf8_decode($pacientes['apellido_paciente']),1,0,'C',true);
      $pdf->Cell(37,30,utf8_decode($pacientes['usuario_paciente']),1,0,'C',true);
      $pdf->Cell(37,30,utf8_decode($pacientes['fecha_nacimiento']),1,0,'C',true);
      $pdf->Cell(37,30,$pdf->Image(($ruta.$pacientes['foto_paciente']),$pdf->getX()+5, $pdf->getY()+3, 25),1,0,'C');
      $pdf->Ln();
  
  }
  $pdf->Output();
}
else{
  echo 'Fechas invalidas';
}

?>