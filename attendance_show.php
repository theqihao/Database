<?php
	include "attendance.php";
	include "menu.php";


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
	$sql = "select * from attendance";
	$retval = mysqli_query($conn, $sql);
	if (!$retval) {
		die('can not select data: ' . mysqli_error($conn));
	}
	echo "<link rel='stylesheet' type='text/css' href='index.css'/>";
	echo "<table id='attendance_table'>".
		"<tr>".
			"<th>id</th>".
			"<th>year</th>".
			"<th>month</th>".
			"<th>rate</th>".
			"<th>update</th>".
			"<th>delete</th>".
		"</tr>";
	while($row = mysqli_fetch_array($retval)) {
		echo "<tr>".
			"<td>{$row['id']}</td>".
			"<td>{$row['year']}</td>".
			"<td>{$row['_month']}</td>".
			"<td>{$row['rate']}</td>".
			"<td>".
			"<input type='button' value='update' style='width:100px;height:30px;background-color:#ffffff;' onclick='attendance_update(this.parentNode.parentNode)'></input>".
            "</td>".
            "<td>".
            "<input type='button' value='delete' style='width:100px;height:30px;background-color:#ffffff;' onclick='attendance_delete(this.parentNode.parentNode)'></input>".
            "</td>".
		"</tr>";
	}
	echo "</table>";
	mysqli_close($conn);

?>


<script language="JavaScript">
	function fresh() {
	    window.location.href="http://172.17.0.1/attendance_show.php";
	}
	function attendance_delete(row) {
		var id = row.cells[0].innerHTML;
		var year = row.cells[1].innerHTML;
		var _month = row.cells[2].innerHTML;
	
		if (window.XMLHttpRequest) {
		    xmlhttp = new XMLHttpRequest();
		} else {
		    xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
		}
		var mess = "./attendance_show.php?operation=delete&id="+id+"&year="+year+"&_month="+_month;
		//alert(mess);
		xmlhttp.open("GET", mess, true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function(){
		    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		        //alert("delete data sucess");
				fresh();
		    }
		}
		
		//window.location.href="http://172.17.0.1/employee.php";
	}
	function attendance_update(row) {
		var id = row.cells[0].innerHTML;
		var year = row.cells[1].innerHTML;
		var _month = row.cells[2].innerHTML;
		if (window.XMLHttpRequest) {
		    xmlhttp = new XMLHttpRequest();
		} else {
		    xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
		}
		var mess = "./attendance_show.php?operation=update&id="+id+"&year="+year+"&_month="+_month;
		alert(mess);
		xmlhttp.open("GET", mess, true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function(){
		    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		        //alert("update data sucess");
				//fresh();
		    }
		}
		
		window.location.href="http://172.17.0.1/attendance_update.php";
	}
</script>