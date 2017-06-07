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
		<p><input type="submit" name="submit" class="submit" onClick="return check_login();" value="Log In" ></p>
	</form>


<?php
	}
?>

<script type="text/javascript">
	
function check_login() {
	if (login_from.name.value == "") {
		alert("name can not be null");
		login_from.name.focus();
		return false;
	}
	if (login_from.password.value == "") {
		alert("password can not be null");
		login_from.password.focus();
		return false;
	}
}

</script>



