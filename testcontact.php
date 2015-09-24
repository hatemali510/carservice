<?php
require_once 'core/init.php';

if (isset($_POST['submit']))
{
	$name = mysqli_real_escape_string($link, $_POST['name']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$phone = mysqli_real_escape_string($link, $_POST['phone']);
	$message = mysqli_real_escape_string($link, $_POST['message']);

	$query = "INSERT INTO contact_us (name, phone, email, message) VALUES ('$name', '$phone', '$email', '$message')"; 
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	Redirect::to('index.php');

}else{

	$name ="";
	$email = "";
	$phone = "";
	$message = "";

}

	
?>



	<?php 
	include ('includes/header.php')
	?>


	<!--========================================================
														CONTENT 
	=========================================================-->
	<section id="content">        

		<div class="box3 v2">
			<div class="container">
				<div class="row">

					<div class="grid_7" style="visibility: visible;">
						<h2>Contact Form</h2>

						<form id="contact-form" method="POST" action="testcontact.php">
							<div class="contact-form-loader"></div>
							<fieldset>
								<label class="name">
									Name:<input type="text" name="name" value="" data-constraints="@Required @JustLetters" id="regula-generated-327882">
									<span class="empty-message">*This field is required.</span>
									<span class="error-message">*This is not a valid name.</span>
								
								<label class="email">
									Email:<input type="text" name="email" value="" data-constraints="@Required @Email" id="regula-generated-870267">
									<span class="empty-message">*This field is required.</span>
									<span class="error-message">*This is not a valid email.</span>
								<label class="phone">
									Phone:<input type="text" name="phone" value="" data-constraints="@Required @JustNumbers" id="regula-generated-779140">
									<span class="empty-message">*This field is required.</span>
									<span class="error-message">*This is not a valid phone.</span>
								
								<label class="message">
									Message:<textarea name="message" data-constraints="@Required @Length(min=20,max=999999)" id="regula-generated-935793"></textarea>
									<span class="empty-message">*This field is required.</span>
									<span class="error-message">*The message is too short.</span>
								<div class="btns">
									<input type="reset" name="reset" value="reset" />
									<input type="submit" name="submit" value="Submit" />
								</div>
							</fieldset> 
							<div class="modal fade response-message">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">Modal title</h4>
										</div>
										<div class="modal-body">
											You message has been sent! We will be in touch soon.
										</div>      
									</div>
								</div>
							</div>
						<input type="hidden" name="stripHTML" value="true"></form>
						

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