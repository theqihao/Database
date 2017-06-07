<?php
	include "menu.php";
	setcookie('post_op','');
	setcookie('post_op','attendance_update');
	$id = $_COOKIE['id'];
	$year = $_COOKIE['year'];
	$_month = $_COOKIE['_month'];
?>

<form method="post" action="attendance.php">
	<input type="hidden" <?php echo "value=$id" ?> name="id">
	<input type="hidden" <?php echo "value=$year" ?> name="year">
	<input type="hidden" <?php echo "value=$_month" ?> name="_month">
	<table>
		<tr>
			<td>id</td>
			<td>
			<?php echo "$id" ?>
			</td>
		</tr>
		<tr>
			<td>year</td>
			<td>
			<?php echo "$year" ?>
			</td>
		</tr>
		<tr>
			<td>_month</td>
			<td>
			<?php echo "$_month" ?>
			</td>
		</tr>
		<tr>
			<td>rate</td>
			<td>
			<select name="rate">
				<option value="1.0" selected>1.0</option>
				<option value="0.9">0.9</option>
				<option value="0.8">0.8</option>
				<option value="0.7">0.7</option>
				<option value="0.6">0.6</option>
				<option value="0.5">0.5</option>
				<option value="0.4">0.4</option>
				<option value="0.3">0.3</option>
				<option value="0.2">0.2</option>
				<option value="0.1">0.1</option>
				<option value="0.0">0.0</option>
			</select>
			</td>
		</tr>	
	</table>
	<div align="left"><input class="submit" type="submit" name="submit" value="Update"/></div>
</form>