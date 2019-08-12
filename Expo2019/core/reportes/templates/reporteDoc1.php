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

		//Se crea la función Header que sevirá para todos los reportes
		/*function Header()
		{
			
			$this->Image('../../../resources/img/private/fondo.jpg', 16, 10, 60);
			$this->Cell(65,13);
			$this->SetFont('Courier','B',15);
			$this->SetTextColor(255,255,255);
			$this->SetFillColor(29,185,84);
			$this->Cell(125,13, utf8_decode($this->title),0,0,'C',true);
			$this->Ln(15);

		}*/

		//Se crea la función date para todos los reportes
		function date()
		{
			$this->Ln(5);
			$this->SetFont('Courier','',10);
			$this->SetTextColor(0, 0, 0);
			$this->SetFillColor(255,255,255);
			$this->Cell(85,10, utf8_decode(date('G:i:s j/n/Y') ),0,0,'L',true);
			$this->Ln(5);
		}
		
		//Se crea la función footer para todos los reportes
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Courier','B', 10);
			$this->Cell(0,10, utf8_decode('Página ').$this->PageNo(),0,0,'C' );
		}		
	}
?>