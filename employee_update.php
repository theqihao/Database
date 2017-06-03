<?php
	include "menu.php";
	setcookie('post_op','');
	setcookie('post_op','employee_update');
	$_SESSION['post_op'] = 'employee_update';
	$id = $_COOKIE["id"];
	$name = $_COOKIE["name"];
	$sex = $_COOKIE["sex"];
	$position = $_COOKIE["position"];
	$department = $_COOKIE["department"];
	$pass = $_COOKIE["pass"];
?>

<form method="post" action="employee.php">
	<input type="hidden" <?php echo "value='$id'" ?> name="old_id">
	<table>
		<tr>
			<td>id </td>
			<td><input type="text" name="id" <?php echo "value='$id'" ?> /></td>
		</tr>
		<tr>
			<td>name</td>
			<td><input type="text" name="name" <?php echo "value='$name'" ?> /></td>
		</tr>
		<tr>
			<td>sex</td>
			<td>
				<input type="radio" name="sex" value="man" <?php if ($sex == 'man') echo "checked"; ?> >man
				<input type="radio" name="sex" value="woman" <?php if ($sex == 'woman') echo "checked"; ?>  >woman
			</td>
		</tr>
		<tr>
			<td>position</td>
			<td>
			<select name="position">
				<option value="Coder" <?php if ($position == 'Coder') echo "selected"; ?> >Coder</option>
				<option value="Designer"  <?php if ($position == 'Designer') echo "selected"; ?> >Designer</option>
				<option value="Head technical" <?php if ($position == 'Head technical') echo "selected"; ?> >Head of technical</option>
				<option value="Salesman" <?php if ($position == 'Salesman') echo "selected"; ?> >Salesman</option>
				<option value="Sales manager" <?php if ($position == 'Sales manager') echo "selected"; ?> >Sales manager</option>
				<option value="Accounting" <?php if ($position == 'Accounting') echo "selected"; ?> >Accounting</option>
				<option value="Financial Controller" <?php if ($position == 'Financial Controller') echo "selected"; ?> >Financial Controller</option>
				<option value="Manager secretary" <?php if ($position == 'Manager secretary') echo "selected"; ?> >Manager secretary</option>
				<option value="General manager" <?php if ($position == 'General manager') echo "selected"; ?> >General manager</option>
				<option value="Chairman" <?php if ($position == 'Chairman') echo "selected"; ?> >Chairman</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>department</td>
			<td>
			<select name="department">
				<option value="Technology" <?php if ($department == 'Technology') echo "selected"; ?> >Technology</option>
				<option value="Sales" <?php if ($department == 'Sales') echo "selected"; ?> >Sales</option>
				<option value="Finance" <?php if ($department == 'Finance') echo "selected"; ?> >Finance</option>
				<option value="Manager" <?php if ($department == 'Manager') echo "selected"; ?> >Manager</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>password</td>
			<td><input type="text" name="pass" <?php echo "value='$pass'" ?> /></td>
		</tr>		
	</table>
	<div align="left"><input style="background:#FFF; color:#0F0" class="submit" type="submit" name="submit" value="Update"/></div>
</form>
<style type="text/css">
	.submit{ border:1px solid #F00; width:200px; height:50px; align-self: center;} 
</style>