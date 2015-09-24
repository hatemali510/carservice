<?php
require_once 'core/init.php';
if(DB::getInstance()->delete('users',array('id','=',$_GET['id']))){
	echo "done";
}
else{
	echo "not deleted";
	
}

