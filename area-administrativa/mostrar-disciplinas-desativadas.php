<h1 class='titulo-pagina'>Disciplinas Desativadas (em Desenvolvimento...)</h1>
<?php 
echo ("<div class='conteiner-mostrar-galerias'>");
mostrar($pdo);
echo ("</div>");

function mostrar($pdo){	
	$query=$pdo->query("SELECT * FROM disciplinas WHERE ativa = 0");
	$numResultados = $query->rowCount();
	if($numResultados>0){
		$result=$query->fetch(PDO::FETCH_ASSOC);	
		while($result!=null){
			$codigo = $result['codigo'];	
			
			echo ("<div class='slot-galeria'>");
			renderizar("Identificação da Disciplina: ", $codigo);		
			renderizar("Nome: ", $result['nomeDisciplina']);
			renderizar("Semestre: ", $result['semestre']);
			renderizar("Emenda: ", $result['emenda']);									

			echo("<div class='link-editar'><a href='ativar-disciplinas.php?codigo=$codigo'>Ativar Disciplina</a></div>");			
			echo ("</div>");

			$result=$query->fetch(PDO::FETCH_ASSOC);
		}	
	}else{
		echo "<h1 class='titulo-pagina'>Não foram encontrados Disciplinas desativados/removidos!</h1>";
	}

}

function renderizar($titulo, $dado){
	echo("<div class='slot-dados'>
		<div class='titulo'>".$titulo."</div> 
		<div class='dado'>".$dado."</div>
	</div>");
}

?>