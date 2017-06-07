<?php
	include "menu_user.php";
?>

<?php
	if (isset($_COOKIE['id'])) {
		$id=$_COOKIE['id'];
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
		$sql = "select * from employee where id = '$id'";
		$retval = mysqli_query($conn, $sql);
		if (!$retval) {
			die('can not select data: ' . mysqli_error($conn));
		}
		echo "<link rel='stylesheet' type='text/css' href='index.css'/>";
		echo "<table id='employee_table'>";

		$row = mysqli_fetch_array($retval);
		echo "<tr>"."<td>id</td><td>{$row['id']}</td>"."</tr>".
			 "<tr>"."<td>name</td><td>{$row['name']}</td>"."</tr>".
			 "<tr>"."<td>sex</td><td>{$row['sex']}</td>"."</tr>".
			 "<tr>"."<td>position</td><td>{$row['position']}</td>"."</tr>".
			 "<tr>"."<td>department</td><td>{$row['department']}</td>"."</tr>".
			 "<tr>"."<td>pass</td><td>{$row['pass']}</td>"."</tr>";
		$position = $row['position'];
		$sql = "select * from wage where position='$position'";
		$retval = mysqli_query($conn, $sql);
		if (!$retval) {
			die('can not select data: ' . mysqli_error($conn));
			mysqli_close($conn);
			exit();
		}
		$row = mysqli_fetch_array($retval);
		$money = $row['money'];
		echo "<tr>"."<td>wage</td><td>{$row['money']}</td>"."</tr>";


		for ($year = 2017; $year >= 2015; $year--) {
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
				"<td>{$year} (annual bonus)</td>".
				"<td>{$ans}</td>".
				"</tr>";
		}



		echo "</table>";
		$sql = "select salary.id, salary.year, salary._month, salary.money, rate from salary, attendance where salary.id='$id' and salary.id=attendance.id and salary.year=attendance.year and salary._month=attendance._month";
		$retval = mysqli_query($conn, $sql);
		if (!$retval) {
			die('can not select data: ' . mysqli_error($conn));
		}
		echo "<link rel='stylesheet' type='text/css' href='index.css'/>";
		echo "<table>".
			"<tr>".
				"<th>id</th>".
				"<th>year</th>".
				"<th>month</th>".
				"<th>money</th>".
				"<th>rate</th>".
			"</tr>";
		while($row = mysqli_fetch_array($retval)) {
			echo "<tr>".
				"<td>{$row['id']}</td>".
				"<td>{$row['year']}</td>".
				"<td>{$row['_month']}</td>".
				"<td>{$row['money']}</td>".
				"<td>{$row['rate']}</td>".
			    "</tr>";
		}
		echo "</table>";


		$sql = "select * from allowance where id='$id'";
		$retval = mysqli_query($conn, $sql);
		if (!$retval) {
			die('can not select data: ' . mysqli_error($conn));
		}

		echo "<link rel='stylesheet' type='text/css' href='index.css'/>";
		echo "<table id='allowance_table'>".
			"<tr>".
				"<th>id</th>".
				"<th>year</th>".
				"<th>type</th>".
				"<th>days</th>".
				"<th>money</th>".
			"</tr>";
		while($row = mysqli_fetch_array($retval)) {
			echo "<tr>".
				"<td>{$row['id']}</td>".
				"<td>{$row['year']}</td>".
				"<td>{$row['type']}</td>".
				"<td>{$row['days']}</td>".
				"<td>{$row['money']}</td>".
			"</tr>";
		}
		echo "</table>";
		//$retval = mysqli_query($conn, $sql);
		//echo "<input type='button' value='test' onclick='fresh('http://172.17.0.1/admin.php')'></input>";
		mysqli_close($conn);
	}
?>
