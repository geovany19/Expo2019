<?php 
require_once('../templates/reportesPublic.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/public/citas.php');

    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF();
    $citas = new Citas();
    $pdf->setMargins(15,15,15);
    $pdf->head('REPORTE DE CITAS');
    $pdf->date();
    $pdf->SetFont('Courier','B','10');
    $pdf->SetFillColor(66,139,202);
    $pdf->SetTextColor(255,255,255);
    $data = $citas->reporteCitas();   
    $fecha = '';
    foreach($data as $datos) {
        if(utf8_decode($datos['fecha']) != $fecha){
            $pdf->SetFillColor(66,139,202);
            $pdf->SetTextColor(255,255,255);
            $pdf->SetFont('Courier','B','12');
            $pdf->Ln(10); 
            $pdf->Cell(95,10, utf8_decode('Fecha: '.$datos['fecha']),1,1,'C',true); 
            $pdf->SetFillColor(66,139,202);
            $pdf->SetTextColor(255,255,255);
            $pdf->SetFont('Courier','B','12');            
            $pdf->Cell(60,10, utf8_decode('Nombre del doctor'),'B,T,L',0,'C',true);
            $pdf->Cell(60,10, utf8_decode('Hora de la cita'),'B,T',0,'C',true); 
            $pdf->Cell(60,10, utf8_decode('Estado de la cita'),'B,T,R',1,'C',true); 
            $fecha = $datos['fecha'];         
        }        
        $pdf->SetFont('Courier','','12');
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(60,10, utf8_decode($datos['nombre_doctor']),'B,T,L',0,'C',true);
        $pdf->Cell(60,10, utf8_decode($datos['hora_cita']),'B,T,R',0,'C',true);
        $pdf->Cell(60,10, utf8_decode($datos['estado']),'B,T,R',0,'C',true);
        $pdf->Ln(); 
    }
    $pdf->Output();
?>