<?php
require_once 'core/init.php';
$handle='';
$rs=array();
$user2=new user();
if(!$user2->isLoggedIn()){
	Redirect::to('index.php');
}
if(input::exists()){

$opt= input::get('op');
echo $opt;
switch ($opt) {
	case 1:
		echo "awel option";
		$id=session::get('re_id');
		$date=session::get('datef');
		echo $id,$date;
		$resu=DB::getInstance()->update('reservation', $id,array('date' => $date));
		break;
	case 2:
		echo "tany option";
		$id=session::get('re_id');
		$date=session::get('dates');
		echo $id,$date;
		$resu=DB::getInstance()->update('reservation', $id,array('date' => $date));
		break;
	case 3:
		Redirect::to('calendar.php');
		break;
	default:
		break;
	}
}
?>
	<!--========================================================
														HEADER 
	=========================================================-->
<?php
include 'includes/header.php';
?>


<div class="box3">
	<div class="container">
   
<?php
	$resu=DB::getInstance()->get('reservation_details',array('reservation_id','=', session::get('re_id')));
		if($resu->count()){
		foreach($resu->results() as $row){
			$service_id = $row->service_id;
		}
	}
		?> 
		Welcome, <?php echo $user2->data()->name,' "';
		?> 
		<?php echo $user2->data()->username,'"</br>','Reschedualing Done successfully ^^ </br>'
		?>
		<?php
			$id=session::get('re_id');
			echo "reservation id = ",$id,'<br>';
			$user_id=session::get('user_id');
			echo "user id = ",$user_id,'<br>';
			$date=session::get('datei');
			$date--;
			$start=session::get('start');
			$status=session::get('status');
			echo "status : ",$status,'<br>';
			$car_make_id=session::get('car_make_id');
			$car_model_id=session::get('car_model_id');
			$fields=array(
				'user_id'=>$user_id,
				'date'=>$date,
				'start'=>$start,
				'status'=>$status,
				'car_make_id'=>$car_make_id,
				'car_model_id'=>$car_model_id
				);
			$resu=DB::getInstance()->insert('reservation_history', $fields);
					echo "<a class='more_btn btn-1' href='userProfile.php'>Go back</a>";

		?>
		
			</div>
	</div>	

<?php
	include 'includes/footer.php';
?>