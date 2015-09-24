<?php
require_once 'core/init.php';
$user=new user();
$slots_booked='';
$mess='';
$res_id='';
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

if(input::get('pay')){
	$pay=input::get('pay');
}
else{
	$pay='';
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
$explode = explode('|', $slots_booked);
foreach($explode as $slot) {
	if($slot) {
		$condition;
		$reservations=DB::getInstance()->get('reservation',array('user_id','=',$user_id));
		if($reservations->count()){
			foreach ($reservations->results() as $reservation_cond ) {
				$condition=$reservation_cond->status;
			}
		}
		if($reservations->count() && $condition=='waiting'){
			foreach ($reservations->results() as $reservation ){
			DB::getInstance()->insert('reservation_history',array(
				'user_id'=>$user_id,
				'date'=>$reservation->date,
				'start'=>$reservation->start,
				'status'=>'Updated',
				'car_make_id'=>$reservation->car_make_id,
				'car_model_id'=>$reservation->car_model_id,
				'pay_method'=>$reservation->pay_method
				));
			$res_u_id=$reservation->id;
		}
			DB::getInstance()->update('reservation',$res_u_id,array(
				'date'=>$booking_date,
				'start'=>$slot
				));
			Redirect::to('history.php');
		}
		 

		else{
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
			if(empty($arr)){
				$mess="you didn't chosse service ";
				break;
			}
			DB::getInstance()->insert('reservation',array(
			'user_id'=>$user_id,
			'date'=>$booking_date,
			'start'=>$slot,
			'status'=>"waiting",
			'car_make_id'=>$id_make,
			'car_model_id'=>$id_model,
			'pay_method'=>$pay
			));
		
		 	$reservations3=DB::getInstance()->get('reservation',array('user_id','=',$user_id));
			foreach ($reservations3->results() as $s ) {
		 			$res_id=$s->id;
		 		}
			$it=$res_id;
			$ii=0;
			while($ii<$count){
				DB::getInstance()->insert('reservation_details',array(
					'reservation_id'=>$it,
					'service_id'=>$arr[$ii]
					));
				$ii++;
			}
			$mess="inserted done";
	}
	

	
	
}
}
// Close foreach

if(empty($mess)){
	Redirect::to ('includes/errors/404.php');
} 



?>

<?php include ('includes/header.php');?>

<div class="box3 v2">
			<div class="container">
				<div class="row">
					<div class="grid_7" style="visibility: visible;">
						<h2><?php if($mess){
							echo "confirmed";

						}?></h2>
						<?php
						echo $res_id;
						?>

</div>
</div>
</div>
</div>

<?php include ('includes/footer.php');?>
