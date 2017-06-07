<?php
	include "menu.php";
	setcookie('post_op', '', 0);
	setcookie('post_op','wage_insert');
?>
<form method="post" action="wage.php">
	<table>
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
				<option value="11000">11000</option>
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
	<div align="left"><input class="submit" type="submit" name="submit" value="Submit"/></div>
</form>
