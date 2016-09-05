<?php 

	function getUploadFile(){
		if(array_key_exists("file", $_FILES)){
			// echo __FILE__;
			$isFinished = move_uploaded_file($_FILES["file"]["tmp_name"], "/Users/Risky/WebServer/files/".$_FILES["file"]["name"]);
			if ($isFinished) {
				$json = array("successfull" => true,"path" => "http://".myip()."/files/".$_FILES["file"]["name"]);
				return $json;
			}else{
				$json = array("successfull" => false,"path" => null);
				return $json;
			}
		}else{
			$json = array("successfull" => false,"path" => null);
				return $json;
		}

	}

	// echo get_server_ip();
	// var_dump($_SERVER);
	// echo myip();

	/**
	* 获取本机无线局域网IP地址
	*/
	function myip(){
		$ifconfig="ifconfig en0 | grep 'inet.*netmask' | awk '{print $2}'";
		$lan_ip = shell_exec($ifconfig);
		$lan_ip = str_replace("\n", "", $lan_ip);
		// $ip = trim($ip);
		// $end = strpos($ip, " net");
		// $ip=substr($ip, 5 , $end - 5);
		// $publicip="$(echo $myip | awk '{print $6}')"
		return $lan_ip;
	}
 ?>