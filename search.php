<?php
	include "menu.php";
?>
<br/>
<form method="post" action="search.php">
	<select name="search_id">
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
		while($row = mysqli_fetch_array($retval)) {
			if (isset($_POST['search_id']) && $row['id'] == $_POST['search_id']) {
				//$id=$_POST['search_id'];
				echo "<option value={$row['id']} selected>{$row['id']}</option>";
			} else {
				echo "<option value={$row['id']}>{$row['id']}</option>";
			}
			
		}
		mysqli_close($conn);
	?>
	</select>
	<input type="submit" name="submit" style="width:103px;height:35px;background-color:#00f000;"  value="search"/>
</form>

<?php
	if (isset($_POST['search_id'])) {
		$id=$_POST['search_id'];
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
		/*
			"<tr>".
				"<th>id</th>".
				"<th>name</th>".
				"<th>sex</th>".
				"<th>position</th>".
				"<th>department</th>".
				"<th>password</th>".
			"</tr>";
		*/
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
		//echo "<tr>"."<td>wage</td><td>{$row['money']}</td>"."</tr>";
		echo "</table>";

		$money = $row['money'];
		$sql = "select * from salary where id='$id'";
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
				"<th>wage</th>".
				"<th>money</th>".
			"</tr>";
		while($row = mysqli_fetch_array($retval)) {
			echo "<tr>".
				"<td>{$row['id']}</td>".
				"<td>{$row['year']}</td>".
				"<td>{$row['_month']}</td>".
				"<td>{$money}</td>".
				"<td>{$row['money']}</td>".
			"</tr>";
		}
		echo "</table>";
		$retval = mysqli_query($conn, $sql);
		//echo "<input type='button' value='test' onclick='fresh('http://172.17.0.1/admin.php')'></input>";
		mysqli_close($conn);
	}
?>
