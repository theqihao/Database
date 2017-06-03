<?php
/*
connect() {
	$host = 'localhost';
	$user = 'root';
	$pass = '0';
	$db = 'qihao';
	$result = new mysqli(host, user, pass, db);
	if (!$result) {
		//throw new Exception('Count not connect to database server');
		echo "connect failed";
		exit();
	} else {
		return $result;
	}
}*/



function db_connect() {
	$dbhost = 'localhost';  // mysql服务器主机地址
	$dbuser = 'root';            // mysql用户名
	$dbpass = '0';          // mysql用户名密码
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	if (!$conn) {
		echo '<h1>databases connect failed！<h1>';
		die('Could not connect: ' . mysqli_error());
		exit();
	}
	mysqli_select_db($conn, 'qihao');
	return $conn;
}



?>


