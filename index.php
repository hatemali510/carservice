<?php
	require_once 'core/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<link rel="icon" href="images/favicon.png" type="image/x-icon">
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
 <!--    <link href="http://fonts.googleapis.com/css?family=Ubuntu:400|Titillium+Web:300" rel="stylesheet" type="text/css">
 -->    
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
								<li><a href="About.php">About<strong></strong></a>
								<li><a href="Services.php">Services<strong></strong></a></li>
								<?php
									$user =new user();
									if($user->isLoggedIn()){?>
								<li><a href="logout.php">logout<strong></strong></a></li>
								<li><a href="profile.php">profile<strong></strong></a></li>
									<?php
									}
									else{
									?>
									<li><a href="login.php">Log in<strong></strong></a></li>
									<li><a href="Registeration.php">Sign up<strong></strong></a></li>
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
	<!--========================================================
														CONTENT 
	=========================================================-->
	<section id="content">        

		<!-- start Camera -->
		<div class="camera_main_container  wow fadeIn animated" style="visibility: visible;">
			<div class="container11">
				<div class="slider_wrapper">
					<div class="camera_wrap" id="camera_wrap" style="display: block; margin-bottom: 20px; height: 542px;"><div class="camera_fakehover"><div class="camera_src camerastarted">
							<div data-src="images/slide1.jpg">
									
							</div>

							<div data-src="images/slide2.jpg">
									
							</div>

							<div data-src="images/slide3.jpg">
									
							</div>

					</div><div class="camera_target"><div class="cameraCont"><div class="cameraSlide cameraSlide_0" style="visibility: visible; display: none; z-index: 1;"><img src="images/slide1.jpg" class="imgLoaded" style="visibility: visible; height: 542px; margin-left: -0.571684587813593px; margin-top: 0px; position: absolute; width: 1350.14336917563px;" data-alignment="" data-portrait="" width="1390" height="558"><div class="camerarelative" style="width: 1349px; height: 542px;"></div></div><div class="cameraSlide cameraSlide_1" style="display: none; z-index: 1;"><img src="images/slide2.jpg" class="imgLoaded" data-alignment="" data-portrait="" width="1390" height="558" style="visibility: visible; height: 542px; margin-top: 0px; position: absolute; margin-left: -0.571684587813593px; width: 1350.14336917563px;"><div class="camerarelative" style="width: 1349px; height: 542px;"></div></div><div class="cameraSlide cameraSlide_2 cameracurrent" style="display: block; z-index: 999;"><img src="images/slide3.jpg" class="imgLoaded" data-alignment="" data-portrait="" width="1390" height="558" style="visibility: visible; height: 542px; margin-left: -0.571684587813593px; margin-top: 0px; position: absolute; width: 1350.14336917563px;"><div class="camerarelative" style="width: 1349px; height: 542px;"></div></div><div class="cameraSlide cameraSlide_3 cameranext" style="z-index: 1; display: none;"><div class="camerarelative" style="width: 1349px; height: 542px;"></div></div></div></div><div class="camera_overlayer"></div><div class="camera_target_content"><div class="cameraContents"><div class="cameraContent" style="display: none;"><div class="caption fadeIn" style="visibility: visible; opacity: 1;">
											<div class="caption_bg">
													<span class="slider_txt1">Complete<br>auto service</span>
											</div>
									</div></div><div class="cameraContent" style="display: none;"><div class="caption fadeIn" style="visibility: visible; opacity: 1;">
											<div class="caption_bg">
													<span class="slider_txt1">Quality car<br>maintenance</span>
											</div>
									</div></div><div class="cameraContent cameracurrent" style="display: block;"><div class="caption fadeIn" style="visibility: visible; opacity: 1;">
											<div class="caption_bg">
													<span class="slider_txt1">Fair friendly<br>service</span>
											</div>
									</div></div></div></div><div class="camera_bar" style="display: none; top: auto; height: 7px;"><span class="camera_bar_cont" style="opacity: 0.8; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px; background-color: rgb(34, 34, 34);"><span id="pie_0" style="opacity: 0.8; position: absolute; left: 0px; right: 0px; top: 2px; bottom: 2px; display: block; background-color: rgb(238, 238, 238);"></span></span></div><div class="camera_commands"><div class="camera_play" style="display: none;"></div><div class="camera_stop" style="display: block;"></div></div><div class="camera_prev"><span></span></div><div class="camera_next"><span></span></div></div><div class="camera_pag"><ul class="camera_pag_ul"><li class="pag_nav_0" style="position:relative; z-index:1002"><span><span>0</span></span></li><li class="pag_nav_1" style="position:relative; z-index:1002"><span><span>1</span></span></li><li class="pag_nav_2 cameracurrent" style="position:relative; z-index:1002"><span><span>2</span></span></li></ul></div><div class="camera_loader" style="display: none; visibility: visible;"></div></div>
			</div>
			</div>
		</div>
		
		<!-- end Camera -->


		<div class="box1">
			<div class="container">
				<div class="row">

					<div class="grid_3">
						<div class="banner1">
							<h3 class="h3_banner">complete services</h3>
							<i class="icon-cogs"></i>
							<p>Cubilipende sollicitudineed leo pharea aumennec in velit veaugun e diam lor innia est. Proin dictum elem velit Fterdpibus sceleue vitaepe.</p>
							<a href="#" class="more_btn">more</a>
							<span class="hover_plane"></span>
						</div>
					</div>

					<div class="grid_3">
						<div class="banner1">
							<h3 class="h3_banner">oil change</h3>
							<i class="icon-tint"></i>
							<p>Sollicitudineied leo pharetr in velit eaugun eratisque diam lor innia est. Proin dicm elemtum veitdpibu sceleue vita pedeecon era.</p>
							<a href="#" class="more_btn">more</a>
							<span class="hover_plane"></span>
						</div>
					</div>

					<div class="grid_3">
						<div class="banner1">
							<h3 class="h3_banner">ENGINE REPAIR</h3>
							<i class="icon-filter"></i>
							<p>Cubilipende sollicitudineied leo pharea aumennec in velit veaugun eraam lor innia est. Proin dictum elem velit Fterdpibus sceleue vitaepe.</p>
							<a href="#" class="more_btn">more</a>
							<span class="hover_plane"></span>
						</div>
					</div>

					<div class="grid_3">
						<div class="banner1">
							<h3 class="h3_banner">BRAKES</h3>
							<i class="icon-wrench"></i>
							<p>Sollicitudineied leo pharetr in velit eaugun eratisque diam lor innia est. Proin dicm elemtum veitdpibu sceleue vita pedeecon era.</p>
							<a href="#" class="more_btn">more</a>
							<span class="hover_plane"></span>
						</div>
					</div>

				</div>
			</div>
		</div>


		<div class="box2">
			<div class="container">
				<h2>Services</h2>
				<div class="row">

					<div class="grid_3">
						<div class="banner1">
							<h3 class="h3_banner2">Oil change</h3>
							<i><img src="images/page1_pic1.png" alt="" class="img1"></i>
							<p>Cubilipende sollicitudineed leo pharea aumennec in velit veaugun e diam lor innia est. Proin dictum elem velit Fterdpibus sceleue vitaepe.</p>
							<a href="#" class="more_btn">more</a>
							<span class="hover_plane"></span>
						</div>
					</div>
					<div class="grid_3">
						<div class="banner1">
							<h3 class="h3_banner2">Painting</h3>
							<i><img src="images/page1_pic2.png" alt="" class="img1"></i>
							<p>Cubilipende sollicitudineed leo pharea aumennec in velit veaugun e diam lor innia est. Proin dictum elem velit Fterdpibus sceleue vitaepe.</p>
							<a href="#" class="more_btn">more</a>
							<span class="hover_plane"></span>
						</div>
					</div>
					<div class="grid_3">
						<div class="banner1">
							<h3 class="h3_banner2">Tires</h3>
							<i><img src="images/page1_pic3.png" alt="" class="img1"></i>
							<p>Cubilipende sollicitudineed leo pharea aumennec in velit veaugun e diam lor innia est. Proin dictum elem velit Fterdpibus sceleue vitaepe.</p>
							<a href="#" class="more_btn">more</a>
							<span class="hover_plane"></span>
						</div>
					</div>
					<div class="grid_3">
						<div class="banner1">
							<h3 class="h3_banner2">Complete Service</h3>
							<i><img src="images/page1_pic4.jpg" alt="" class="img1"></i>
							<p>Cubilipende sollicitudineed leo pharea aumennec in velit veaugun e diam lor innia est. Proin dictum elem velit Fterdpibus sceleue vitaepe.</p>
							<a href="#" class="more_btn">more</a>
							<span class="hover_plane"></span>
						</div>
					</div>

					</div>

				</div>
			</div>
		</div>


		<div class="box3">
			<div class="container">
				<div class="row">

					<div class="grid_6">
						<h2>what we do</h2>
						<p>Proin dictum elemum velit terdpibus sceleue vitaepeecon eoc in vel ipsum auctorulvinaroin ullamcorper u et felisestiulis lacinia esroin dictum elemenelit. Fusce euismod consequat antrem ipsm door sit amet coectetuer adipiscing elit. Pellentesque sed dololiquam cong.</p>
						<div class="hline2"></div>
						<p>Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis. In pede mi aliquet sit amet euismod in auctor ut ligula. Aliquam dapibus tincidunt metus. Praesent justo dolor lobortis quis lobortis dignissim pulvinar ac lorem. Vestibulum sed ante.</p>
					</div>

					<div class="grid_6">
						<h2>why us?</h2>
						<p>Cubilipende sollicitudineied leo pharea aumennec in velit veaugn erase dialor innia est. Proin dictum elemum velit terdpibus sceleue vitaepeecon eoc in vel ipsum auctorulvinaroin ullamcorper u et felisestiulis lacinia est.</p>
						<div class="hline2 v2"></div>
						<p class="fz13 color1">Proin dictum elemum veliterdpibus sceleue vitaepeecon eonec in vel ipsum auctorulv inaroin ullamcorper u et felisestiulis lacinia eroin dictum elemenelit.</p>
						<div class="hline2 v3"></div>
						<p>Proin dictum elemenelit. Fusce euismod consequat antrem ipsm door sit amet con sectetuer adipiscing elit. Pellentesque sed dololiquam cong.</p>
					</div>

				</div>
			</div>
		</div>

		<div class="box4">
			<div class="container">
				<div class="row">

					<div class="grid_12">
						<p class="txt1">No better car service anywhere</p>
						<a href="calendar.php" class="more_btn btn1">Request Full Check</a>
						<i class="icon-calendar icon1"></i>
					</div>

				</div>
			</div>
		</div>
		
		




	</section>



	<!--========================================================
														FOOTER 
	=========================================================-->
	<?php
	include 'includes/footer.php';
	?>