<?php
	session_start();
	if(!isset($_SESSION['usuario'])){
		$host  = $_SERVER['HTTP_HOST'];
		
		header("Location: http://$host/php/templates/login.php");
		exit();
	}
	require __DIR__."/../class/conexao.php";
?>