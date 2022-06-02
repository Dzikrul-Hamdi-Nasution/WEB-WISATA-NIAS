<?php
include 'func.php';
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
	if($_GET['m']=='login'){
		include 'login.php';
	}elseif($_GET['m']=='reset'){
		include 'reset.php';
	}else{
		include 'web.php';
	}
}else{
	include 'dashboard.php';
}
?>