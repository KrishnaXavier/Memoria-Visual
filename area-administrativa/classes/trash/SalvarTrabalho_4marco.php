<?php 
require "../inc/connect.php";
require "../inc/Functions.php";
e("Dados:<br>");
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
	e("Imagens: <br>");
	if(array_key_exists('fileimagem0', $_FILES)){
		$arrayImagens = [];
		$contadorFiles = 0;    
		
		while(array_key_exists('fileimagem'.$contadorFiles, $_FILES)){
			e("imagem ".$contadorFiles.": ".$_FILES['fileimagem'.$contadorFiles]['tmp_name']."<br>");
			$arrayImagens[$contadorFiles] = $_FILES['fileimagem'.$contadorFiles];			
			$contadorFiles++;	
		}	
		$arrayImagens = moveUploadImagens($arrayImagens);
	} 

	return $arrayImagens;	
}

function registrarTrabalho($pdo, $dados, $imagens){
	$query=$pdo->query("INSERT INTO trabalhos(autor, data, tipo, tituloTrabalho, semestre) VALUES ('".$dados['autor']."', '".$dados['data']."', '".$dados['tipo']."', '".$dados['titulo']."', '".$dados['semestre']."' )");	
	$ultimoIdTrabalho = $pdo->lastInsertId();	
	
	$contadorImagens = 0;	
	while(isset($imagens[$contadorImagens]) ){
		e("Imagem: ".$imagens[$contadorImagens]);
		
		$imagem = $imagens[$contadorImagens];
		
		$query=$pdo->query("INSERT INTO imagens(data, imagem, titulo, idTrabalho) VALUES ('".$dados['data']."', '$imagem', '".$dados['titulo']."', '$ultimoIdTrabalho')");	

		$contadorImagens++;
	}	
	e("<br>ID do ultimo inserido: ".$ultimoIdTrabalho);
		
	$contadorCadeiras = 0;
	while( isset($dados['cadeiras'][0][$contadorCadeiras]) ){
		e("Cadeira ".$contadorCadeiras.": ".$dados['cadeiras'][0][$contadorCadeiras]);
		$codCadeira = $dados['cadeiras'][0][$contadorCadeiras];
		$query=$pdo->query("INSERT INTO diciplinas_trabalhos(codigo, idTrabalho) VALUES ('".$codCadeira."', '".$ultimoIdTrabalho."')");
		$contadorCadeiras++;
	}	
}