<?php
require "inc/permission.php";
require "inc/head.php";
require "inc/menu.php";
require "inc/connect.php";
require "inc/Functions.php";

$idTrabalho = $_GET['idTrabalho'];
ativarTrabalho($pdo, $idTrabalho);

function ativarTrabalho($pdo, $idTrabalho){		
	$query=$pdo->query("UPDATE trabalhos SET ativo = 1 WHERE idTrabalho = '".$idTrabalho."'");
	echo "<h1 class='titulo-pagina'>Galeria Ativada</h1>";
	echo "<h1 class='titulo-pagina'> <a href='galeria'>voltar</a> </h1>";
}
