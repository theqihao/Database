<?php
	$name = $_POST['name'];
	$password = $_POST['password'];

	if ((!isset($name)) || (!isset($password))) {
?>
	<script language="JavaScript" src="./index.js"></script>
	<h1>Please Log in</h1>
	<form name="login_from" method="post", action="admin.php">
		<p>Username: <input type="text" name="name"></p>
		<p>Password: <input type="password" name="password"></p>
		<p><input type="submit" name="submit" onClick="return check_login();" value="Log In" ></p>
	</form>
<?php
	}
?>

