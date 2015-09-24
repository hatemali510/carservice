<?php
require_once 'core/init.php';
$handle='';
$rs=array();
$user2=new user();
if($user2->isLoggedIn()){
	Redirect::to('index.php');
}
if(input::exists()){
 if(token::check(input::get('token'))){

 	$validate=new Validate();
 	$validation=$validate->check($_POST, array(
 		'Name' => array('required' => true),
 		'password' => array('required' => true)
 	));
 	if($validation->passed()){
 		$user = new user();

 		$remember = (input::get('remember') === 'on') ? true : false;
 		$login= $user->login(input::get('Name'), input::get('password'), $remember);

 		if($login){
 			Redirect::to('welcome.php');
 		} else {
 			$handle="<p>Sorry, logging in failed.</p>"." <br>"." You can Register :";
 		}
 	} else{
 		$i=0;
 		foreach($validation->errors() as $error){
 			$rs[$i]=$error;
 			$i++;
 		}

 	}

 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />

	<link rel="icon" href="images/favicon.png" type="image/x-icon">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="camera/style.css">
	<link rel="stylesheet" href="css/fontello.css">
	<link rel="stylesheet" href="css/animation.css">
	<link rel="stylesheet" href="css/fontello-codes.css">
	<link rel="stylesheet" href="css/fontello-embedded.css">
	<link rel="stylesheet" href="css/fontello-ie7.css">
	<link rel="stylesheet" href="css/fontello-ie7-codes.css">
	<link type="text/css" rel="Stylesheet" href="css/imageslidermaker.css" />
    <link href="http://fonts.googleapis.com/css?family=Ubuntu:400|Titillium+Web:300" rel="stylesheet" type="text/css">
    
</head>

<body>

	<!--========================================================
														HEADER 
	=========================================================-->
	<header id="header">
		<div id="stuck_container">
			<div class="container">
				<div class="row">
					<div class="grid_4">
						<h1><a href="index.php"><img src="images/logo.png" alt="logo"></a> </h1>
					</div>
					<div class="grid_8">
						<nav>
							<ul class="sf-menu">
								<li class="current"><a href="index.php">Home<strong></strong></a></li>
								<li><a href="About.html">About<strong></strong></a>
								<li><a href="Services.html">Services<strong></strong></a></li>
								<?php
						$user =new user();
							if($user->isLoggedIn()){
								?>
								<li><a href="logout.php">logout<strong></strong></a></li>
								<li><a href="userProfile.php">profile<strong></strong></a></li>
								<?php
							}
							if(!$user->isLoggedIn()){
								?>
								<li><a href="Registeration.php">SignUp<strong></strong></a></li><?php
							}

							
						?>
								<li id="last-li"><a href="Contacts.html">Contacts<strong></strong></a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>

<div class="box3">
	<div class="container">
   
		<form class="reg_form" action="" method="post">
    		
    		<label for ="Name"></label>
			<input type="text" class="inpue-larg" name="Name" id="Name" autocomplete="off" placeholder="Name...">

    		
    		<label for ="password" class="inpue-medium"></label>
			<input type="password" class="inpue-medium" name="password" id="password" autocomplete="off" placeholder="Password...">
			<br/>

			<label for ="remember" class="checkbox">Remember me
			<input type="checkbox" name="remember" id="remember">
			</label>

			<br/>

			<input type="hidden" name="token" value="<?php echo token::generate(); ?>">
            <button class="btn btn-info" type="submit" value="log in">Log In</button>
            <br>
            <br>
            <?php
                  if($handle){
                  echo $handle;
                  ?><a href="Registeration.php">   Register</a><?php
                  } 
                  ?>
                  <?php
									 	foreach ($rs as $r) {
									 		echo $r,'<br>';
									 	}
									 	?>
		</form>
        
			</div>
	</div>	

<?php
	include 'includes/footer.php';

?>

