<?php
//for remote connection configuration
$db = "artan201_projetodesign";
$user = "artan201_314memo";
$passUser = "olabirintodofauno";

try
{
	$pdo = new PDO( 'mysql:host=localhost;dbname=artan201_projetodesign', 'artan201_314memo', 'olabirintodofauno', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));		
}
catch ( PDOException $e )
{
	echo utf8_encode('failed connection, error: ' . $e->getMessage());
}