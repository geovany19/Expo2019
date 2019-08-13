<?php 
require_once('../templates/reporteDoc1.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/private/usuarios.php');

    //Se obtiene la fecha
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF('P','mm', array(200,200));
    $usuario = new Usuarios();
    $pdf->head('');
  //  $pdf->date();
    $pdf->setMargins(15,15,15);
    $pdf->Ln(10); 
    $pdf->SetFont('Courier','B',12);
    $pdf->SetTextColor(0,0,0);
    $pdf->header();
    $data = $usuario->reporteReceta1($_GET['id']);  
    $last = count($data) - 1;
    $pdf->date();            
        $pdf->SetFont('Courier','B','10');
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(35,10, utf8_decode('Nombres doctor: '),'',0,'B',true);
        $pdf->Cell(15,10, utf8_decode($data[$last ]['nombre_doctor']),'',0,'C',true);
         $pdf->Cell(15,10, utf8_decode($data[$last]['apellido_doctor']),'',1,'C',true);
        $pdf->Ln(0.5);
        $pdf->Cell(40,10, utf8_decode('Nombres paciente:'),'',0,'B',true);
        $pdf->Cell(25,10, utf8_decode($data[$last]['nombre_paciente']),'',0,'C',true);
        $pdf->Cell(25,10, utf8_decode($data[$last]['apellido_paciente']),'',1,'C',true);
        $pdf->Ln(10); 
        $pdf->SetDrawColor(106, 107, 109  );
        $pdf->SetLineWidth(1);
        $pdf->Line(190, 55, 10, 55);
        $pdf->Cell(40,10, utf8_decode('Receta:'),'',0,'B',true);
        $pdf->Ln(10);
        $pdf->Cell(0,70,utf8_decode($data[$last]['receta']),1,1,'L',true);
        $pdf->Ln(20);
        $pdf->foot();
    $pdf->Output();
?>