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
	$url = "http://172.17.0.1/attendance_show.php";

	// POST
	$post = $_COOKIE["post_op"];
	if ($post == 'attendance_insert') {
		$id = $_POST['id'];
		$year = $_POST['year'];
		$_month = $_POST['_month'];
		$rate = $_POST['rate'];	
		if ($id == "" || $year == "" || $_month == "" || $rate == "" ) {
			echo "Can not be empty";
			mysqli_close($conn);
			exit();
		}
		$sql = "insert into attendance values('$id','$year','$_month', '$rate')";
		$retval = mysqli_query($conn, $sql);
		if (!$retval) {
			die('can not insert data: ' . mysqli_error($conn));
			setcookie('post_op','');
			setcookie('post_op','null');
			exit();
		}
		mysqli_close($conn);
		echo "<script language='JavaScript'>";  
		echo "location.href='$url'";  
		echo "</script>"; 
		setcookie('post_op','');
		setcookie('post_op','null');
	} else if ($post == 'attendance_update') {
		$id = $_POST['id'];
		$year = $_POST['year'];
		$_month = $_POST['_month'];
		$rate = $_POST['rate'];	
		if ($id == "" || $year == "" || $_month == "" || $rate == "" ) {
			echo "Can not be empty";
			setcookie('post_op','');
			setcookie('post_op','null');
			mysqli_close($conn);
			exit();
		}
		$sql = "update attendance set rate='$rate' where id='$id' and year='$year' and _month='$_month'";
		$retval = mysqli_query($conn, $sql);
		if (!$retval) {
			die('can not update data: ' . mysqli_error($conn));
			setcookie('post_op','');
			setcookie('post_op','null');
			exit();
		}
		mysqli_close($conn);
		echo "<script language='JavaScript'>";  
		echo "location.href='$url'";  
		echo "</script>"; 
		setcookie('post_op','');
		setcookie('post_op','null');
	}


	// GET
	if (isset($_GET['operation'])) {
		if ($_GET['operation'] == 'delete') {
			$id = $_GET['id'];
			$year = $_GET['year'];
			$_month = $_GET['_month'];
			$sql = "delete from attendance where id='$id' and year='$year' and _month='$_month'";
			$retval = mysqli_query($conn, $sql);
			if (!$retval) {
				echo "delete failed";
			} else {
				echo "delete sucess";
			}
            echo "<script type='text/javascript'> set_url(); </script>";
            mysqli_close($conn);
		} else if ($_GET['operation'] == 'update') {
			setcookie('id','',0);
			setcookie('id',$_GET['id']);
			setcookie('year','',0);
			setcookie('year',$_GET['year']);
			setcookie('_month','',0);
			setcookie('_month',$_GET['_month']);

			mysqli_close($conn);
			$url = "http://172.17.0.1/attendance_update.php";
			echo "<script language='JavaScript'>";  
			echo "location.href='$url'";  
			echo "</script>"; 
		}
		
	}
	setcookie('post_op','',0);
	setcookie('post_op','null');
?>
<script type="text/javascript">
	set_url();
</script>

<script type="text/javascript">
	function set_url() {
		var url = "http://172.17.0.1/attendance_show.php";
		location.href = url;
	}
</script>
