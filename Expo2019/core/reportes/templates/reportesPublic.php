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

		function Header()
		{
			$this->Image('../../../resources/img/dashboard/img4.jpg', 16, 10, 30,30);
			$this->Cell(40,13);
			$this->SetFont('Courier','B',15);
			$this->SetTextColor(255,255,255);
			$this->SetFillColor(66,139,202);
			$this->Cell(125,13, utf8_decode($this->title),0,0,'C',true);
			$this->Ln(15);

		}

		function date()
		{
			$this->Ln(5);
			$this->SetFont('Courier','',10);
			$this->SetTextColor(0, 0, 0);
			$this->SetFillColor(255,255,255);
			$this->Cell(85,10, utf8_decode(date('G:i:s j/n/Y') ),0,0,'L',true);
			$this->Ln(5);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Courier','B', 10);
			$this->Cell(0,10, utf8_decode('Página ').$this->PageNo(),0,0,'C' );
		}		
	}
?>