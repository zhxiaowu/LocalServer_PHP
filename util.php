<?php 

	function getGetValue($key){
		return getArrayValue($_GET);
	}
	function getPostValue($key){
		return getArrayValue($_POST);
	}

	function getArrayValue($key,$array){
		if (array_key_exists($key, $array)) {
			return $array[$key];
		}else{
			return "";
		}
	}

 ?>