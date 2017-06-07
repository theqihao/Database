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

    <!--body style="background-image:url('./images/wood3.jpg');background-position:center; background-repeat:repeat" -->
    <body>
		<div>
			<div class="navi_body">
				<div class="navi_head">
					<div style="width:100%; margin-left:auto; margin-right:auto;">
						<span>
							<p class="navi_title">Home page</p> 
						</span>
						<span>
							<p class="navi_title"><a href="user_show.php">Info</a></p>
						</span>
						<span>
							<p class="navi_title">Account</p>
							<p><a href="user_pass.php">Update Password</p>
							<p><a href="index.php">Log out</a></p>
						</span>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>



