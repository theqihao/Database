<?php
	include "menu.php";
?>
<?php
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
	$sql = "select id from employee";
	$retval = mysqli_query($conn, $sql);
	if (!$retval) {
		die('can not select data: ' . mysqli_error($conn));
	}

	echo "<link rel='stylesheet' type='text/css' href='index.css'/>";
	echo "<table id='allowance_table'>".
		"<tr>".
			"<th>id</th>".
			"<th>year</th>".
			"<th>money</th>".
		"</tr>";
	while($row = mysqli_fetch_array($retval)) {
		for ($year = 2017; $year >= 2015; $year--) {
			$id = $row['id'];
			$insql = "select sum(money) as annuals from allowance where id='$id' and year='$year'";
			$inretval = mysqli_query($conn, $insql);
			if (!$inretval) {
				die('can not select data: ' . mysqli_error($conn));
			}
			$annuals = mysqli_fetch_array($inretval);
			$annuals = $annuals['annuals'];
			$insql = "select sum(money) as months from salary where id='$id'  and year='$year'";
			$inretval = mysqli_query($conn, $insql);
			if (!$inretval) {
				die('can not select data: ' . mysqli_error($conn));
			}
			$months = mysqli_fetch_array($inretval);
			$months = $months['months'];
			if ($annuals == 0 && $months == 0) {
				continue;
			}
			$ans = ($months + $annuals) / 12;
			echo "<tr>".
				"<td>{$row['id']}</td>".
				"<td>{$year}</td>".
				"<td>{$ans}</td>".
				"</tr>";
		}

	}
	echo "</table>";
	mysqli_close($conn);
?>