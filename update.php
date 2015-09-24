<?php
require_once 'core/init.php';
$user = new user();
$id;
if(input::exists()){
	if(token::check(input::get('token'))){
		$id=input::get('id');
		echo $id;
if (DB::getInstance()->update('users',$id,array(
														'Address' => input::get('Address')
			                                        )
						     )
   	)
{
	Redirect::to('admin.php');
}
else{
	echo "not updated";
}
}
}
?>
<?php
	$users=DB::getInstance()->get('users',array());
	if($users->count()){
		foreach ($users->results() as $user ) {
			$Address=$user->Address;
		}
	}


?>
<form id="contact-form" method="POST" action="" data-constraints='@PasswordsMatch(field1="password", field2="confirmationPassword")'> 
							<div class="contact-form-loader"></div>
							<fieldset>
								<label class="name">
									 <div class="field">
        <div class="field">
         <label for="name">* Address :</label>
         <input type="text" name="Address" id="input" id="Address"  autocomplete="off" value="<?php echo $Address; ?>" required> 
        </div>
        
        
          <input type="hidden" name="token" value="<?php echo token::generate(); ?>">
							</label>
								<div class="btns">
									<input type="submit" class="more_btn">
								</div>
							</fieldset> 
						</form>
						
