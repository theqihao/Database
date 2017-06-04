
<?php
	include "menu.php";


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
	$sql = "select * from salary";
	$retval = mysqli_query($conn, $sql);
	if (!$retval) {
		die('can not select data: ' . mysqli_error($conn));
	}
	echo "<link rel='stylesheet' type='text/css' href='index.css'/>";
	echo "<table id='salary_table'>".
		"<tr>".
			"<th>id</th>".
			"<th>year</th>".
			"<th>month</th>".
			"<th>money</th>".
		"</tr>";
	while($row = mysqli_fetch_array($retval)) {
		echo "<tr>".
			"<td>{$row['id']}</td>".
			"<td>{$row['year']}</td>".
			"<td>{$row['_month']}</td>".
			"<td>{$row['money']}</td>".
		"</tr>";
	}
	echo "</table>";
	mysqli_close($conn);

?>