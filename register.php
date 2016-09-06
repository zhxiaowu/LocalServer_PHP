<?php 

	include "./util.php";

	const KEY_USERNAME = "username";
	const KEY_PASSWORD = "password";
	const LOCALHOST = "localhost:3306";
	const MYSQL_USER = "root";
	const MYSQL_PWD  = "root";
	// $key_username = "username";
	// $key_password = "password";

	// $localhost = "localhost:3306";
	// $mysql_user = "root";
	// $mysql_passwd = "root";

	$username = getGetValue(KEY_USERNAME);
	$password = getGetValue(KEY_PASSWORD);
	echo "$username and $password <hr>";

	$con = connect_mysql();
	if (!$con){
  		die('Could not connect: ' . mysql_error());
  	}

  	$is_select = mysql_select_db("test",$con);
  	if (!$is_select) {
  		# code...
  		die("is not selected " . mysql_error());
  	}


  	$is_exists = is_exists($username,$con);
  	if (!$is_exists) {
  		# code...
  		die("is not exists " . mysql_error());
  	}

  	while($row = mysql_fetch_array($is_exists)){
  		echo $row['username'] . " " . $row['nick_name'];
  		echo "<br />";
  	}

  	mysql_close($con);


	function connect_mysql(){
		return mysql_connect(LOCALHOST,MYSQL_USER,MYSQL_PWD);
	}

	function is_exists($username,$conn){
		$sql = "select * from user_info where username = '$username';";
		// $sql = "show databases;";
		return mysql_query($sql,$conn);
	}











 ?>