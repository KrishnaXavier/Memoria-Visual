<?php 
require "../inc/connect.php";
require "../inc/Functions.php";
e('@DesativarGaleria.php');
e("Dados:<br>");

$idTrabalho = $_POST['idTrabalho'];
echo "idTrabalho: ".$idTrabalho;

desativarGaleria($pdo, $idTrabalho);

function desativarGaleria($pdo, $idTrabalho){
	$query=$pdo->query("UPDATE trabalhos SET ativo = 0 WHERE idTrabalho = '".$idTrabalho."'");
	e("@Galeria Desativada");
}