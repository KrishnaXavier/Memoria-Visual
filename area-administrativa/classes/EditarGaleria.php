<?php 
require "../inc/connect.php";
require "../inc/Functions.php";

registrarTrabalho($pdo, pegarDadosGET(), pegarImagens());

/* Funções */

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
             		$imagensUpadas[$i] = $nome_atual;

             	}else{
             		$imagensUpadas['erros'][] = "Falha ao enviar";             		
             	}
             }else{
             	$imagensUpadas['erros'][] = "A imagem deve ser de no maximo 1MB";             	
             }
         }else{
         	$imagensUpadas['erros'][] = "Somente são aceitos arquivos do tipo Imagem";         	
         }
     }

     return $imagensUpadas;
}

function pegarDadosGET(){
 	$dados = [];

 	if(isset($_GET['idTrabalho'])){	
 		$dados['idTrabalho'] = $_GET['idTrabalho']; 		
 	}
 	
 	if(isset($_GET['semestre'])){	
 		$dados['semestre'] = $_GET['semestre']; 	
 	}
 	
 	$arrayCadeiras = [];
 	$contadorCadeiras = 0;
 	if(isset($_GET['cadeira0'])){
 		while(isset($_GET['cadeira'.$contadorCadeiras]) ){ 			
 			$arrayCadeiras[$contadorCadeiras] = $_GET['cadeira'.$contadorCadeiras];	 			
 			$contadorCadeiras++;	
 		} 		 		
 		$dados['cadeiras'] = array($arrayCadeiras); /* exemplo de como acessar o array: $dados['cadeiras'][0][0] pega o primeiro elemento */ 		
 	}
 	
 	$arrayRemoverImagens = [];
 	$contadorRemoverImagens = 0;
 	if(isset($_GET['revimg0'])){
 		while(isset($_GET['revimg'.$contadorRemoverImagens]) ){
 			$imagemRemovida = $_GET['revimg'.$contadorRemoverImagens]; 			 			
 			$arrayRemoverImagens[$contadorRemoverImagens] = $imagemRemovida;	 			 		
 			$contadorRemoverImagens++;	
 		} 		 		
 		$dados['revimg'] = array($arrayRemoverImagens); /* exemplo de como acessar o array: $dados['revimg'][0][0] pega o primeiro elemento */ 		
 	}
 
 	if(isset($_GET['autor'])){
 		$dados['autor'] = $_GET['autor']; 		
 	}

 	if(isset($_GET['titulo'])){
 		$dados['titulo'] = $_GET['titulo']; 		
 	}

	if(isset($_GET['dataConclusao'])){ //formato da data: Y-m-d
		$dados['data'] = $_GET['dataConclusao'];		
	}

	if(isset($_GET['tipo'])){
		$dados['tipo'] = $_GET['tipo'];		
	}		

	return $dados;	
}

function pegarImagens(){
	if(array_key_exists('fileimagem0', $_FILES)){
		$arrayImagens = [];
		$contadorFiles = 0;    
		
		while(array_key_exists('fileimagem'.$contadorFiles, $_FILES)){			
			$arrayImagens[$contadorFiles] = $_FILES['fileimagem'.$contadorFiles];			
			$contadorFiles++;	
		}	
		$arrayImagens = moveUploadImagens($arrayImagens);
		return $arrayImagens;	
	}else{		
		return false;
	} 	
}

function registrarTrabalho($pdo, $dados, $imagens){
	$dados["imagens"] = $imagens;
	/*1º query da tabela trabalho, são os dados gerias */	
	$query=$pdo->query("UPDATE trabalhos SET autor = '".$dados['autor']."', tipo = '".$dados['tipo']."', tituloTrabalho = '".$dados['titulo']."' WHERE idTrabalho = '".$dados['idTrabalho']."' ");
	
	/* 2º query da tabela diciplinas_trabalhos */			
	/* 2ºquery pt 1, limpa todas as colunas que tenham o idTrabalho, para depois inserir todas como novas */
	$query=$pdo->query("DELETE FROM diciplinas_trabalhos WHERE idTrabalho = '".$dados['idTrabalho']."' ");

	/* 2ºquery pt 2, insere todas as colunas que tenham o idTrabalho */
	$contadorCadeiras = 0;
	while( isset($dados['cadeiras'][0][$contadorCadeiras]) ){				
		$codCadeira = $dados['cadeiras'][0][$contadorCadeiras];
		$query=$pdo->query("INSERT INTO diciplinas_trabalhos(codigo, idTrabalho) VALUES ('".$codCadeira."', '".$dados['idTrabalho']."')");
		$contadorCadeiras++;
	}
	
	/* 3º Query, imagens removidas: */
	$contadorRemoverImagens = 0;
	while( isset($dados['revimg'][0][$contadorRemoverImagens]) ){
		$idImagemRemovida = $dados['revimg'][0][$contadorRemoverImagens];						
		removerMoverImagem($idImagemRemovida, $dados['idTrabalho'], $pdo);
		$contadorRemoverImagens++;
	}
	
	/* 4º Query, imagens novas: */
	/* Salvando Imagens Novas da Geleria */
	$contadorImagens = 0;	
	while(isset($imagens[$contadorImagens]) ){		
		$imagem = $imagens[$contadorImagens];		
		$query=$pdo->query("INSERT INTO imagens(data, imagem, titulo, idTrabalho) VALUES ('".$dados['data']."', '$imagem', '".$dados['titulo']."', '".$dados['idTrabalho']."')");	
		$contadorImagens++;
	}
	echo json_encode($dados);			
}

function removerMoverImagem($idImagem, $idTrabalho, $pdo){
	/* Para remover a imagem da tabela só precisa mudar a coluna ativa para 0 */
	$query=$pdo->query("UPDATE imagens SET ativa = 0 WHERE idTrabalho = '".$idTrabalho."' AND idImagem = '".$idImagem."' ");

	$query=$pdo->query("SELECT * FROM imagens WHERE idImagem = '".$idImagem."' ");
	$result = $query->fetch(PDO::FETCH_ASSOC);
	$imagem = $result['imagem'];

	//movendo imagem para o diretorio lixo 
	$dirDestino = "../../imgs/trabalhos/desativas/";
	$origem = "../../imgs/trabalhos/".$imagem;		
	if(rename($origem, $dirDestino.$imagem)){  
		$dados["movimento-imagens"] = "Imagem ".$imagem." movida com sucesso para ".$dirDestino;		
	}else{
		$dados["movimento-imagens"] = "Erro ao mover a imagem: ".$imagem;		
	}
}