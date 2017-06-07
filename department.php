
<?php
	include "menu.php";
?>
<br/>
<form method="post" action="department.php">
	<select name="search_department">
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
		$sql = "select distinct department from employee";
		$retval = mysqli_query($conn, $sql);
		if (!$retval) {
			die('can not select data: ' . mysqli_error($conn));
		}
		while($row = mysqli_fetch_array($retval)) {
			if (isset($_POST['search_department']) && $row['department'] == $_POST['search_department']) {
				echo "<option value={$row['department']} selected>{$row['department']}</option>";
			} else {
				echo "<option value={$row['department']}>{$row['department']}</option>";
			}
		}
		mysqli_close($conn);
	?>
	</select>
	<input type="submit" name="submit" value="search"/>
</form>

<?php 
	if (isset($_POST['search_department'])) {
		$department=$_POST['search_department'];
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
		$sql = "select id from employee where department = '$department'";
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
			"</tr>";
			
		while ($row = mysqli_fetch_array($retval)) {
			
			$id = $row['id'];
			//echo "$id";
			mysqli_select_db($conn, 'qihao');
			$sql2 = "select * from salary where id='$id'";
			//echo "$sql2";
			$retval2 = mysqli_query($conn, $sql2);
			if (!$retval2) {
				die('can not select data: ' . mysqli_error($conn));
				echo "failed";
			}
			
			while ($row2 = mysqli_fetch_array($retval2)) {
				echo "<tr>".
					"<td>{$row2['id']}</td>".
					"<td>{$row2['year']}</td>".
					"<td>{$row2['_month']}</td>".
					"<td>{$row2['money']}</td>".
					"</tr>";
					//echo "qihao";
			}
			
		}
		
		echo "</table>";
		mysqli_close($conn);
	} 
?>
