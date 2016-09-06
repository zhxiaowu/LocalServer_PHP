<?php 

	function getGetValue($key){
		return getArrayValue($key,$_GET);
	}
	function getPostValue($key){
		return getArrayValue($key,$_POST);
	}

	function getArrayValue($key,$array){
		if (array_key_exists($key, $array)) {
			return $array[$key];
		}else{
			return "";
		}
	}

 ?>