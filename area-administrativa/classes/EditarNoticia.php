<?php
require "../inc/connect.php";
require "../inc/Functions.php";
e("Fazendo...");
$titulo = $_POST['titulo'];
$noticia = $_POST['noticia'];
$idNoticia = $_POST['idNoticia'];

$imagemNova = pegarImagem();
if($imagemNova){	
	$query=$pdo->query("SELECT * FROM noticias WHERE idNoticia = '".$idNoticia."' ");
	$result=$query->fetch(PDO::FETCH_ASSOC);
	$imagemAntiga = $result['imagem'];
	removerMoverImagem($imagemAntiga);	
	$query=$pdo->query("UPDATE  noticias SET noticia = '".$noticia."', titulo = '".$titulo."', imagem = '".$imagemNova."' WHERE idNoticia = '".$idNoticia."' ");	
	echo "<script type='text/javascript'>
		alert('Notifica Editada com Sucesso! Redirecionando...');
		window.location.replace('../');
	</script>";
	

}else{	
	$query=$pdo->query("UPDATE noticias SET noticia = '".$noticia."', titulo = '".$titulo."' WHERE idNoticia = '".$idNoticia."' ");	
	echo "<script type='text/javascript'>
		alert('Notifica Editada com Sucesso! Redirecionando...');
		window.location.replace('../');
	</script>";
}

function pegarImagem(){
	e("<br>Imagem: <br>");
	if(array_key_exists('imagem-noticia', $_FILES) && $_FILES['imagem-noticia']['name']){
		$imagem = $_FILES['imagem-noticia'];	
		$imagemUpada = moveUploadImagens($imagem);
		return $imagemUpada;	
	}else{
		return false;
	} 

	
}

function moveUploadImagens($imagem){ /* retorna um array indexado com os nomes das imagens */
	$imagensUpadas = [];
	
	/* diretorio */
	$pasta = "../../imgs/noticias/"; /* diretorio onde vão ficar salvas */
	$pastaSaida = "../../imgs/noticias/";

	/* formatos de imagem permitidos */
	$permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");

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
             	e("<img src='".$pastaSaida.$nome_atual."' id='previsualizar'>"); //imprime a foto na tela            		
             	$imagemUpada = $nome_atual;

             }
             else{
             	echo "Falha ao enviar";
             	exit;
             }

         }
         else{
         	echo "A imagem deve ser de no máximo 1MB";
         	exit;
         }
     }
     else{
     	echo "Somente são aceitos arquivos do tipo Imagem";
     	exit;
     }     

     return $imagemUpada;
}

function removerMoverImagem($imagem){
	//movendo imagem para o diretorio lixo 
	$dirDestino = "../../imgs/noticias/desativas/";
	$origem = "../../imgs/noticias/".$imagem;		
	if(rename($origem, $dirDestino.$imagem)){  
		e("Imagem ".$imagem." movida com sucesso para ".$dirDestino);
	}else{
		e("Erro ao mover a imagem: ".$imagem);
	}
}