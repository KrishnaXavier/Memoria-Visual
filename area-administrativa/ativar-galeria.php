<?php
require "inc/head.php";
require "inc/menu.php";
require "inc/connect.php";
require "inc/Functions.php";

$idTrabalho = $_GET['idTrabalho'];
ativarTrabalho($pdo, $idTrabalho);

function ativarTrabalho($pdo, $idTrabalho){		
	$query=$pdo->query("UPDATE trabalhos SET ativo = 1 WHERE idTrabalho = '".$idTrabalho."'");
	e("@Trabalho Ativado");
}
