<?php 
require_once('../templates/reporteDoc1.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/private/usuarios.php');

    //Se obtiene la fecha
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF();
    $usuario = new Usuarios();
    $pdf->head('Expediente');
    $pdf->date();
    $pdf->setMargins(15,15,15);
    $pdf->Ln(10); 
    $pdf->SetFont('Courier','','12');
    $pdf->SetTextColor(0,0,0);

    $data = $usuario->reporteExpediente($_GET['id']);   
    foreach($data as $datos){              
        $pdf->SetFont('Courier','','12');
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(60,10, utf8_decode('Nombre del paciente:'),'',0,'B',true);
        $pdf->Cell(60,10, utf8_decode($datos['nombre_paciente']),'',0,'B',true);
        $pdf->Cell(0,10, utf8_decode($datos['apellido_paciente']),'',1,'B',true);
        $pdf->Ln(3); 
        $pdf->Cell(60,5, utf8_decode('Fecha de la consulta:'),'',0,'B',true);
        $pdf->Cell(0,5, utf8_decode($datos['fecha_cita']),'',1,'B',true); 
        $pdf->Ln();
        $pdf->Cell(0,5, utf8_decode('Sintomas o padecimientos que presenta el paciente:'),'',1,'C',true);
        $pdf->Cell(5,5, utf8_decode($datos['padecimientos']),'',1,'b',true);
        $pdf->Ln();
        $pdf->Cell(50,10, utf8_decode('Receta:'),'',1,'C',true);
        $pdf->Cell(5,10, utf8_decode($datos['receta']),'',1,'B',true);
        $pdf->Ln();
    }


    $pdf->Output();
?>