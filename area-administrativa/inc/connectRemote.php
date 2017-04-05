<?php
//for remote connection configuration
$db = "artan201_memoriavisual";
$user = "artan201_314memo";
$passUser = "olabirintodofauno";

try
{
	$pdo = new PDO( 'mysql:host=localhost;dbname=artan201_memoriavisual', 'artan201_314memo', 'olabirintodofauno' );		
}
catch ( PDOException $e )
{
	echo utf8_encode('failed connection, error: ' . $e->getMessage());
}