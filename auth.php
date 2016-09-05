<?php 
	
	include './upfile.php';

	// 获取POST请求的数据,[]里面是key

	// echo $_FILES["file"]["error"];

	
	$info  = getGetValue("info");
	$count = getGetValue("count");
	$page  = getGetValue("page");
	if ($info == "") {
		$info = "%E7%A6%8F%E5%88%A9";
	}
	if ($count == "") {
		$count = "20";
	}
	if ($page == "") {
		$page = "1";
	}

	# code...
	$username = getPostValue("username");
	$password = getPostValue("password");
	if ($username != "" && $password != "") {
		if ($username == "dla160504" && $password == "12345678") {
			$url = "http://gank.io/api/data/$info/$count/$page";
			$result= file_get_contents($url);
			$response = json_decode($result);
			// var_dump($response);
			$json = array("responseCode" => 1,"datas" => $response,"update" => getUploadFile());
			echo json_encode($json);
		}else{
			$array = array("responseCode" => 0,"datas" => array(array("type" => "验证失败,默认POST请求username=dla160504&password=12345678")),"update" => getUploadFile());
			echo json_encode($array);
		}
	}elseif (array_key_exists("file", $_FILES)) {
		$array = array("responseCode" => 0,"datas" => array(array("type" => "验证失败,默认POST请求username=dla160504&password=12345678")),"update" => getUploadFile());
			echo json_encode($array);
	}else{
		$array = array("responseCode" => 0,"datas" => array(array("type" => "验证失败,默认POST请求username=dla160504&password=12345678")),"update" => getUploadFile());
			echo json_encode($array);
	}

	

	function getPostValue($key){
		if (array_key_exists($key, $_POST)) {
			return $_POST[$key];
		}
		return "";
	}
	function getGetValue($key){
		if (array_key_exists($key, $_GET)) {
			return $_GET[$key];
		}
		return "";
	}
	
 ?>
