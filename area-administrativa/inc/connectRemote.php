<?php
//for remote connection configuration
$db = "artan201_projetodesign";
$user = "artan201_314memo";
$passUser = "olabirintodofauno";

try
{
	$pdo = new PDO( 'mysql:host=localhost;dbname=artan201_projetodesign', 'artan201_314memo', 'olabirintodofauno' );		
}
catch ( PDOException $e )
{
	echo utf8_encode('failed connection, error: ' . $e->getMessage());
}