<?php
	include "menu.php";
	setcookie('post_op','employee_insert');
	$_SESSION["post_op"] = "employee_insert";
?>
<form method="post" action="employee.php">
	<table>
		<tr>
			<td>id </td>
			<td><input type="text" name="id" /></td>
		</tr>
		<tr>
			<td>name</td>
			<td><input type="text" name="name" /></td>
		</tr>
		<tr>
			<td>sex</td>
			<td>
				<input type="radio" name="sex" value="man" checked>man
				<input type="radio" name="sex" value="woman">woman
			</td>
		</tr>
		<tr>
			<td>position</td>
			<td>
			<select name="position">
				<option value="Coder" selected>Coder</option>
				<option value="Designer">Designer</option>
				<option value="Head technical">Head of technical</option>
				<option value="Salesman">Salesman</option>
				<option value="Sales manager">Sales manager</option>
				<option value="Accounting">Accounting</option>
				<option value="Financial Controller">Financial Controller</option>
				<option value="Manager secretary">Manager secretary</option>
				<option value="General manager">General manager</option>
				<option value="Chairman">Chairman</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>department</td>
			<td>
			<select name="department">
				<option value="Technology" selected>Technology</option>
				<option value="Sales">Sales</option>
				<option value="Finance">Finance</option>
				<option value="Manager">Manager</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>password</td>
			<td><input type="text" name="pass" /></td>
		</tr>		
	</table>
	<div align="left"><input class="submit" type="submit" name="submit" value="Submit"/></div>
</form>


<?php
/*
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

	$id = $_POST['id'];
	$name = $_POST['name'];
	$sex = $_POST['sex'];
	$position = $_POST['position'];
	$department = $_POST['department'];
	$pass = $_POST['pass'];
	if ($id == "" || $name == "" || $pass == "") {
		echo "Can not be empty";
		exit();
	}

	$sql = "insert into employee values('$id','$name','$sex', '$position', '$department', '$pass')";
	$retval = mysqli_query($conn, $sql);
	if (!$retval) {
		die('can not insert data: ' . mysqli_error($conn));
	}
	mysqli_close($conn);
	*/
?>