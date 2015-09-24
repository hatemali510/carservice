<?php
require_once 'core/init.php';
$handle='';
$rs=array();
$user2=new user();
$res=DB::getInstance();
if(!$user2->isLoggedIn()){
	Redirect::to('index.php');
}
if(input::exists()){
	$r=input::get('done');
	$max=sizeof($r);
	$staus='Done';
	for ($i=0; $i <$max; $i++) { 
		$res->update('reservation', $r[$i],array('status' => $staus));
	}
		}
$user3 = new user();
?>

	<!--========================================================
														HEADER 
	=========================================================-->
	<?php
include 'includes/header.php';
?>

<div class="box3">
	<div class="container">
<form action="" method="post">
   <table class="table table-bordered">
  <tr>
    <th>id</th>
    <th>date</th> 
    <th>start</th>
    <th>status</th>
    <th>done</th>
  </tr>
<?php
	$res->get('reservation',array());
		if($res->count()){
		foreach($res->results() as $row){
		echo '<tr>';
		echo '<td>'.$row->id.'</td>';
		echo '<td>'.$row->date.'</td>';
		echo '<td>'.$row->start.'</td>';
		echo '<td>'.$row->status.'</td>';
		echo "<td>";
		if($row->status=='waiting'){
		echo "<input type='checkbox' name='done[]' value=".$row->id.">";
	}
		echo "</td>";
		echo '</tr>';
	}
}
		?>
			</table>
                <input class="more_btn btn1" type="submit" value="update reservation status">
			</form>
			</div>
	</div>	

<?php
	include 'includes/footer.php';

?>

