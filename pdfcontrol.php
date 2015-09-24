<?php
require_once 'core/init.php';
$handle='';
$rs=array();
$user2=new user();
if(!$user2->isLoggedIn()){
	Redirect::to('index.php');

$table = $user->data()->user_type_id;
}
?>
	<!--========================================================
														HEADER 
	=========================================================-->
	<?php 
	include ('includes/header.php')
	?>
	
<div class="box3">
	<div class="container">


		<form action="pdf.php" method="post">
		  <input type="hidden" name="condition" value="0" />	
		 <?php
		 	switch($user->data()->user_type_id)
		 	{
		 		case 1://ist admin report
		 		echo "User_Reservation";
		 	?>	<input type="hidden" name="report" value="user_reservation" />
		 		<input type="hidden" name="userid" value= <?php echo $user->data()->id?> />

		 	<?php //1st report for user
		  		break;
		 		
		  		case 2:
		  		echo "Reservation_Report";
		 	?> 	<input type="hidden" name="report" value="reservation_report" /><?php
		  		break;	
		  		
		  		case 3:
		  		echo "leader_reservation";
		  		?>	<input type="hidden" name="report" value="leader_reservation" /><?php //1st report for teamleader
		  		break;

		 	}?>
		  <input type="submit" name="Report" value="Report 1" />
		</form>


</br>






		<form action="pdf.php" method="post">
		  <input type="hidden" name="condition" value="1" />	
		 <?php
		 	switch($user->data()->user_type_id)
		 	{
		 		case 1:
		 		echo "";
		 	?>	<input type="hidden" name="report" value="" /><?php //2nd report for user
		  		break;
		 		
		  		case 2:
		  		echo "Users_Report";
		 	?> 	<input type="hidden" name="report" value="users_report" /><?php
		  		break;	
		  		
		  		case 3:
		  		echo "";
		  		?>	<input type="hidden" name="report" value="" /><?php //2nd report for teamleader
		  		break;

		 	}?>
		  <input type="submit" name="Report" value="Report 2" />
		</form>





		<form action="pdfcontrol.php" method="post">
		 <input type="hidden" name="invoice" value="last" />
		  <input type="hidden" name="userid" value="4" />
		</form>
        
			</div>
	</div>	

<?php
	include 'includes/footer.php';

?>