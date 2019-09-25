<?php
//los require necesario para que funcione
require_once("plantilla.php");

require_once("../helpers/database.php");
require_once("../helpers/validator.php");
require_once("../models/dashboard/doctores.php");

$doctor = new Doctores;
$result = array('status' => 0, 'message' => null, 'exception' => null);
if (isset($_SESSION['idUsuario']) && isset($_GET['requestID'])) {
	require_once('../api/dashboard/sesion.php');
	ini_set('date.timezone', 'America/El_Salvador');
	$pdf = new PDF('L', 'mm', 'Letter');
	//$doctor = new Doctores();
	$ruta = '../../resources/img/dashboard/doctores/';
	$pdf->head('REPORTE DE DOCTORES POR ESPECIALIDAD');
	$pdf->date();
	$pdf->SetFont('Arial', 'B', '10');
	$pdf->SetFillColor(115, 168, 189);
	$pdf->SetTextColor(255, 255, 255);
	$pdf->Cell(40);

	$pdf->Cell(37, 10, utf8_decode('Nombres'), 1, 0, 'C', true);
	$pdf->Cell(37, 10, utf8_decode('Apellidos'), 1, 0, 'C', true);
	$pdf->Cell(37, 10, utf8_decode('Especialidad'), 1, 0, 'C', true);
	$pdf->Cell(37, 10, utf8_decode('Fotografía'), 1, 0, 'C', true);

	$pdf->LN(10);

	$data = $doctor->doctoresEspecialidad($_GET['requestID']);
	foreach ($data as $doctor_info) {
		$pdf->SetFont('Arial', '', '10');
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->Cell(40);
		$pdf->Cell(37, 30, utf8_decode($doctor_info['nombre_doctor']), 1, 0, 'C', true);
		$pdf->Cell(37, 30, utf8_decode($doctor_info['apellido_doctor']), 1, 0, 'C', true);
		$pdf->Cell(37, 30, utf8_decode($doctor_info['nombre_especialidad']), 1, 0, 'C', true);
		$pdf->Cell(37, 30, $pdf->Image(($ruta . $doctor_info['foto_doctor']), $pdf->getX() + 5, $pdf->getY() + 3, 25), 1, 0, 'C');
		$pdf->Ln();
	}
	$pdf->Output();
} else {
	header('location: ../../views/dashboard/');
}
