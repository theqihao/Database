<?php
	require_once('db.php');
	require_once('data.php');
?>
<!DOCTYPE html>

<html>
    <head>
		<title>qihao</title>
		<script language="JavaScript" src="./index.js"></script>
        <link rel="stylesheet" type="text/css" href="./index.css" /> 
    </head>

    <body style="background-image:url('./images/wood3.jpg');background-position:center; background-repeat:repeat">
		<div>
			<div class="navi_body">
				<div class="navi_head">
					<div style="width:100%; margin-left:auto; margin-right:auto;">
						<span>
							<p class="navi_title">Home page</p>
						</span>
						<span>
							<p class="navi_title"><a href="employee_show.php">Employee</a></p>
							<p><a href="employee_insert.php">insert</a></p>
							<p><a href="employee_show.php">show</a></p>
							<!-- <p><a href="employee_del.php">delete</a></p>
							<p><a href="employee_update.php">update</a></p> -->
						</span>
						<span>
							<p class="navi_title"><a href="wage_show.php">Wage</p>
							<p><a href="wage_insert.php">insert</a></p>
							<p><a href="wage_show.php">show</a></p>
						</span>
						<span>
							<p class="navi_title"><a href="attendance_show.php">Attendance</p>
							<p><a href="attendance_insert.php">insert</a></p>
							<p><a href="attendance_show.php">show</a></p>
						</span>
						<span> 
							<p class="navi_title"><a href="salary_show.php">Salary</p>
							<p><a href="salary_show.php">show</a></p>
						</span>
						<span>
							<p class="navi_title"><a href="allowance_show.php">Allowance</p>
							<p><a href="allowance_insert.php">insert</a></p>
							<p><a href="allowance_show.php">show</a></p>
						</span>
						<span>
							<p class="navi_title">About</p>
							<p><a href="about.php">show</a></p>
						</span>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>



