<?php
require_once 'core/init.php';
$handle='';
$rs=array();
$user2=new user();
if(!$user2->isLoggedIn()){
	Redirect::to('index.php');
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
		?> 
		Welcome, <?php echo $user2->data()->name,' "';
		?> 
		<?php echo $user2->data()->username,'"</br>';
		$res=DB::getInstance()->get('reservation',array('user_id','=', $user2->data()->id));
		if($res->count()){
		foreach($res->results() as $row){
		$re_id=$row->id;
		$user_id=$row->user_id;
		$datei=$row->date;
		$start=$row->start;
		$status=$row->status;
		$car_make_id=$row->car_make_id;
		$car_model_id=$row->car_model_id;
		$re_date1=$row->date;
		$re_date2=$row->date;
		$re_date2++;
		}
		echo  '<h1>your reservation Info is : </h5>','</br>';
		echo 'rservation id is : ',$re_id,'</br>';
		echo 'user id is : ',$user_id,'</br>';
		echo 'rservation date is : ',$datei,'</br>';
		echo 'rservation start at : ',$start,'</br>';
		echo 'rservation status is : ',$status,'</br>';
		echo 'rservation car make is : ',$car_make_id,'</br>';
		echo 'rservation car model is : ',$car_model_id,'</br>';
		session::put('re_id', $re_id);
		session::put('user_id', $user_id);
		session::put('datei', $datei);
		session::put('start', $start);
		session::put('status', $status);
		session::put('car_make_id', $car_make_id);
		session::put('car_model_id', $car_model_id);

			$re_date3=strtotime("+7 day",strtotime($re_date1));
			$re_date3 = date("Y-m-d",$re_date3);	
			//echo $re_date3,'</br>';	

		

		// $sql = "SELECT * FROM `reservation` WHERE `date` = \'2015-05-15\'";
		$res=DB::getInstance();
		// $query1=$res->get('reservation',array('start','=', $start));
		$query1=$res->get('reservation',array('date','=',$re_date3));
		$condition=false;
		foreach ($query1->results() as $row) {
			$s=$row->start;
			//echo $s,"</br>";
			if($row->start === $start){
				$condition=true;
				break;
			}

		}
			echo"<form method='post' action='resprocess.php'>";
		if($condition){
			echo "can't reserve the same day next week, somenoe got it before u ",'</br>';
		}else{
			echo "<input type='radio' name='op' value='1'>";
			echo 'u can reserve same day next week',' ',$re_date3,'</br>';
			session::put('datef', $re_date3);
			//DB::getInstance()->update('reservation',$re_id,array('date', $re_date1));
		}
		
		// $query1=$res->get('reservation',array('start','=', $start));
		$query2=$res->get('reservation',array('date','=',$re_date2));
		$condition=false;
		foreach ($query2->results() as $row) {
			$s=$row->start;
			if($row->start === $start){
				$condition=true;
				break;
			}

		}

		if($condition){
			echo"sorry u can't reserve tomorrow too ";
		}else{
			echo "
					<input type='radio' name='op' value='2'>
					u can resrve tomorrow at same time </br>";
			session::put('dates', $re_date2);
			//DB::getInstance()->update('reservation',$re_id,array('date', $re_date2));
		}
		echo"
		<input class='more_btn btn-1' type='submit' name='submit' value='submit'>
					</form>",'<br>','<br>';
					
					
					?>
					
					<?php
					echo "<a href='calendar.php'>reserve Manually</a>";

		}
		else{
			echo "you didn't reserved yet ";
			echo"<a href='calendar.php' class='more_btn' > reserve </a>";
		}
		
		 ?>
		
			</div>
	</div>	

<?php
	include 'includes/footer.php';
?>