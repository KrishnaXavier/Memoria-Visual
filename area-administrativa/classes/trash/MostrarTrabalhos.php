<?php
require "../inc/connect.php";

$query=$pdo->query("SELECT * FROM trabalhos");


$result=$query->fetch(PDO::FETCH_ASSOC);
while($result!=null){
	print_r($result);
	$idTrabalho = $result['idTrabalho'];

	$subQuery=$pdo->query("SELECT * FROM imagens WHERE idTrabalho = '$idTrabalho'");
	$subResult=$subQuery->fetch(PDO::FETCH_ASSOC);	
	echo "<h4>Titulo: ".$result['tituloTrabalho']."</h4>";
	echo "<h4>Autor: ".$result['autor']."</h4>";
	echo "<h4>Data: ".$result['data']."</h4>";
	echo "<h4>Semestre: ".$result['semestre']."</h4>";
	echo "<h4>Tipo: ".$result['tipo']."</h4>";
	while($subResult!=null){
		$srcImagem = "../imgs/trabalhos/".$subResult['imagem'];
		echo "<img src='".$srcImagem."' width='100px'/>";
		$subResult=$subQuery->fetch(PDO::FETCH_ASSOC);
	}

	echo "<br><br><br>";	
	$result=$query->fetch(PDO::FETCH_ASSOC);
}
