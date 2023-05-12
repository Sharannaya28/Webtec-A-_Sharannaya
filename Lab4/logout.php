<?php 
	session_start();
	session_destroy();
	setcookie("uname", "");
	setcookie("pass", "");
	setcookie("color", "");
	header('location: home.php');
?>