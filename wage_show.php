<?php
	include "wage.php";
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
	$sql = "select * from wage";
	$retval = mysqli_query($conn, $sql);
	if (!$retval) {
		die('can not select data: ' . mysqli_error($conn));
	}
	echo "<link rel='stylesheet' type='text/css' href='index.css'/>";
	echo "<table id='wage_table'>".
		"<tr>".
			"<th>position</th>".
			"<th>money</th>".
			"<th>update</th>".
			"<th>delete</th>".
		"</tr>";
	while($row = mysqli_fetch_array($retval)) {
		echo "<tr>".
			"<td>{$row['position']}</td>".
			"<td>{$row['money']}</td>".
			"<td>".
			"<input type='button' value='update' onclick='wage_update(this.parentNode.parentNode)'></input>".
            "</td>".
            "<td>".
            "<input type='button' value='delete' onclick='wage_delete(this.parentNode.parentNode)'></input>".
            "</td>".
		"</tr>";
	}
	echo "</table>";
	//echo "<input type='button' value='test' onclick='fresh('http://172.17.0.1/admin.php')'></input>";
	mysqli_close($conn);

?>


<script language="JavaScript">
	function fresh() {
	    window.location.href="http://172.17.0.1/wage_show.php";
	}
	function wage_delete(row) {
		var position = row.cells[0].innerHTML;
	
		if (window.XMLHttpRequest) {
		    xmlhttp = new XMLHttpRequest();
		} else {
		    xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
		}
		xmlhttp.open("GET", "./wage_show.php?operation=delete&position="+position, true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function(){
		    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		        //alert("delete data sucess");
				fresh();
		    }
		}
		
		//window.location.href="http://172.17.0.1/employee.php";
	}
	function wage_update(row) {
		var position = row.cells[0].innerHTML;
		var money = row.cells[1].innerHTML;
		if (window.XMLHttpRequest) {
		    xmlhttp = new XMLHttpRequest();
		} else {
		    xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
		}
		var mess = "./wage_show.php?operation=update&position="+position+"&money="+money;
		//alert(mess);
		xmlhttp.open("GET", mess, true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function(){
		    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		        //alert("update data sucess");
				//fresh();
		    }
		}
		
		window.location.href="http://172.17.0.1/wage_update.php";
	}
</script>