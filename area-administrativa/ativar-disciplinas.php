<?php
require "inc/permission.php";
require "inc/head.php";
require "inc/menu.php";
require "inc/connect.php";
require "inc/Functions.php";

$codigo = $_GET['codigo'];
ativarTrabalho($pdo, $codigo);

function ativarTrabalho($pdo, $codigo){		
	$query=$pdo->query("UPDATE disciplinas SET ativa = 1 WHERE codigo = '".$codigo."'");
	echo "<h1 class='titulo-pagina'>Disciplina Ativada</h1>";
	echo "<h1 class='titulo-pagina'> <a href='disciplinas'>voltar</a> </h1>";
}
