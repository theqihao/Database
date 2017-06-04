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
	$url = "http://172.17.0.1/allowance_show.php";

	// POST
	$post = $_COOKIE["post_op"];
	if ($post == 'allowance_insert') {
		$id = $_POST['id'];
		$year = $_POST['year'];
		$type = $_POST['type'];
		$days = $_POST['days'];	
		$money = $_POST['money'];	
		if ($id == "" || $year == "" || $type == "" || $days == "" || $money == "") {
			echo "Can not be empty";
			setcookie('post_op','');
			setcookie('post_op','null');
			mysqli_close($conn);
			exit();
		}
		$sql = "insert into allowance values('$id','$year','$type', '$days', '$money')";
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
	} else if ($post == 'allowance_update') {
		$id = $_POST['id'];
		$year = $_POST['year'];
		$type = $_POST['type'];
		$old_days = $_POST['old_days'];
		$days = $_POST['days'];
		$money = $_POST['money'];
		if ($id == "" || $year == "" || $type == "" || $old_days == ""  || $days == "" || $money == "") {
			echo "Can not be empty";
			setcookie('post_op','');
			setcookie('post_op','null');
			mysqli_close($conn);
			exit();
		}
		$sql = "update allowance set days='$days', money='$money' where id='$id' and year='$year' and type='$type' and days='$old_days'";
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
			$type = $_GET['type'];
			$days = $_GET['days'];	
			$sql = "delete from allowance where id='$id' and year='$year' and type='$type' and days='$days'";
			$retval = mysqli_query($conn, $sql);
			if (!$retval) {
				echo "delete failed";
			} else {
				echo "delete sucess";
			}
            echo "<script type='text/javascript'> set_url(); </script>";
            mysqli_close($conn);
		} else if ($_GET['operation'] == 'update') {
			setcookie('id','');
			setcookie('id',$_GET['id']);
			setcookie('year','');
			setcookie('year',$_GET['year']);
			setcookie('type','');
			setcookie('type',$_GET['type']);
			setcookie('days','');
			setcookie('days',$_GET['days']);

			mysqli_close($conn);
			$url = "http://172.17.0.1/allowance_update.php";
			echo "<script language='JavaScript'>";  
			echo "location.href='$url'";  
			echo "</script>"; 
		}
		
	}
	setcookie('post_op','');
	setcookie('post_op','null');
?>
<script type="text/javascript">
	set_url();
</script>

<script type="text/javascript">
	function set_url() {
		var url = "http://172.17.0.1/allowance_show.php";
		location.href = url;
	}
</script>
