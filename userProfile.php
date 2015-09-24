<?php
require_once 'core/init.php';
$handle='';
$rs=array();
$user2=new user();
if(!$user2->isLoggedIn()){
	Redirect::to('index.php');
}
$user3 = new user();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<link rel="icon" href="images/favicon.png" type="image/x-icon">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="camera/style.css">
	<link rel="stylesheet" href="css/fontello.css">
	<link rel="stylesheet" href="css/animation.css">
	<link rel="stylesheet" href="css/fontello-codes.css">
	<link rel="stylesheet" href="css/fontello-embedded.css">
	<link rel="stylesheet" href="css/fontello-ie7.css">
	<link rel="stylesheet" href="css/fontello-ie7-codes.css">
	<link type="text/css" rel="Stylesheet" href="css/imageslidermaker.css" />
    <link href="http://fonts.googleapis.com/css?family=Ubuntu:400|Titillium+Web:300" rel="stylesheet" type="text/css">
    
</head>

<body>

	<!--========================================================
														HEADER 
	=========================================================-->
	<?php
include 'includes/header.php';
?>


<div class="box3">
	<div class="container">
   
<?php
		?>* id : <?php echo $user3->data()->id,'<br>';
		?> * name : <?php echo $user3->data()->name,'<br>';
		?> * username : <?php echo $user3->data()->username,'<br>';
		?> * mobile : <?php echo $user3->data()->Mobile,'<br>';
		?> * email : <?php echo $user3->data()->email,'<br>';
		?> * joined : <?php echo $user3->data()->joined,'<br>';
		?> * address : <?php echo $user3->data()->Address,'<br>';
		$reservation=DB::getInstance()->get('reservation',array('user_id','=',$user3->data()->id));
		if($reservation->count()){
			foreach ($reservation->results()as $res ) {
				echo "date : ",$res->date,'<br>';
				echo "start : ",$res->start,'<br>';
				echo "status : ",$res->status,'<br>';

			}
		}

		?>
                </div>
			<table style="border: none; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
               <tr> 
               	<?php
               		if($user2->data()->user_type_id==2 || $user2->data()->user_type_id==4){
               	?>
               <td><a class="more_btn btn1" href="pdfcontrol.php">reports</a></td>
               	<?php }
               	else{
               	?>               
                <td><a class="more_btn btn1" href="invoice_test.php">invoice</a></td>
                 <td><a class="more_btn btn1" href="reschedual.php">change my reservation</a></td>
                 <td><a class="more_btn btn1" href="uploadfile.php">update file</a></td>
<?php }?>
                </tr>
        </table>
			</div>

<?php
	include 'includes/footer.php';

?>

