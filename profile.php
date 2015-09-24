<?php
require_once 'core/init.php';

$user2=new user();
if(!$user2->isLoggedIn()){
	Redirect::to('index.php');
		}
		switch ($user2->data()->user_type_id) {
		case 1:
			Redirect::to('userProfile.php');
			break;
		case 2:
			Redirect::to('admin.php');
			break;
		case 3:
			Redirect::to('teamLeaderProfile.php');
			break;	
		case 4:
			Redirect::to('admin.php');
			break;
		}
?>