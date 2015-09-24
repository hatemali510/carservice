<?php require_once ('core/init.php');
			$count=session::put('Count');
			$arr=session::put('arr');
			$res_id=session::put('res');
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
			print_r($arr);
			
			$ii=0;
			/*while($ii<$count){
				DB::getInstance()->insert('reservation_details',array(
					'reservation_id'=>$res_id,
					'service_id'=>$arr[$ii]
					));
				$ii++;
			}*/

?>