<?php
	include "menu.php";
	setcookie('post_op', '');
	setcookie('post_op','allowance_insert');
?>
<form method="post" action="allowance.php">
	<table>
		<tr>	
			<td>id</td>
			<td>
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
			</td>
		</tr>
		<tr>
			<td>year</td>
			<td>
			<select name="year">
				<option value="2017" selected>2017</option>
				<option value="2016">2016</option>
				<option value="2015">2015</option>
			</select>
			</td>
		</tr>
		<tr>
			<td>type</td>
			<td>
			<select name="type">
				<option value="night" selected>night</option>
				<option value="sunday">sunday</option>
				<option value="festival">festival</option>
			</select>
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
	<div align="left"><input style="background:#FFF; color:#0F0" class="submit" type="submit" name="submit" value="Submit"/></div>
</form>
<style type="text/css">
	.submit{ border:1px solid #F00; width:200px; height:50px; align-self: center;} 
</style>
