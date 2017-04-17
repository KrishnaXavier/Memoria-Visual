<?php
require "../inc/connect.php";
require "../inc/Functions.php";

salvarDisciplina($pdo);

function salvarDisciplina($pdo){
	$codigo = $_POST["codigo"];
	$nome = $_POST["nome"];
	$semestre = $_POST["semestre"];
	$emenda = $_POST["emenda"];
	$semanal = $_POST["semanal"];
	$teorica = $_POST["teorica"];
	$pratica = $_POST["pratica"];
	$total = $_POST["total"];
	$query=$pdo->query("INSERT INTO 
		disciplinas(codigo, nomeDisciplina, horaAulaSemanal, cargaHorarioTeoria, cargaHorarioPratica, cargaHorarioTotal, semestre, ativa, emenda) 
		VALUES ('".$codigo."', '".$nome."', '".$semanal."','".$teorica."','".$pratica."','".$total."','".$semestre."','1','".$emenda."')");
}