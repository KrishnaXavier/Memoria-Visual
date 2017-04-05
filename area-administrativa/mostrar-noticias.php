<?php
echo ("<div class='conteiner-mostrar-noticias'>");
mostrarNoticias($pdo);
echo ("</div>");

/* Funções */
function mostrarNoticias($pdo){
	$query=$pdo->query("SELECT * FROM noticias");
	$result=$query->fetch(PDO::FETCH_ASSOC);
	while($result!=null){
		echo ("<div class='slot-noticia'>");
			$idNoticia = $result['idNoticia'];	
			renderizar("Identificação da Noticia: ", $idNoticia);
			renderizar("Titulo: ", $result['titulo']);
			renderizar("Corpo da Noticia: ", $result['noticia']);		
				
			$width = 100;
			$srcImagem = "../imgs/noticias/".$result['imagem'];				
			echo ("<div class='imagem'><img src='".$srcImagem."' width='$width'/></div>");					
			echo("<div class='link-editar'><a href='editar-noticia.php?idNoticia=$idNoticia'>Editar</a></div>");
		echo ("</div>");
		$result=$query->fetch(PDO::FETCH_ASSOC);		
	}
}

function renderizar($titulo, $dado){
	echo("<div class='slot-dados'>
		<div class='titulo'>".$titulo."</div>
		<div class='dado'>".$dado."</div>
	</div>");
}