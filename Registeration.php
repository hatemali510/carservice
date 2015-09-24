<?php 
require_once 'core/init.php';
include 'includes/header.php';

$rs=array();
$user = new user();
if(input::exists()){
	if(token::check(input::get('token'))){

	$Validate=new validate();
	$validation=$Validate->check($_POST, array(
		'username' => array(
			'required'=>true,
			'min'=> 2,
			'max' => 20,
			'unique' => 'users'
		),
		'password' => array(
			'required'=>true,
			'min' => 6
		),
		'password_again' => array(
			'required' => true,
			'matches' => 'password'
		),
		'Address' => array(
			'required'=>true,
			'min'=>5,
			'max'=>50
			)
		));

	if($validation->passed()){
		$user= new user();
		$salt=Hash::salt(32);
		try{
			$user->create(array(
				'username' => input::get('username'),
				'password' => Hash::make(input::get('password'),$salt),
				'name' => input::get('name'),
				'salt'=>$salt,
                'email' => input::get('email'),
				'Address' => input::get('Address'),
				'Mobile' => input::get('Mobile'),
				'joined' => date('Y-m-d H:i:s'),
				'user_type_id' => 1
			));
			$user->login(input::get('username'), input::get('password'));
			Redirect::to('index.php');

		} catch(Exception $e){
			die($e->getMessage());
		}
	} else {
		$i=0;
		foreach($validation->errors() as $error){
			$rs[$i]=$error;
			$i++;
		}

	}

}}

    

?>
<div class="box3 v2">
			<div class="container">
				<div class="row">
					<div class="grid_7" style="visibility: visible;">
						<h2>Registeration Form</h2>

						<form id="contact-form" method="POST" action="" data-constraints='@PasswordsMatch(field1="password", field2="confirmationPassword")'> 
							<div class="contact-form-loader"></div>
							<fieldset>
								<label class="name">
									 <div class="field">
									 	<?php
									 	foreach ($rs as $r) {
									 		echo $r,'<br>';
									 	}
									 	?>
	       <label for="username">* Username</label>
	       <input type="text" name="username"  id="username" value="<?php echo escape(input::get('username')); ?>" autocomplete="off" required>	
        </div>
        <div class="field">
          <label for="password">* Enter your password</label>
          <input type ="password" name="password"  id="password" required>
        </div>
        <div class="field">
          <label for="password_again">* Confirm Password</label>
          <input type ="password" name="password_again"  id="input" id="password_again" required>
        </div>
        <div class="field">
         <label for="name">* Name</label>
         <input type="text" name="name" id="input" id="name" value="<?php echo escape(input::get('name')); ?>" autocomplete="off" required> 
        </div>
        <div class="field">
           <label for="email">* E-mail</label>
          <input type ="text" name="email" id="input" value="<?php echo escape(input::get('email')); ?>" id="email" required>
        </div>
        <div class="field">
           <label for="name">* Address</label>
          <input type ="text" name="Address" id="input" value="<?php echo escape(input::get('Address')); ?>" id="Address" required>
        </div>
        <div class="field">
           <label for="name">* Mobile</label>
          <input type ="text" name="Mobile" id="input" value="<?php echo escape(input::get('Mobile')); ?>" id="Mobile" required>
        </div>
        
          <input type="hidden" name="token" value="<?php echo token::generate(); ?>">
							</label>
								<div class="btns">
									<input type="submit" class="more_btn">
								</div>
							</fieldset> 
						</form>
						

					</div>

				

				</div>
			</div>
		</div>




<?php
	include 'includes/footer.php';
?>