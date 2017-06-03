<?php
	/*
	if (!(($_POST['name'] == "qihao") && (md5($_POST['password']) == "cfcd208495d565ef66e7dff9f98764da"))) {
		echo "<h1> username or password error </h1>";
		echo "<a href='http://172.17.0.1/'>Please log in again!</a>";
		exit();
	} else {
		echo "<h1> YES </h1>";
		echo $_POST['name'];
	}
*/

	$dbhost = 'localhost';  // mysql服务器主机地址
	$dbuser = 'root';            // mysql用户名
	$dbpass = '0';          // mysql用户名密码
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	if(!$conn) {
		echo '<h1>databases connect failed！<h1>';
		die('Could not connect: ' . mysqli_error());
		exit();
	}
	mysqli_select_db($conn, 'qihao');
	mysqli_close($conn);
	include "menu.php";
?>


