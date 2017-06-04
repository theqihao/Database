<?php
	include "menu.php";
	setcookie('post_op','');
	setcookie('post_op','allowance_update');
	$id = $_COOKIE['id'];
	$year = $_COOKIE['year'];
	$type = $_COOKIE['type'];
	$days = $_COOKIE['days'];
?>

<form method="post" action="allowance.php">
	<input type="hidden" <?php echo "value=$id" ?> name="id">
	<input type="hidden" <?php echo "value=$year" ?> name="year">
	<input type="hidden" <?php echo "value=$type" ?> name="type">
	<input type="hidden" <?php echo "value=$days" ?> name="old_days">
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
			<td>type</td>
			<td>
			<?php echo "$type" ?>
			</td>
		</tr>
		<tr>
			<td>days</td>
			<td>
			<input type="number" name="days" min="1" max="50" />
			</td>
		</tr>
		<tr>
			<td>money</td>
			<td>
			<select name="money">
				<option value="100" selected>100</option>
				<option value="200">200</option>
				<option value="300">300</option>
				<option value="400">400</option>
				<option value="500">500</option>
				<option value="600">600</option>
				<option value="700">700</option>
				<option value="800">800</option>
				<option value="900">900</option>
				<option value="1000">1000</option>
				<option value="1100">1100</option>
				<option value="1200">1200</option>
				<option value="1300">1300</option>
				<option value="1400">1400</option>
				<option value="1500">1500</option>
				<option value="1600">1600</option>
				<option value="1700">1700</option>
				<option value="1800">1800</option>
				<option value="1900">1900</option>
				<option value="2000">2000</option>
				<option value="2100">2100</option>
				<option value="2200">2200</option>
				<option value="2300">2300</option>
				<option value="2400">2400</option>
				<option value="2500">2500</option>
				<option value="2600">2600</option>
				<option value="2700">2700</option>
				<option value="2800">2800</option>
				<option value="2900">2900</option>
				<option value="3000">3000</option>
			</select>
			</td>
		</tr>	
	</table>
	<div align="left"><input style="background:#FFF; color:#0F0" class="submit" type="submit" name="submit" value="Update"/></div>
</form>
<style type="text/css">
	.submit{ border:1px solid #F00; width:200px; height:50px; align-self: center;} 
</style>