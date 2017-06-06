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
	$url = "http://172.17.0.1/wage_show.php";

	// POST
	$post = $_COOKIE["post_op"];
	if ($post == 'wage_insert') {
		$position = $_POST['position'];
		$money = $_POST['money'];
		if ($position == "" || $money == "") {
			echo "Can not be empty";
			mysqli_close($conn);
			exit();
		}
		$sql = "insert into wage values('$position', '$money')";
		$retval = mysqli_query($conn, $sql);
		if (!$retval) {
			die('can not insert data: ' . mysqli_error($conn));
			exit();
		}
		mysqli_close($conn);
		echo "<script language='JavaScript'>";  
		echo "location.href='$url'";  
		echo "</script>"; 
		setcookie('post_op','null');
	} else if ($post == 'wage_update') {
		$old_position = $_POST['old_position'];
		$position = $_POST['position'];
		$money = $_POST['money'];
		if ($position == "" || $money == "") {
			echo "Can not be empty";
			mysqli_close($conn);
			exit();
		}
		$sql = "update wage set position='$position', money='$money' where position='$old_position' ";
		$retval = mysqli_query($conn, $sql);
		if (!$retval) {
			die('can not insert data: ' . mysqli_error($conn));
			exit();
		}
		mysqli_close($conn);
		echo "<script language='JavaScript'>";  
		echo "location.href='$url'";  
		echo "</script>"; 
	}


		// GET
	if (isset($_GET['operation'])) {
		if ($_GET['operation'] == 'delete') {
			$position = $_GET['position'];
			$sql = "delete from wage where position='$position' ";
			$retval = mysqli_query($conn, $sql);
			if (!$retval) {
				echo "delete failed";
			} else {
				echo "delete sucess";
			}
            echo "<script type='text/javascript'> set_url(); </script>";
            mysqli_close($conn);
		} else if ($_GET['operation'] == 'update') {
			setcookie('position','', 0);
			setcookie('position',$_GET['position']);
			setcookie('money','', 0);
			setcookie('money',$_GET['money']);

			mysqli_close($conn);
			$url = "http://172.17.0.1/wage_update.php";
			echo "<script language='JavaScript'>";  
			echo "location.href='$url'";  
			echo "</script>"; 
		}
	}
	setcookie('post_op','');
	setcookie('post_op','null');
?>
