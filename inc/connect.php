<?php
//for local connection configuration
try
{
	$pdo = new PDO( 'mysql:host=localhost;dbname=projetodesign', 'root', '' );	
	/* servidor web bd: artan201_projetodesign, user: artan201_projeto , senha: lagartixalilas*/
}
catch ( PDOException $e )
{
	echo utf8_encode('failed connection, error: ' . $e->getMessage());
}