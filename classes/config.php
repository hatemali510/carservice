<?php
class config{
	public static function get($path=null){
		if($path){
			$config = $GLOBALS['config'];
			$path = explode('/', $path);
			//explode($value,$string);
			// breaks a string into an array.
			foreach ($path as $bit) {
				if(isset($config[$bit])){
					$config=$config[$bit];
				}
			}
		return $config;
		}
		return false;
	}
}