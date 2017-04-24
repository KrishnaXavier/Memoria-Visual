<?php
require "../inc/connect.php";
require "../inc/Functions.php";
$titulo = $_POST['titulo'];
$noticia = $_POST['noticia'];


echo "<br>Titulo: ".$titulo;
echo "<br>Noticia: ".$noticia;
$imagem = pegarImagem();
echo "<br>Imagem: ".$imagem;

$query=$pdo->query("INSERT INTO noticias(titulo, noticia, imagem) VALUES ('$titulo', '$noticia', '$imagem')");
echo "<script type='text/javascript'>
        alert('Notifica Salva com Sucesso! Redirecionando...');
        window.location.replace('../');
    </script>";

if(!$query){
	echo "<br>Falha ao Registrar: ";
	print_r($query->errorInfo());
}


/* Funções */

function pegarImagem(){
	e("<br>Imagem: <br>");
	if(array_key_exists('imagem-noticia', $_FILES)){
		$imagem = $_FILES['imagem-noticia'];	
		$imagemUpada = moveUploadImagens($imagem);
	} 

	return $imagemUpada;	
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

        if($tamanho <= 1000){ //se imagem for até 1MB envia
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