<?php 
require "../inc/connect.php";
require "../inc/Functions.php";
e('@EditarTrabalho.php');
e("Dados:<br>");
registrarTrabalho($pdo, pegarDadosGET(), pegarImagens());

/* Funções */

function moverImagensLixo($imagem){
}

function moveUploadImagens($imagens){ /* retorna um array indexado com os nomes das imagens */
	$imagensUpadas = [];
	/* diretorio */
	$pasta = "../../imgs/trabalhos/"; //diretorio para salvar/mover a imagem
	$pastaSaida = "../imgs/trabalhos/";

	/* formatos de imagem permitidos */
	$permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");

	for($i=0; $i<count($imagens); $i++){
		$imagem = $imagens[$i];
		$nome_imagem = $imagem['name'];
		$tamanho_imagem = $imagem['size'];	
		$ext = strtolower(strrchr($nome_imagem,"."));

		if(in_array($ext,$permitidos)){

			/* converte o tamanho para KB */
			$tamanho = round($tamanho_imagem / 1024);

        	if($tamanho <= 500){ //se imagem for até 1MB envia
            	$nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
            	$tmp = $imagem['tmp_name']; //caminho temporário da imagem

            	/* se enviar a foto, insere o nome da foto no banco de dados */
            	if(move_uploaded_file($tmp,$pasta.$nome_atual)){            
             		echo "<img src='".$pastaSaida.$nome_atual."' id='previsualizar' width='200px'>"; //imprime a foto na tela            		
             		$imagensUpadas[$i] = $nome_atual;

             	}else{
             		echo "Falha ao enviar";
             		exit;
             	}
             }else{
             	echo "A imagem deve ser de no máximo 1MB";
             	exit;
             }
         }else{
         	echo "Somente são aceitos arquivos do tipo Imagem";
         	exit;
         }
     }

     return $imagensUpadas;
}

function pegarDadosGET(){
 	$dados = [];

 	e("Identificação do Trabalho: ");
 	if(isset($_GET['idTrabalho'])){	
 		$dados['idTrabalho'] = $_GET['idTrabalho'];
 		e($dados['idTrabalho']);
 	}


 	e("Semestre: ");
 	if(isset($_GET['semestre'])){	
 		$dados['semestre'] = $_GET['semestre'];
 		e($dados['semestre']);
 	}

 	e("Cadeiras: "); 	
 	$arrayCadeiras = [];
 	$contadorCadeiras = 0;
 	if(isset($_GET['cadeira0'])){
 		while(isset($_GET['cadeira'.$contadorCadeiras]) ){
 			e($_GET['cadeira'.$contadorCadeiras].", ");
 			$arrayCadeiras[$contadorCadeiras] = $_GET['cadeira'.$contadorCadeiras];	
 			$contadorCadeiras++;	
 		} 		 		
 		$dados['cadeiras'] = array($arrayCadeiras); /* exemplo de como acessar o array: $dados['cadeiras'][0][0] pega o primeiro elemento */ 		
 	}

 	e("ID das Imagens que devem ser removidas: "); 	
 	$arrayRemoverImagens = [];
 	$contadorRemoverImagens = 0;
 	if(isset($_GET['revimg0'])){
 		while(isset($_GET['revimg'.$contadorRemoverImagens]) ){
 			e($_GET['revimg'.$contadorRemoverImagens].", ");
 			$arrayRemoverImagens[$contadorRemoverImagens] = $_GET['revimg'.$contadorRemoverImagens];	
 			$contadorRemoverImagens++;	
 		} 		 		
 		$dados['revimg'] = array($arrayRemoverImagens); /* exemplo de como acessar o array: $dados['revimg'][0][0] pega o primeiro elemento */ 		
 	}


 	e("Autor: ");	
 	if(isset($_GET['autor'])){
 		$dados['autor'] = $_GET['autor'];
 		e($dados['autor']);
 	}

 	e("Titulo: ");
 	if(isset($_GET['titulo'])){
 		$dados['titulo'] = $_GET['titulo'];
 		e($dados['titulo']);
 	}

 	e("Data de Conclusão: ");
	if(isset($_GET['dataConclusao'])){ //formato da data: Y-m-d
		$dados['data'] = $_GET['dataConclusao'];
		e($dados['data']);
	}

	e("Tipo: ");
	if(isset($_GET['tipo'])){
		$dados['tipo'] = $_GET['tipo'];
		e($dados['tipo']);
	}		

	return $dados;	
}

function pegarImagens(){
	e("Imagens novas da Galeria: <br>");
	if(array_key_exists('fileimagem0', $_FILES)){
		$arrayImagens = [];
		$contadorFiles = 0;    
		
		while(array_key_exists('fileimagem'.$contadorFiles, $_FILES)){
			e("imagem ".$contadorFiles.": ".$_FILES['fileimagem'.$contadorFiles]['tmp_name']."<br>");
			$arrayImagens[$contadorFiles] = $_FILES['fileimagem'.$contadorFiles];			
			$contadorFiles++;	
		}	
		$arrayImagens = moveUploadImagens($arrayImagens);
		return $arrayImagens;	
	}else{
		e("Nem uma nova imagem foi adicionada");
		return false;
	} 	
}

function registrarTrabalho($pdo, $dados, $imagens){	
	/*1º query da tabela trabalho, são os dados gerias */
	e("1º query, dados gerais: ");	
	$query=$pdo->query("UPDATE trabalhos SET autor = '".$dados['autor']."', tipo = '".$dados['tipo']."', tituloTrabalho = '".$dados['titulo']."' WHERE idTrabalho = '".$dados['idTrabalho']."' ");
	

	/* 2º query da tabela diciplinas_trabalhos */		
	e("2º query, disciplinas_trabalhos: ");	
	/* 2ºquery pt 1, limpa todas as colunas que tenham o idTrabalho, para depois inserir todas como novas */
	$query=$pdo->query("DELETE FROM diciplinas_trabalhos WHERE idTrabalho = '".$dados['idTrabalho']."' ");

	/* 2ºquery pt 2, insere todas as colunas que tenham o idTrabalho */
	$contadorCadeiras = 0;
	while( isset($dados['cadeiras'][0][$contadorCadeiras]) ){
		e("Cadeira ".$contadorCadeiras.": ".$dados['cadeiras'][0][$contadorCadeiras]);
		$codCadeira = $dados['cadeiras'][0][$contadorCadeiras];
		$query=$pdo->query("INSERT INTO diciplinas_trabalhos(codigo, idTrabalho) VALUES ('".$codCadeira."', '".$dados['idTrabalho']."')");
		$contadorCadeiras++;
	}

	e("AVISO: preciso fazer os querys das imagens");
	e("3º Query, imagens: ");
	if(isset($_GET['revimg0'])){
		/* query e movimentação das imagens que devem ser removidas */
	}	
	if(array_key_exists('fileimagem0', $_FILES)){
		/* query para adicionar novas imagens */
	}	

	
}