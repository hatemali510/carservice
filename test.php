<?php
require_once 'core/init.php';
$user=new user();
$slots_booked='';
$mess='';
if(input::get('slots_booked')){
	$slots_booked=input::get('slots_booked');
}
if(input::get('booking_date')){
	$booking_date=input::get('booking_date');
}
if(input::get('cost_per_slot')){
	$cost_per_slot=input::get('cost_per_slot');
}
$arr=array();
$count=0;
if(input::get('engine')){
	$engine=input::get('engine');
	$arr[$count]=$engine;
	$count++;

}
else{
	$engine='';
}
if(input::get('tires')){
	$tires=input::get('tires');
	$arr[$count]=$tires;
	$count++;
}
else{
	$tires='';
}
if(input::get('brake')){
	$brake=input::get('brake');
	$arr[$count]=$brake;
	$count++;
}
else{
	$brake='';
}
if(input::get('battery')){
	$battery=input::get('battery');
	$arr[$count]=$battery;
	$count++;
}
else{
	$battery='';
}


$id_make;
$car_make=DB::getInstance()->get('car_make',array('make','=',input::get('make')));
if($car_make->count()){
foreach ($car_make->results() as $one ) {
	$id_make=$one->id;
}
}
$id_model;
$cars_model=DB::getInstance()->get('car_model',array('model','=',input::get('modelSelect')));
if($cars_model->count()){
	foreach ($cars_model->results() as $model ) {
		$id_model=$model->id;
	}
}
$user_id=$user->data()->id;
$res=DB::getInstance()->get('reservation',array());
$res_id=$res->count();
$explode = explode('|', $slots_booked);
foreach($explode as $slot) {
	if($slot) {
		$reservations=DB::getInstance()->get('reservation',array('user_id','=',$user_id));
		if($reservations->count() && session::get('status')){
			foreach ($reservations->results() as $reservation ){
			DB::getInstance()->insert('reservation_history',array(
				'user_id'=>$user_id,
				'date'=>$reservation->date,
				'start'=>$reservation->start,
				'status'=>"Updated",
				'car_make_id'=>$reservation->car_make_id,
				'car_model_id'=>$reservation->car_model_id

				));
		}
			DB::getInstance()->update('reservation',$user_id,array(
				'date'=>$booking_date,
				'start'=>$slot
				));
			$mess="updated done";
		}
		 if(!$reservations->count()){
		DB::getInstance()->insert('reservation',array(
			'user_id'=>$user_id,
			'date'=>$booking_date,
			'start'=>$slot,
			'status'=>"waiting",
			'car_make_id'=>$id_make,
			'car_model_id'=>$id_model
			));
			$i=0;
			while ($i<$count){
				$m=DB::getInstance()->get('service',array('name','=',$arr[$i]));
				if($m->count()){
					foreach ($m->results() as $k ) {
						$arr[$i]=$k->id;
					}
				}
				$i++;
			}
			
			$ii=0;
			while($ii<$count){
				DB::getInstance()->insert('reservation_details',array(
					'reservation_id'=>$res_id,
					'service_id'=>$arr[$ii]
					));
				$ii++;
			}
			$mess="inserted done";
	}
	else{
		$mess="you have another appointment"."<br>"."wait to finich the other appointment";

	}

	}


	break;
	
}


if(empty($mess)){
	Redirect::to ('includes/errors/404.php');
} // Close foreach



?>

<?php include ('includes/header.php');?>

<div class="box3 v2">
			<div class="container">
				<div class="row">
					<div class="grid_7" style="visibility: visible;">
						<h2><?php if($mess){
							echo "confirmed";

						}?></h2>
						<?php print($mess);?>

</div>
</div>
</div>
</div>

<?php include ('includes/footer.php');?>
