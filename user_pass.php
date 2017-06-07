<h1>Please input password</h1>
<form name="pass_from" method="post", action="user_pass.php">
	<p>Password: <input type="password" name="update_pass"></p>
	<p><input type="submit" name="submit" class="submit" onClick="return check_update();" value="update" ></p>
</form>

<?php

	if (isset($_POST['update_pass'])) {
		$id = $_COOKIE['id'];
		$update_pass = $_POST['update_pass'];
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
		$sql = "update employee set pass='$update_pass' where id='$id'";
		$retval = mysqli_query($conn, $sql);
		if (!$retval) {
			die('can not update data: ' . mysqli_error($conn));
		}
		mysqli_close($conn);
		$url = "http://172.17.0.1";
		echo "<script language='JavaScript'>";  
		echo "location.href='$url'";  
		echo "</script>"; 
	}

?>



<script type="text/javascript">
	
function check_update() {
	if (pass_from.update_pass.value == "") {
		alert("password can not be null");
		pass_from.update_pass.focus();
		return false;
	}
}

</script>



