<?php
mostrarTrabalhos($pdo);

/* Funções */
function mostrarTrabalhos($pdo){
	$query=$pdo->query("SELECT * FROM trabalhos");
	$result=$query->fetch(PDO::FETCH_ASSOC);
	while($result!=null){
		$idTrabalho = $result['idTrabalho'];	
		e("Titulo: ".$result['tituloTrabalho']);
		e("Autor: ".$result['autor']);
		e("Data: ".$result['data']);
		e("Semestre: ".$result['semestre']);	
		
		$imagens = mostrarImagens($pdo, $idTrabalho, 1, 100);
		echo ($imagens);

		echo("<br><a href='editar-galeria.php?idTrabalho=$idTrabalho'>Editar</a><br><br>");	
		//echo ("<br><form method='post' action='' id='form'><a href='#' onClick='document.getElementById('form').submit();' name='idTrabalho' value='$idTrabalho' >Editar2</a> </form>");	
		$result=$query->fetch(PDO::FETCH_ASSOC);
	}
}

function mostrarImagens($pdo, $idTrabalho, $numero, $width){	
	$contador =  0;	
	$query=$pdo->query("SELECT * FROM imagens WHERE idTrabalho = '$idTrabalho'");
	$result=$query->fetch(PDO::FETCH_ASSOC);					
	while($result!=null && $contador<$numero){		
		$srcImagem = "../imgs/trabalhos/".$result['imagem'];			
		echo ("<br><img src='".$srcImagem."' width='$width'/>");		
		$result=$query->fetch(PDO::FETCH_ASSOC);
		$contador++;
	}
}

/* Funções de Redução para Ambiente de Desenvolvimento */
function e($str){
	print_r("<br>".$str);
}