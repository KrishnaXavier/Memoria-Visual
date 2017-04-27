<?php
//for local connection configuration
try
{
	$pdo = new PDO( 'mysql:host=localhost;dbname=projetodesign', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));		
}
catch ( PDOException $e )
{
	echo utf8_encode('failed connection, error: ' . $e->getMessage());
}