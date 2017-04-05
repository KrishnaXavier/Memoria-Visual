<?php 
require "../inc/connect.php";
echo "Dados:<br>";
pegarDadosPOST($pdo);	

/* Funções */

function pegarDadosPOST($pdo){
	echo "<br>Semestre: ";
	if(isset($_GET['semestre'])){	
		$semestre = $_POST['semestre'];
		echo "Semestre: ".$_POST['semestre'];
	}

	echo "<br>Cadeiras: ";
	$contadorCadeiras = 0;
	$arrayCadeiras = [];
	while(isset($_GET['cadeiras'.$contadorCadeiras]) ){
		echo $_GET['cadeiras'.$contadorCadeiras]", ";
		$arrayCadeiras[$contadorCadeiras] = $_POST['cadeiras'.$contadorCadeiras++];		
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
	$ultimoIdTrabalho = $pdo->lastInsertId();	
	
	$contadorImagens = 0;
	//$hoje = date("Y/m/d");
	while(isset($_POST['srcImagnes']) && array_key_exists($contadorImagens, $_POST['srcImagnes'])){
		echo "<br>Imagem: ".$_POST['srcImagnes'][$contadorImagens];
		$imagem = $_POST['srcImagnes'][$contadorImagens];
		$query=$pdo->query("INSERT INTO imagens(data, imagem, titulo, idTrabalho) VALUES ('$data', '$imagem', '$titulo', '$ultimoIdTrabalho')");	
		$contadorImagens++;
	}	
	echo "<br>ID do ultimo inserido: ".$ultimoIdTrabalho;

	echo "<br>Fazer: Precisa adiconar as disciplinas ainda no BD";
	/* Precisa adiconar as disciplinas ainda*/
}