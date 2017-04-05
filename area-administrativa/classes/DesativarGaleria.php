<?php 
require "../inc/connect.php";
require "../inc/Functions.php";

$idTrabalho = $_POST['idTrabalho'];

desativarGaleria($pdo, $idTrabalho);

function desativarGaleria($pdo, $idTrabalho){
	$dados = [];
	$query=$pdo->query("UPDATE trabalhos SET ativo = 0 WHERE idTrabalho = '".$idTrabalho."'");
	$dados[] = "Galeria Desativada";	
	echo json_encode ($dados);
}