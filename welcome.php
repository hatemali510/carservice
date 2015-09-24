<?php
	require_once 'core/init.php';
	include 'includes/header.php';
?>
<div class="box4">
			<div class="container">
				<div class="row">
					<h1>
						Hello <?php
						$user =new user();
							if($user->isLoggedIn()){
								echo $user->data()->name;
							}
						?>
					</h1>
					<div class="grid_12">
						<p class="txt1">No better car service anywhere</p>
						<a href="Services.php" class="more_btn btn1">Request an appointment</a>
						<i class="icon-calendar icon1"></i>
					</div>

				</div>
			</div>
		</div>
		
<?php
	include 'includes/footer.php';
?>