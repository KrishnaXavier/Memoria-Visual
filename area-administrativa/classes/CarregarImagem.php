<?php 
require "../inc/connect.php";
require "../inc/Functions.php";

init();

function init(){
	$dados = [];
	$dados["CONFIG_URL_SITE"] = "http://localhost/memoriavisual/imgs/imagens-carregadas/";
	$dados['imagens'] = pegarImagens();
	echo json_encode($dados);
}

function moveUploadImagens($imagens){ /* retorna um array indexado com os nomes das imagens */
	$imagensUpadas = [];	
	/* diretorio */
	$pasta = "../../imgs/imagens-carregadas/"; //diretorio para salvar/mover a imagem
	$pastaSaida = "../imgs/imagens-carregadas/";

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

        	if($tamanho <= 1000){ //se imagem for até 1MB envia
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

function pegarImagens(){
	if(array_key_exists('fileimagem0', $_FILES)){
		$arrayImagens = [];
		$contadorFiles = 0;    
		
		while(array_key_exists('fileimagem'.$contadorFiles, $_FILES)){			
			$arrayImagens[$contadorFiles] = $_FILES['fileimagem'.$contadorFiles];			
			$contadorFiles++;	
		}	
		$arrayImagens = moveUploadImagens($arrayImagens);
	} 

	return $arrayImagens;	
}