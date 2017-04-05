<?php
require "connect.php";
session_start();
if(isset($_SESSION['idUsuario']) && isset($_SESSION['usuario']) && isset($_SESSION['email'])){
	$idUsuario = $_SESSION['idUsuario'];	
	$usuario = $_SESSION['usuario'];
	$email = $_SESSION['email'];
	$query=$pdo->query("SELECT * FROM usuarios WHERE idUsuario = '$idUsuario' and usuario = '$usuario' and email = '$email' ");
	$rows = $query->rowCount();
	if($rows>0){		
	}else{
		echo "<script>alert('Usuario nãoa existe!');</script>";	
		header("Location: login.php");
	}
}else{
	header("Location: login.php");
}
