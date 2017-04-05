<?php 
require "../inc/connect.php";
echo "Dados:<br>";
pegarDadosGET($pdo);
pegarImagens();	

/* Funções */

function moveUploadImagens($imagens){ /* retorna um array indexado com os nomes das imagens */
	$imagensUpadas = [];
	/* diretorio */
	$pasta = "../imgs/trabalhos/";
	$pastaSaida = "imgs/trabalhos/";

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
             		echo "<img src='".$pastaSaida.$nome_atual."' id='previsualizar'>"; //imprime a foto na tela            		
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

 function pegarDadosGET($pdo){
 	$dados = [];

 	echo "<br>Semestre: ";
 	if(isset($_GET['semestre'])){	
 		$dados['semestre'] = $_GET['semestre'];
 		echo "Semestre: ".$dados['semestre'];
 	}

 	echo "<br>Cadeiras: "; 	
 	$arrayCadeiras = [];
 	$contadorCadeiras = 0;
 	if(isset($_GET['cadeira0'])){
 		while(isset($_GET['cadeira'.$contadorCadeiras]) ){
 			echo $_GET['cadeira'.$contadorCadeiras].", ";
 			$arrayCadeiras[$contadorCadeiras] = $_GET['cadeira'.$contadorCadeiras];	
 			$contadorCadeiras++;	
 		} 		 		
 		$dados['cadeiras'] = array($arrayCadeiras); /* exemplo de como acessar o array: $dados['cadeiras'][0][0] pega o primeiro elemento */ 		
 	}

 	echo "<br>Autor: ";	
 	if(isset($_GET['autor'])){
 		$dados['autor'] = $_GET['autor'];
 		echo $dados['autor'];
 	}

 	echo "<br>Titulo: ";
 	if(isset($_GET['titulo'])){
 		$dados['titulo'] = $_GET['titulo'];
 		echo $dados['titulo'];
 	}

 	echo "<br> Data de Conclusão: ";
	if(isset($_GET['dataConclusao'])){ //formato da data: Y-m-d
		$dados['dataConclusao'] = $_GET['dataConclusao'];
		echo $dados['dataConclusao'];
	}

	echo "<br>Tipo: ";
	if(isset($_GET['tipo'])){
		$dados['tipo'] = $_GET['tipo'];
		echo $dados['tipo'];
	}		

	return $dados;
	//registrarTrabalho($pdo, $semestre, $arrayCadeiras, $autor, $titulo, $dataConclusao, $tipo);
}

function pegarImagens(){
	echo "<br>Imagens: <br>";
	if(array_key_exists('fileimagem0', $_FILES)){
		$arrayImagens = [];
		$contadorFiles = 0;    
		
		while(array_key_exists('fileimagem'.$contadorFiles, $_FILES)){
			echo "imagem ".$contadorFiles.": ".$_FILES['fileimagem'.$contadorFiles]['tmp_name']."<br>";
			$arrayImagens[$contadorFiles] = $_FILES['fileimagem'.$contadorFiles];			
			$contadorFiles++;	
		}	
		moveUploadImagens($arrayImagens);
	} 	
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

