<?php
	require_once('../../../libraries/fpdf181/fpdf.php');
	
	
	class PDF extends FPDF
	{
		private $title;

		function head($title) {
			$this->title = $title;
			$this->AddPage();
			$this->AliasNbPages();
		}

		//e crea la función Header que sevirá para todos los reportes
		/*function Header()
		{
			
			$this->Image('../../../resources/img/dashboard/img4.jpg', 170, 15, 25, 25);
			$this->Cell(10,10,'',0,0,'C',false);
			$this->setTextColor(0,0,0);
			$this->setTitle('Expediente', true);
			//$this->Cell(100,40,'',utf8_decode('Fecha:'),0,-10,'C',false);

		}*/

		//Se crea la función date para todos los reportes
		function date()
		{
			$this->Image('../../../resources/img/dashboard/img4.jpg', 170, 15, 25, 25);
			$this->Cell(10,10,'',0,0,'C',false);
			$this->setTextColor(255,255,255);

			$this->Ln(-10);
			$this->SetFont('Courier','B',10);
			$this->SetTextColor(0, 0, 0);
			$this->SetFillColor(255,255,255);
			$this->Cell(22,10, utf8_decode('Fecha:'),'',0,'B',true);
			$this->Cell(5,10, utf8_decode(date('j/n/Y') ),0,0,'C',true);
			$this->Ln(10);
			$this->Cell(20,10, utf8_decode('Hora:'),'',0,'B',true);
			$this->Cell(5,10, utf8_decode(date('G:i:s') ),0,0,'C',true);
			$this->Ln(10);
			
		}
		
		//Se crea la función footer para todos los reportes
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Courier','B', 10);
			$this->Cell(0,10, utf8_decode('Página ').$this->PageNo(),0,0,'C' );
		}	
		
		function foot()
		{
			//$this->SetY(-20);
			$this->SetFont('Courier','B', 10);
			$this->Cell(0,10, utf8_decode('Direccion: Tonacatepeque'),0,0,'R' );
			$this->Ln(3.5);
			$this->Cell(0,10, utf8_decode('TEL: 2290-0987'),0,0,'R' );
			$this->Ln(3);
			$this->Cell(0,10, utf8_decode('clinica@outlook.com'),0,0,'R' );

		}
	}
?>