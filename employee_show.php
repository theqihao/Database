<?php
	include "employee.php";
	include "menu.php";

	/*
	echo "qihao";
	$db = db_connect();
	$sql = "select * from employee";
	$result = $db->query($sql);
	if (!$result) {
		echo "query failed";
		//throw new Exception('Could not execute query');
		echo "query failed";
		exit();
	} else {
		echo "success";
	}
	/*
	echo '<table><tr><th>id</th><th>name</th><th>sex</th><th>position</th><th>department</th><th>password</th></tr>';
	while($row = $result->fetch_row()) {
	    echo "<tr>".
		    	 "<td>{$row['id']}</td>".
		         "<td>{$row['name']} </td>".
		         "<td>{$row['sex']} </td>".
		         "<td>{$row['position']} </td>".
		         "<td>{$row['department']} </td>".
		         "<td>{$row['pass']} </td>".
	         "</tr>";
	}
	echo '</table>';
	*/
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
	$sql = "select * from employee";
	$retval = mysqli_query($conn, $sql);
	if (!$retval) {
		die('can not insert data: ' . mysqli_error($conn));
	}
?>
	<link rel="stylesheet" type="text/css" href="index.css" /> 
	<table>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>sex</th>
		<th>position</th>
		<th>department</th>
		<th>password</th>
	</tr>
<?php
	while($row = mysqli_fetch_array($retval)) {
?>
	<tr>
		<td><?php echo $row['id'] ?></td>
		<td><?php echo $row['name'] ?></td>
		<td><?php echo $row['sex'] ?></td>
		<td><?php echo $row['position'] ?></td>
		<td><?php echo $row['department'] ?></td>
		<td><?php echo $row['pass'] ?></td>
	</tr>
<?php
	}
?>
	</table>
<?php
	mysqli_close($conn);
?>
*/

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
	$sql = "select * from employee";
	$retval = mysqli_query($conn, $sql);
	if (!$retval) {
		die('can not select data: ' . mysqli_error($conn));
	}
	echo "<link rel='stylesheet' type='text/css' href='index.css'/>";
	echo "<table id='employee_table'>".
		"<tr>".
			"<th>id</th>".
			"<th>name</th>".
			"<th>sex</th>".
			"<th>position</th>".
			"<th>department</th>".
			"<th>password</th>".
			"<th>update</th>".
			"<th>delete</th>".
		"</tr>";
	while($row = mysqli_fetch_array($retval)) {
		echo "<tr>".
			"<td>{$row['id']}</td>".
			"<td>{$row['name']}</td>".
			"<td>{$row['sex']}</td>".
			"<td>{$row['position']}</td>".
			"<td>{$row['department']}</td>".
			"<td>{$row['pass']}</td>".
			"<td>".
			"<input type='button' value='update' onclick='employee_update(this.parentNode.parentNode)'></input>".
            "</td>".
            "<td>".
            "<input type='button' value='delete' onclick='employee_delete(this.parentNode.parentNode)'></input>".
            "</td>".
		"</tr>";
	}
	echo "</table>";
	//echo "<input type='button' value='test' onclick='fresh('http://172.17.0.1/admin.php')'></input>";
	mysqli_close($conn);
?>



<script language="JavaScript">
	function fresh() {
	    window.location.href="http://172.17.0.1/employee_show.php";
	}
	function employee_delete(row) {
		var id = row.cells[0].innerHTML;
		var name = row.cells[1].innerHTML;
		var sex = row.cells[2].innerHTML;
		var position = row.cells[3].innerHTML;
		var department = row.cells[4].innerHTML;
		var pass = row.cells[5].innerHTML;
		//	alert(id+name+sex+position+department+pass);
	
		if (window.XMLHttpRequest) {
		    xmlhttp = new XMLHttpRequest();
		} else {
		    xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
		}
		xmlhttp.open("GET", "./employee_show.php?operation=delete&id="+id, true);
		alert("./employee_show.php?operation=delete&id="+id);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function(){
		    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		        //alert("delete data sucess");
				fresh();
		    }
		}
		
		//window.location.href="http://172.17.0.1/employee.php";
	}
	function employee_update(row) {
		var id = row.cells[0].innerHTML;
		var name = row.cells[1].innerHTML;
		var sex = row.cells[2].innerHTML;
		var position = row.cells[3].innerHTML;
		var department = row.cells[4].innerHTML;
		var pass = row.cells[5].innerHTML;
	//	alert(id+name+sex+position+department+pass);
	
		if (window.XMLHttpRequest) {
		    xmlhttp = new XMLHttpRequest();
		} else {
		    xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
		}
		var mess = "./employee_show.php?operation=update&id="+id;
		mess = mess + "&name="+name+"&sex="+sex+"&position="+position+"&department="+department+"&pass="+pass;
		//alert(mess);
		xmlhttp.open("GET", mess, true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function(){
		    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		        //alert("update data sucess");
				//fresh();
		    }
		}
		
		window.location.href="http://172.17.0.1/employee_update.php";
	}
</script>