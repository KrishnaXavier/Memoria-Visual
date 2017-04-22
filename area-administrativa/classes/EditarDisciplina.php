<?php
require "../inc/connect.php";
require "../inc/Functions.php";

editarDisciplina($pdo);

function editarDisciplina($pdo){
	$codigoPrimario = $_POST['codigoPrimario'];
	$codigo = $_POST["codigo"];
	$nome = $_POST["nome"];
	$semestre = $_POST["semestre"];
	$emenda = $_POST["emenda"];
	$semanal = $_POST["semanal"];
	$teorica = $_POST["teorica"];
	$pratica = $_POST["pratica"];
	$total = $_POST["total"];	
	
	$query=$pdo->query("
		UPDATE disciplinas 
		SET nomeDisciplina='".$nome."', horaAulaSemanal='".$semanal."', cargaHorarioTeoria='".$teorica."', 	cargaHorarioPratica='".$pratica."', cargaHorarioTotal='".$total."', semestre='".$semestre."', emenda='".$emenda."' 
		WHERE codigo = '".$codigoPrimario."' ");

	if(!$query){		
		echo "erro";
		print_r($pdo->errorInfo()[2]);
	}
}