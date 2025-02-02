<?php
echo ("<div class='conteiner-mostrar-galerias'>");
mostrarTrabalhos($pdo);
echo ("</div>");

/* Funções */
function mostrarTrabalhos($pdo){
	$query=$pdo->query("SELECT * FROM trabalhos WHERE ativo = 0");
	$numResultados = $query->rowCount();
	if($numResultados>0){
		$result=$query->fetch(PDO::FETCH_ASSOC);	
		while($result!=null){
			$idTrabalho = $result['idTrabalho'];	
			echo ("<div class='slot-galeria'>");
			renderizar("Identificação do Trabalho: ", $idTrabalho);		
			renderizar("Titulo: ", $result['tituloTrabalho']);
			renderizar("Autor: ", $result['autor']);
			renderizar("Data: ", $result['data']);
			renderizar("Semestre: ", $result['semestre']);	
			renderizar("Ativo: ", $result['ativo']);
			
			mostrarImagens($pdo, $idTrabalho, 1, 100);		

			echo("<div class='link-editar'><a href='ativar-galeria.php?idTrabalho=$idTrabalho'>Ativar Galeria</a></div>");			
			echo ("</div>");

			$result=$query->fetch(PDO::FETCH_ASSOC);
		}	
	}else{
		echo "<h1 class='titulo-pagina'>Não foram encontrados Galerias (Trabalhos) desativados/removidos!</h1>";
	}
	
}

function mostrarImagens($pdo, $idTrabalho, $numero, $width){	
	$contador =  0;	
	$query=$pdo->query("SELECT * FROM imagens WHERE idTrabalho = '$idTrabalho'");
	$result=$query->fetch(PDO::FETCH_ASSOC);					
	while($result!=null && $contador<$numero){		
		$srcImagem = "../imgs/trabalhos/".$result['imagem'];			
		echo ("<div class='imagem'><img src='".$srcImagem."' width='$width'/></div>");		
		$result=$query->fetch(PDO::FETCH_ASSOC);
		$contador++;
	}
}

function renderizar($titulo, $dado){
	echo("<div class='slot-dados'>
		<div class='titulo'>".$titulo."</div> 
		<div class='dado'>".$dado."</div>
	</div>");
}