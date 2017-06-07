<?php
	include "menu.php";
?>
<br/>
<form method="post" action="searchbymonth.php">
	<select name="year">
		<option value="2017" <?php if($_POST['year'] == 2017) echo "selected"; ?> >2017</option>
		<option value="2016" <?php if($_POST['year'] == 2016) echo "selected"; ?> >2016</option>
		<option value="2015" <?php if($_POST['year'] == 2015) echo "selected"; ?> >2015</option>
	</select>
	<select name="_month">
		<option value="1" <?php if($_POST['_month'] == 1) echo "selected"; ?> >1</option>
		<option value="2" <?php if($_POST['_month'] == 2) echo "selected"; ?> >2</option>
		<option value="3" <?php if($_POST['_month'] == 3) echo "selected"; ?> >3</option>
		<option value="4" <?php if($_POST['_month'] == 4) echo "selected"; ?> >4</option>
		<option value="5" <?php if($_POST['_month'] == 5) echo "selected"; ?> >5</option>
		<option value="6" <?php if($_POST['_month'] == 6) echo "selected"; ?> >6</option>
		<option value="7" <?php if($_POST['_month'] == 7) echo "selected"; ?> >7</option>
		<option value="8" <?php if($_POST['_month'] == 8) echo "selected"; ?> >8</option>
		<option value="9" <?php if($_POST['_month'] == 9) echo "selected"; ?> >9</option>
		<option value="10" <?php if($_POST['_month'] == 10) echo "selected"; ?> >10</option>
		<option value="11" <?php if($_POST['_month'] == 11) echo "selected"; ?> >11</option>
		<option value="12" <?php if($_POST['_month'] == 12) echo "selected"; ?> >12</option>
	</select>
	<input type="submit" name="submit" style="width:103px;height:35px;background-color:#00f000;"  value="search"/>
</form>

<?php
	if (isset($_POST['year']) && isset($_POST['_month'])) {
		$year=$_POST['year'];
		$_month=$_POST['_month'];
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
		$sql = "select * from salary where year = '$year' and _month = '$_month'";
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
		$retval = mysqli_query($conn, $sql);
		//echo "<input type='button' value='test' onclick='fresh('http://172.17.0.1/admin.php')'></input>";
		mysqli_close($conn);
	}
?>
