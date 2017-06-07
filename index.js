function hello(){
	alert("Author: QiHao.\nQQ     : 2390631000.");
}


function insert_employee() {

}


function check_login() {
	if (login_from.name.value == "") {
		alert("name can not be null");
		login_from.name.focus();
		return false;
	}
	if (login_from.password.value == "") {
		alert("password can not be null");
		login_from.password.focus();
		return false;
	}
}


function employee() {
	
	<?php
		include "employee_show.php";
	?>
}


function fresh(url) {
    window.location.href=url;
}