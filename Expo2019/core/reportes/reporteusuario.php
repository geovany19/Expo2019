<?php
//los require necesario para que funcione
require_once("plantilla.php");

require_once("../helpers/database.php");
require_once("../helpers/validator.php");
require_once("../models/dashboard/usuarios.php");

if (isset($_SESSION['idUsuario'])) {
	ini_set('date.timezone', 'America/El_Salvador');
	$pdf = new PDF();
	$usuario = new Usuario();
	//$ruta = '../../resources/img/dashboard/usuarios/';
	$pdf->head('REPORTE DE USUARIOS');
	$pdf->date();
	$pdf->SetFont('Arial', 'B', '10');
	$pdf->SetFillColor(115, 168, 189);
	$pdf->SetTextColor(255, 255, 255);
	$pdf->SetTopMargin(20);
	$pdf->SetLeftMargin(15);
	$pdf->SetRightMargin(20);
	$pdf->Cell(20);

	$pdf->Cell(37, 10, utf8_decode('Nombre'), 1, 0, 'C', true);
	$pdf->Cell(37, 10, utf8_decode('Usuario'), 1, 0, 'C', true);
	$pdf->Cell(60, 10, utf8_decode('Correo'), 1, 0, 'C', true);
	//$pdf->Cell(37,10,utf8_decode('Foto'),1,0,'C',true);

	$pdf->LN(10);

	$data = $usuario->readUsuarios();
	foreach ($data as $prueba) {
		$pdf->SetFont('Arial', '', '10');
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->Cell(20);
		$pdf->Cell(37, 30, utf8_decode($prueba['nombre_usuario']), 1, 0, 'C', true);
		$pdf->Cell(37, 30, utf8_decode($prueba['usuario_usuario']), 1, 0, 'C', true);
		$pdf->Cell(60, 30, utf8_decode($prueba['correo_usuario']), 1, 0, 'C', true);
		//$pdf->Cell(37,30,$pdf->Image(($ruta.$prueba['foto_usuario']),$pdf->getX()+5, $pdf->getY()+3, 25),1,0,'C');
		$pdf->Ln();
	}
	$pdf->Output();
} else {
	header('location: ../../views/dashboard/');
}
