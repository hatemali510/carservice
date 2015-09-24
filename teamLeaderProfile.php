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

		?>
			</div>
			<table>
               <tr> 
               	<td><a class="more_btn btn1" href="handleResources.php">update reservation status</a></td>
                <td><a class="more_btn btn1" href="pdfcontrol.php">reports</a></td>
                <td><a class="more_btn btn1" href="product.php">request spare parts</a></td>
            </tr>
        </table>
	</div>	

<?php
	include 'includes/footer.php';

?>

