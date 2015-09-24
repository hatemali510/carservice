<?php
session_start();
include('php/connect.php'); 


$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => 'mysql3.000webhost.com',
		'username' => 'a3429026_hatem',
		'password' => 'Hatem1571961@',
		'db' => 'a3429026_new'
		),
	'remember' => array(
		'cookie_name' =>'hash',
		'cookie_expiry' => 604800
		),
	'session' =>array(
		'session_name' => 'user',
		'token_name' => 'token'
		)

	);

/*spl_autoload_register(function($class){
	require_once 'classes/' . $class . '.php';
});*/
	require_once 'classes/class_calendar.php';
	require_once 'classes/config.php';
	require_once 'classes/DB.php';
	require_once 'classes/cookie.php';
	//require_once 'classes/Email.php';
	require_once 'classes/hash.php';
	require_once 'classes/input.php';
	require_once 'classes/redirect.php';
	require_once 'classes/session.php';
	require_once 'classes/token.php';
	require_once 'classes/user.php';
	require_once 'classes/validate.php';

require_once'functions/sanitize.php';


		$host ='mysql3.000webhost.com';
		$user = 'a3429026_hatem';
		$password = 'Koko1571961@';
		$db = 'a3429026_new';

mysql_connect($host,$user,$password);
mysql_select_db($db);

if(cookie::exists(config::get('remember/cookie_name')) && !session::exists(config::get('session/session_name'))){
	$hash = cookie::get(config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('user_session', array('hash', '=', $hash));

	if($hashCheck->count()){
		$user= new user($hashCheck->first()->user_id);
		$user->login();
	}
}
