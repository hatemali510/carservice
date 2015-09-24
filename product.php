<?php
require_once 'core/init.php';
$handle='';
$rs=array();
$user2=new user();
$res=DB::getInstance();
if(!$user2->isLoggedIn() && $user2->data()->user_type=='3'){
	Redirect::to('index.php');
}

include 'includes/header.php';

echo"<div class='box3'>
		<div class='container'>";

if( input::get('q') && input::get('reservation') && input::get('product')){
	$product_id=input::get('product');
$reservation_id=input::get('reservation');
$quantity=input::get('q');
	$requa='';
	$name='';
	$mess='done';

	$res->get('product',array('id','=', $product_id));
	if($res->count()){
		foreach($res->results() as $row){
			$requa=$row->quantity;
			$name = $row->name;
		}
		$requa=$requa-$quantity;
		// $mess='loop product';
	}
	if($requa >= 10){
		$res->update('product',$product_id,array('quantity' => $requa));
	}
	else{
		$mess= "we're running out of".$name."contact our store to provide more......";
		// echo "choose product please.....";
	}
	$res->insert('requested_products',array(
			'product_id'=>$product_id,
			'reservation_id'=>$reservation_id,
			'quantity'=>$quantity
			));
}

else{
	$mess= "fill all fileds please........";
}	
echo $mess;
$res->get('product',array(0));
if($res->count()){
echo "<form method='post' action=''>
		<label>Products</label>
			<select name='product'>
				<option name='product' id='product' value='0'></option>";
foreach ($res->results() as $row) {
echo "<option name='product' id='product' value=".$row->id.">".$row->name."</option></br>";
	}
}
echo "</select> </br>";
$res->get('reservation',array(0));
if($res->count()){
echo "<form method='post' action=''>
		<label>Reservations</label>
			<select name='reservation'>
				<option name='reservation' id='reservation' value='0'></option>";
foreach ($res->results() as $row) {
echo "<option name='reservation' id='reservation' value=".$row->id.">".$row->id."</option></br>";
	}
echo "</select> </br>";
echo"<label>Quantity</label>
<input type='number' name='q' min='1' max='4' value='0'>
</br>
<input class='more_btn' type='submit' name='submit' value='Request'>
</form>
</div>
	</div>";

}
	include 'includes/footer.php';
?>