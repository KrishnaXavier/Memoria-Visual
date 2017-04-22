<?php 
require "../inc/connect.php";
require "../inc/Functions.php";

if(isset($_POST['idTrabalho'])){
	$idTrabalho = $_POST['idTrabalho'];

	desativarGaleria($pdo, $idTrabalho);
}else{

}

function desativarGaleria($pdo, $idTrabalho){
	$dados = [];
	$query=$pdo->query("UPDATE trabalhos SET ativo = 0 WHERE idTrabalho = '".$idTrabalho."'");
	$dados[] = "Galeria Desativada";	
	echo json_encode ($dados);
}	
