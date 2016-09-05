<?php 

	// echo "login.php".'<hr>';

	// $username = $_POST['username'];
	// $password = $_POST['password'];

	// echo "用户名:$username,密码:$password"."<hr>";

	$conn = connectDB();
	// echo "$conn";

	// if($conn && createDB($conn)){
	// 	echo "数据库创建成功";
	// 	$use = mysql_select_db("user_info_db",$conn);
	// 	var_dump($use);
	// 	$is = createTable($conn);
	// 	if ($is) {
	// 		# code...
	// 		echo "数据库表创建成功";
	// 	}else{
	// 		echo "表创建失败".mysql_error();
	// 	}
	// 	mysql_close($conn);
	// }else{
	// 	echo "数据库创建失败".mysql_error();
	// }

	

	function connectDB(){
		$conn = mysql_connect("localhost:3306","root","root");
		return $conn;
	}

	function createDB($conn){
		$isSuccess = mysql_query("CREATE DATABASE user_info_db",$conn);
		return $isSuccess;
	}

	function createTable($conn){
		$sqlStr = "create table persons (_id integer primary key auto_increment,name text,age integer,sex text,username text,password text);";
		return mysql_query($sqlStr,$conn);
	}











 ?>