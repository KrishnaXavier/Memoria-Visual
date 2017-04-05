<?php 
require "../inc/connect.php";

registrarImagens();

/* Funções */

function registrarImagens(){
	echo "<br>Imagens: <br>";
	if(array_key_exists('fileimagem0', $_FILES)){
		$arrayImagens = [];
		$contadorFiles = 0;    
		
		while(array_key_exists('fileimagem'.$contadorFiles, $_FILES)){
			echo "imagem ".$contadorFiles.": ".$_FILES['fileimagem'.$contadorFiles]['tmp_name']."<br>";
			$arrayImagens[$contadorFiles] = $_FILES['fileimagem'.$contadorFiles];
			//moveUploadImagem($_FILES['fileimagem'.$contadorFiles]);	
			$contadorFiles++;	
		}	

		moveUploadImagens($arrayImagens);
	} 
	
}

function moveUploadImagens($imagens){
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
            		$imagensUpadas[$i] = $pastaSaida.$nome_atual;

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

	echo "<script> srcImagnes = []; ";
	for($k=0; $k<count($imagensUpadas); $k++){
		echo "srcImagnes[".$k."] = '$imagensUpadas[$k]';";
	}
	echo "pegarDadosTrabalho(srcImagnes);</script>";

}

function moveUploadImagem0($imagem){	
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
             	//echo "<img src='".$pastaSaida.$nome_atual."' id='previsualizar'>"; //imprime a foto na tela
            	echo $pasta.$nome_atual.", ";
            }else{
            	echo "Falha ao enviar";
            }
        }else{
        	echo "A imagem deve ser de no máximo 1MB";
        }
    }else{
    	echo "Somente são aceitos arquivos do tipo Imagem";
    }
}
