<?php
header('Content-Type: text/html; charset=utf-8');
require "../inc/connect.php";
salvarDisciplina($pdo);

function salvarDisciplina($pdo){
	$codigo = $_POST["codigo"];
	$nome = $_POST["nome"]."v3";
	$semestre = $_POST["semestre"];
	$matriz = $_POST["matriz"];
	$semanal = $_POST["semanal"];
	$teorica = $_POST["teorica"];
	$pratica = $_POST["pratica"];
	$total = $_POST["total"];
	
	$query=$pdo->query("INSERT INTO 
		disciplinas(codigo, nomeDisciplina, horaAulaSemanal, cargaHorarioTeoria, cargaHorarioPratica, cargaHorarioTotal, semestre, ativa, matriz) 
		VALUES ('$codigo', '$nome', '$semanal','$teorica','$pratica','$total','$semestre','1','$matriz')"
	);	

	if(!$query){		
		echo "erro";
		print_r($pdo->errorInfo()[2]);
	}
}