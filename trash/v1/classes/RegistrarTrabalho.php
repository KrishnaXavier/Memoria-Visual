<?php 
require "../inc/connect.php";
echo "Dados:<br>";
echo "<br>src Imagnes: ".$_POST['srcImagnes'][0];
pegarDadosPOST($pdo);	

/* Funções */

function pegarDadosPOST($pdo){
	echo "<br>Semestre: ";
	if(isset($_POST['semestre'])){	
		$semestre = $_POST['semestre'];
		echo "Semestre: ".$_POST['semestre'];
	}

	echo "<br>Cadeiras: ";
	$contadorCadeiras = 0;
	$arrayCadeiras = [];
	while(isset($_POST['cadeiras']) && array_key_exists($contadorCadeiras, $_POST['cadeiras'])){
		echo $_POST['cadeiras'][$contadorCadeiras].", ";
		$arrayCadeiras[$contadorCadeiras] = $_POST['cadeiras'][$contadorCadeiras];
		$contadorCadeiras++;
	}

	echo "<br>Autor: ";	
	if(isset($_POST['autor'])){
		$autor = $_POST['autor'];
		echo $autor;
	}

	echo "<br>Titulo: ";
	if(isset($_POST['titulo'])){
		$titulo = $_POST['titulo'];
		echo $titulo;
	}

	echo "<br> Data de Conclusão: ";
	if(isset($_POST['dataConclusao'])){
		$dataConclusao = $_POST['dataConclusao'];
		echo $dataConclusao;
	}

	echo "<br>Tipo: ";
	if(isset($_POST['tipo'])){
		$tipo = $_POST['tipo'];
		echo $tipo;
	}		

	registrarTrabalho($pdo, $semestre, $arrayCadeiras, $autor, $titulo, $dataConclusao, $tipo);
}


function registrarTrabalho($pdo, $semestre, $cadeiras, $autor, $titulo, $data, $tipo){	
	$query=$pdo->query("INSERT INTO trabalhos(autor, data, tipo, tituloTrabalho, semestre) VALUES ('$autor', '$data', '$tipo', '$titulo', '$semestre')");	
	$lastId = $pdo->lastInsertId();	
	echo "<br>ID do ultimo inserido: ".$lastId;
}