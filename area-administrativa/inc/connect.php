<?php
//for local connection configuration
try
{
	$pdo = new PDO( 'mysql:host=localhost;dbname=projetodesign', 'root', '' );	
}
catch ( PDOException $e )
{
	echo utf8_encode('failed connection, error: ' . $e->getMessage());
}