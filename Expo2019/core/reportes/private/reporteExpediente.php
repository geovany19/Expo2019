<?php 
require_once('../templates/reporteDoc1.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/private/usuarios.php');

    //Se obtiene la fecha
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF('P','mm','Letter');
    $usuario = new Usuarios();
    $pdf->head('');
    $pdf->Ln(5);
    //$pdf->date();
    $pdf->setMargins(15,15,15);
    $pdf->Ln(10); 
    $pdf->SetFont('Courier','B',12);
    $pdf->SetTextColor(0,0,0);
    $pdf->header();

    $data = $usuario->reporteExpediente($_GET['id']);
    $data2 = $usuario->reporteExpediente2($_GET['id']);
    foreach($data2 as $datos2){  
        $pdf->date();            
        $pdf->SetFont('Courier','B','10');
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(40,10, utf8_decode('Nombres paciente:'),'',0,'B',true);
        $pdf->Cell(15,10, utf8_decode($datos2['nombre_paciente']),'',0,'',true);
        $pdf->Ln(10);
        $pdf->Cell(40,10, utf8_decode('Apellidos paciente:'),'',0,'B',true);
        $pdf->Cell(15,10, utf8_decode($datos2['apellido_paciente']),'',1,'',true);
        $pdf->Ln(5); 
        $pdf->SetDrawColor(106, 107, 109  );
        $pdf->SetLineWidth(1);
        $pdf->Line(200, 55, 10, 55);
        
    }

    foreach($data as $datos){              
        $pdf->SetFont('Courier','B','12');
        $pdf->SetFillColor(255,255,255);
        $pdf->SetDrawColor(59, 73, 138  );
        $pdf->SetTextColor(0,0,0);
        $pdf->SetLineWidth(0.75);
        $pdf->Cell(40,10, utf8_decode('Nombres doctor:'),'',0,'B',true);
        $pdf->Cell(5,10, utf8_decode($datos['nombre_doctor']),'',0,'',true);
        $pdf->Ln(10);
        $pdf->Cell(45,10, utf8_decode('Apellidos doctor:'),'',0,'B',true);
        $pdf->Cell(5,10, utf8_decode($datos['apellido_doctor']),'',1,'',true);
        $pdf->Ln(3);
        $pdf->Cell(60,5, utf8_decode('Fecha de la consulta:'),0,0,'B',true);
        $pdf->Cell(0,5, utf8_decode($datos['fecha_cita']),0,1,'B',true); 
        $pdf->Ln();
        $pdf->Cell(180,10, utf8_decode('Sintomas o padecimientos que presenta el paciente:'),0,1,'C',true);
        $pdf->Cell(180,10, utf8_decode($datos['padecimientos']),1,1,'B',true);
        $pdf->Ln();
        $pdf->Cell(180,10, utf8_decode('Receta:'),0,1,'C',true);
        $pdf->Cell(180,10, utf8_decode($datos['receta']),1,1,'B',true);
        $pdf->Ln();
    }


    $pdf->Output();
?>