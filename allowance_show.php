<?php
	include "allowance.php";
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
	$sql = "select * from allowance";
	$retval = mysqli_query($conn, $sql);
	if (!$retval) {
		die('can not select data: ' . mysqli_error($conn));
	}

	echo "<link rel='stylesheet' type='text/css' href='index.css'/>";
	echo "<table id='allowance_table'>".
		"<tr>".
			"<th>id</th>".
			"<th>year</th>".
			"<th>type</th>".
			"<th>days</th>".
			"<th>money</th>".
			"<th>update</th>".
			"<th>delete</th>".
		"</tr>";
	while($row = mysqli_fetch_array($retval)) {
		echo "<tr>".
			"<td>{$row['id']}</td>".
			"<td>{$row['year']}</td>".
			"<td>{$row['type']}</td>".
			"<td>{$row['days']}</td>".
			"<td>{$row['money']}</td>".
			"<td>".
			"<input type='button' value='update' onclick='allowance_update(this.parentNode.parentNode)'></input>".
            "</td>".
            "<td>".
            "<input type='button' value='delete' onclick='allowance_delete(this.parentNode.parentNode)'></input>".
            "</td>".
		"</tr>";
	}
	echo "</table>";
	mysqli_close($conn);

?>


<script language="JavaScript">
	function fresh() {
	    window.location.href="http://172.17.0.1/allowance_show.php";
	}
	function allowance_delete(row) {
		var id = row.cells[0].innerHTML;
		var year = row.cells[1].innerHTML;
		var type = row.cells[2].innerHTML;
		var days = row.cells[3].innerHTML;
	
		if (window.XMLHttpRequest) {
		    xmlhttp = new XMLHttpRequest();
		} else {
		    xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
		}
		var mess = "./allowance_show.php?operation=delete&id="+id+"&year="+year+"&type="+type+"&days="+days;
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
	function allowance_update(row) {
		var id = row.cells[0].innerHTML;
		var year = row.cells[1].innerHTML;
		var type = row.cells[2].innerHTML;
		var days = row.cells[3].innerHTML;
		if (window.XMLHttpRequest) {
		    xmlhttp = new XMLHttpRequest();
		} else {
		    xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
		}
		var mess = "./allowance_show.php?operation=update&id="+id+"&year="+year+"&type="+type+"&days="+days;
		//alert(mess);
		xmlhttp.open("GET", mess, true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function(){
		    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		        //alert("update data sucess");
				//fresh();
		    }
		}
		
		window.location.href="http://172.17.0.1/allowance_update.php";
	}
</script>