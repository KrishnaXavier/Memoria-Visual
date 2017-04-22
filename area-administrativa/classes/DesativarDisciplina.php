<?php 
require "../inc/connect.php";
require "../inc/Functions.php";

if(isset($_POST['codigo'])){	
	desativar($pdo, $_POST['codigo']);
}else{

}

function desativar($pdo, $codigo){
	$query=$pdo->query("UPDATE disciplinas SET ativa = 0 WHERE codigo = '".$codigo."'");
	if(!$query){		
		echo "erro";
		print_r($pdo->errorInfo()[2]);
	}
}