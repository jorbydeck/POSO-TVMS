<?php

class checkFields {
	
	public static function blank($str) {
		if(strlen($str) < 1) {
			return true;
		}else
			return false;
		}


	public static function _clean($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

}

?>