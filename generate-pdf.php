<?php
require_once 'core/init.php';

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'PDF From mysql',0,1,'C');
	$this->Ln(10);
	//Ensure table header is output
	parent::Header();
}
}
$name = "as";



$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically
$pdf->Table('SELECT `id`, `name`,`email` from bookings where `name`="' . $name . '" order by `id`');
$pdf->AddPage();/*	
//Second table: specify 3 columns
$pdf->AddCol('id',40,'','C');
$pdf->AddCol('firstname',40,'sql_to_pdf','C');
$pdf->AddCol('lastname',40,'','C');
$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,210),
			'padding'=>2);
$pdf->Table('select firstname,  lastname, id from sql_to_pdf order by id limit 0,10',$prop);
*/
$pdf->Output("C:\Users\Ahmed El-Lithy\Desktop/somename.pdf",'F'); 


$pdf->Output($downloadfilename.".pdf"); 
header('Location: '.$downloadfilename.".pdf");
?>
