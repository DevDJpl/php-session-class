<?php

class Session {
	public static function get($name){
		return $_SESSION[$name];
	}
	public static function getAll($name){
		if(is_array($_SESSION[$name])){
			return $_SESSION[$name];
		}
	}
	public static function put($name, $value){
		return $_SESSION[$name] = $value;
	}
	public static function exists($name){
		return (isset($_SESSION[$name])) ? true : false;
	}
	public static function forget($name){
		if(self::exists($name)){
			unset($_SESSION[$name]);
		}
	}
	public static function append($name, $value){
		if(self::exists($name)){
			return array_push($_SESSION[$name], $value);
		}else{
			return $_SESSION[$name] = [$value];
		}
	}
	public static function removeValue($name, $value){
		if(is_array($_SESSION[$name])){
			if(in_array($value, $_SESSION[$name])){
				$key = array_search($value, $_SESSION[$name]);
				unset($_SESSION[$name][$key]);
			}
		}
	}
	public static function flash($name, $string = ''){
		if(self::exists($name)){
			$session = self::get($name);
			self::forget($name);
			return $session;
		}else{
			self::put($name, $string);
		}
	}
}

?>
