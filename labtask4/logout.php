<?php 
	session_start();
	session_destroy();
	setcookie("uname", "");
	setcookie("pass", "");
	header('location: main.php');
?>