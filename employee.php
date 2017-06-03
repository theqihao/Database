<?php
	//include "db.php";
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
	$url = "http://172.17.0.1/employee_show.php";

	// POST
	$post = $_COOKIE["post_op"];
	//$post = $_SESSION["post_op"];
	if ($post == 'employee_insert') {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$sex = $_POST['sex'];
		$position = $_POST['position'];
		$department = $_POST['department'];
		$pass = $_POST['pass'];
		if ($id == "" || $name == "" || $pass == "") {
			echo "Can not be empty";
			mysqli_close($conn);
			exit();
		}
		$sql = "insert into employee values('$id','$name','$sex', '$position', '$department', '$pass')";
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
	} else if ($post == 'employee_update') {
		$old_id = $_POST['old_id'];
		$id = $_POST['id'];
		$name = $_POST['name'];
		$sex = $_POST['sex'];
		$position = $_POST['position'];
		$department = $_POST['department'];
		$pass = $_POST['pass'];
		if ($id == "" || $name == "" || $pass == "") {
			echo "Can not be empty";
			mysqli_close($conn);
			exit();
		}
		$sql = "update employee set id='$id', name='$name', sex='$sex', position='$position', department='$department', pass='$pass' where id='$old_id' ";
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
			$id = $_GET['id'];
			$sql = "delete from employee where id='$id' ";
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
			setcookie('name','');
			setcookie('name',$_GET['name']);
			setcookie('sex','');
			setcookie('sex',$_GET['sex']);
			setcookie('position','');
			setcookie('position',$_GET['position']);
			setcookie('department','');
			setcookie('department',$_GET['department']);
			setcookie('pass','');
			setcookie('pass',$_GET['pass']);


			$url = "http://172.17.0.1/employee_update.php";
			echo "<script language='JavaScript'>";  
			echo "location.href='$url'";  
			echo "</script>"; 
		}
		/*
		switch ($_GET['operation']) {
			case 'delete':
				$sql = "delete from employee where id=".'$_GET['id']';
				//$retval = mysqli_query($conn, $sql);
				//if (!$retval) {
				//	echo "delete failed";
				//} else {
				//	echo "delete sucess";
				//}
                //set_url();
                mysqli_close($conn);
				break;
			
			default:
				# code...
				break;
		}
		*/
		
	}
	setcookie('post_op','');
	setcookie('post_op','null');
?>
<script type="text/javascript">
	set_url();
</script>

<script type="text/javascript">
	function set_url() {
		var url = "http://172.17.0.1/employee_show.php";
		location.href = url;
	}
</script>
