<?php 
require_once('../templates/reporteDoc1.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/private/usuarios.php');

    //Se obtiene la fecha
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF();
    $usuario = new Usuarios();
    $pdf->head('Receta');
    $pdf->date();
    $pdf->Ln(10); 
    $pdf->SetFont('Courier','','12');
   // $pdf->SetFillColor(29,185,84);
    $pdf->SetTextColor(0,0,0);
    $data = $usuario->reporteReceta1($_GET['id']);  
    $last = count($data) - 1;
    $pdf->Cell(25,10, utf8_decode('Doctor/a:'),'',0,'C',true);
    $pdf->Cell(25,10, utf8_decode($data[$last ]['nombre_doctor']),'',1,'C',true);
    $pdf->Cell(25,10, utf8_decode($data[$last]['apellido_doctor']),'',1,'C',true);
    $pdf->Ln(1);
    $pdf->Cell(95,10, utf8_decode('Paciente:'),'B,T,L',0,'C',true);
    $pdf->Cell(95,10, utf8_decode($data[$last]['nombre_paciente']),'B,T,R',1,'C',true);
    $pdf->Cell(95,10, utf8_decode($data[$last]['apellido_paciente']),'B,T,R',1,'C',true);
    $pdf->Cell(0,10,utf8_decode($data[$last]['receta']),'B,T,R',1,'C',true);
  //  $pdf->Cell(40,10, utf8_decode($data['padecimientos']),'B,T,R',1,'C',true );

    $pdf->Output();
?>