<?php
	require_once 'core/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cars</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<link rel="icon" href="images/favicon.png" type="image/x-icon">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="camera/style.css">
	<link rel="stylesheet" href="css/contact-form.css">
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
								<li ><a href="index.php">Home<strong></strong></a></li>
								<li ><a href="About.php">About<strong></strong></a>
								<li><a href="Services.php">Services<strong></strong></a></li>
								<?php
						$user =new user();
							if(!$user->isLoggedIn()){
								?>
								<li><a href="login.php">Log in<strong></strong></a></li>
								<li><a href="Registeration.php">Sign up<strong></strong></a></li>
								<?php
								
							}
							else{?>
								<li><a href="profile.php">profile<strong></strong></a></li>
								<li><a href="logout.php">logout<strong></strong></a></li>
								<?php
							}

						?>
								<li id="last-li"><a href="Contacts.php">Contacts<strong></strong></a></li>

							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>