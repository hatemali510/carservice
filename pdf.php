<?php
require('table.php');
$report =$_POST["report"];
$user_id =$_POST["userid"];
$condition=$_POST["condition"];
class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'Report',0,1,'C');
	$this->Ln(10);
	//Ensure table header is output
	parent::Header();
}
}
//Connect to database
mysql_connect('localhost','root','toor');
mysql_select_db('new');


$pdf=new PDF();
$pdf->AddPage();

//$pdf->Table('SELECT `id`, `firstname`,`lastname` from sql_to_pdf where `lastname`="' . $name . '" order by `id`');

if($condition == '0')
{
	switch($report)
	{
		case 'reservation_report':


			$pdf->AddCol('id',35,'Reservation_No','C');
			$pdf->AddCol('username',35,'Username','C');
			$pdf->AddCol('date',35,'Date','C');
			$pdf->AddCol('start',35,'Time','C');
			$pdf->AddCol('name',45,'Service','C');
			$pdf->AddCol('price',20,'Price','C');
		
			$pdf->Table('SELECT res.id , u.username , date , start  , s.name, price FROM 
							new.reservation as res  INNER JOIN users as u
							ON res.user_id=u.id
							inner join reservation_details as resd 
							on
							res.id =  resd.reservation_id
							inner join service as s
							on 
							s.id = resd.service_id');
		break;
		case 'user_reservation'://lsa m7tag ab3t el user id

			$pdf->AddCol('id',35,'Reservation_No','C');
			$pdf->AddCol('date',25,'Date','C');
			$pdf->AddCol('start',25,'Time','C');
			$pdf->AddCol('car_model_id',35,'Car_Model','C');
			$pdf->AddCol('name',40,'Service','C');
			$pdf->AddCol('price',15,'Price','C');
			$pdf->AddCol('status',20,'Status','C');


				$pdf->Table('SELECT res.id, date, start, car_model_id , s.name, price,status FROM new.reservation as
				 res INNER JOIN users as u
								ON u.id= res.user_id
								inner join reservation_details as resd
								on res.id = resd.reservation_id
								inner join service as s
								on s.id = resd.service_id 
								where u.id ="'.$user_id.'"');
		break;
		case 'leader_reservation'://1st team leader

			$pdf->AddCol('id',35,'Reservation_No','C');
			$pdf->AddCol('date',25,'Date','C');
			$pdf->AddCol('id',25,'Service_id','C');
			$pdf->AddCol('name',40,'Service','C');


				$pdf->Table('SELECT res.id , date, s.id, s.name
								FROM reservation as res
								inner join reservation_details as resd
								on  res.id = resd.reservation_id
								inner join service as s
								on s.id = resd.service_id
								WHERE DATE(res.date) = CURDATE()');
		break;


	}
} 
if($condition == '1')
{
	switch($report)
	{
		case 'users_report':

			$pdf->AddCol('id',35,'User_No','C');
			$pdf->AddCol('username',35,'Username','C');
			$pdf->AddCol('Mobile',35,'Mobile','C');
			$pdf->AddCol('name',35,'Member','C');
		
				$pdf->Table('SELECT user.id, username , Mobile,utype.name 
						FROM new.users as user inner join user_type as utype
						on utype.id =  user.user_type_id order by user.id');

		break;
	}
}












/*'SELECT 'id_res', 'username', 'date', 'start', 'name_service', 'price' FROM new.reservation as res INNER JOIN users as u

ON res.user_id=u.id
Inner join service as s
on
res.service_id= s.id_service'*/





//First table: put all columns automatically
//$pdf->Table('SELECT `id`, `firstname`,`lastname` from sql_to_pdf where `lastname`="' . $name . '" order by `id`');
/*$pdf->AddPage();	
//Second table: specify 3 columns
$pdf->AddCol('id',40,'','C');
$pdf->AddCol('firstname',40,'sql_to_pdf','C');
$pdf->AddCol('lastname',40,'','C');
$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,210),
			'padding'=>2);
$pdf->Table('select firstname,  lastname, id from sql_to_pdf order by id limit 0,10',$prop);*/

//$pdf->Output("C:\Users\John\Desktop/somename.pdf",'F'); 

$downloadfilename = $report;

$pdf->Output($downloadfilename.".pdf"); 
header('Location: '.$downloadfilename.".pdf");
?>