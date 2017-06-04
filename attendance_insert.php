<?php
	include "menu.php";
	setcookie('post_op', '');
	setcookie('post_op','attendance_insert');
	echo "<link rel='stylesheet' type='text/css' href='index.css'/>";
?>
<form method="post" action="attendance.php">
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
			<td>month</td>
			<td>
			<select name="_month">
				<option value="1" selected>1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
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
	<div align="left"><input style="background:#FFF; color:#0F0" class="submit" type="submit" name="submit" value="Submit"/></div>
</form>
<style type="text/css">
	.submit{ border:1px solid #F00; width:200px; height:50px; align-self: center;} 
</style>
