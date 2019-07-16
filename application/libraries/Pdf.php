<?php
require_once('TCPDF/examples/tcpdf_include.php');
require_once dirname(__FILE__).'/TCPDF/tcpdf.php';
class Pdf extends TCPDF
{
	function __construct()
	{
		parent::__construct();
	}
}

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'header-logo.png';
        $this->Image($image_file, 70, 10, 80, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetX(94);
        $this->SetFont('Times', 'i', 10);
        // Title
        $title = 'Solution For Next Generation';
        $this->Cell(0, 25, $title, 0, false, 'M', 0, '', 0, true, 'T', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-18);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0,10,' ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->SetY(-15);
        $this->Cell(0, 10, 'HEAD OFFICE - 305,Sunshine Complex, Nr. Sudama Chowk, Opp. CNG Pump, Mota Varachha, Surat-394101', 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->SetY(-10);
        $this->Cell(0,10,'Tel. : +9190333 30404 Email: info@dnktechnologies.com', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

?>