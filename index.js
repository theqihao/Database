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

function employee_delete(row) {
	alert("qihao");
	//employee_table
	var id = row.cells[0].innerHTML;
	alert(id);
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
    }
    alert("javasrcipt");
    

    /*
    console.log("./index.php?operation=delete&id="+id);  
    xmlhttp.open("GET","./index.php?operation=delete&id="+id,true);
    xmlhttp.send();
        
	xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
	        alert("delete data sucess");
			fresh("http://172.17.0.1/admin.php");
        }
    }
    */
}

function fresh(url) {
    window.location.href=url;
}