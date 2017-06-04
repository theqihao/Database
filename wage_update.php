<?php
	include "menu.php";
	setcookie('post_op','');
	setcookie('post_op','wage_update');
	$position = $_COOKIE["position"];
	$money = $_COOKIE['money'];
?>

<form method="post" action="wage.php">
	<input type="hidden" <?php echo "value='$position'" ?> name="old_position">
	<table>
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
			<td>money</td>
			<td>
			<select name="money">
				<option value="1000" selected>1000</option>
				<option value="2000">2000</option>
				<option value="3000">3000</option>
				<option value="4000">4000</option>
				<option value="5000">5000</option>
				<option value="6000">6000</option>
				<option value="7000">7000</option>
				<option value="8000">8000</option>
				<option value="9000">9000</option>
				<option value="10000">10000</option>
				<option value="12000">12000</option>
				<option value="13000">13000</option>
				<option value="14000">14000</option>
				<option value="15000">15000</option>
				<option value="16000">16000</option>
				<option value="17000">17000</option>
				<option value="18000">18000</option>
				<option value="19000">19000</option>
				<option value="20000">20000</option>
			</select>
			</td>
		</tr>	
	</table>
	<div align="left"><input style="background:#FFF; color:#0F0" class="submit" type="submit" name="submit" value="Update"/></div>
</form>
<style type="text/css">
	.submit{ border:1px solid #F00; width:200px; height:50px; align-self: center;} 
</style>