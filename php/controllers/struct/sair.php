<?php
	session_start();
	$host  = $_SERVER['HTTP_HOST'];
	session_destroy();
	header("Location: http://$host/php/templates/login.php");
	exit();
?>