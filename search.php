<?php
	include "menu.php";
?>

<form method="post" action="attendance.php">
	<select name="id">
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
			echo "<option value={$row['id']}>{$row['id']}</option>";
		}
		mysqli_close($conn);
	?>
	</select>
	<div align="left"><input style="background:#FFF; color:#0F0" class="submit" type="submit" name="submit" value="Submit"/></div>
</form>
<style type="text/css">
	.submit{ border:1px solid #F00; width:200px; height:50px; align-self: center;} 
</style>