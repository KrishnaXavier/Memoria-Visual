<?php
require "inc/permission.php";
require "inc/connect.php";
require "inc/head.php";
require "inc/menu.php";
require "inc/Functions.php";
$pages = array(
	'galeria', 'painel-galeria', 'editar-galeria', 'mostrar-galerias', 'mostrar-galerias-desativadas', 
	'noticia', 'painel-noticia', 'editar-noticia', 'mostrar-noticias', 
	'documentos', 'carregar-imagem', 
	'disciplinas', 'editar-disciplinas', 'adicionar-disciplina', 'mostrar-disciplinas-desativadas', 'mostrar-disciplinas',
	'login'
	);

$url = (isset($_GET['url'])) ? $_GET['url']:'inicio.php';
$url = array_filter(explode('/',$url));
$file = $url[0].'.php';


if(count($url)>1){	
	//header('Location: http://www.google.com/');		
}else{
	if(is_file($file)){       
		if(in_array($url[0], $pages)){  		
			include $file;
		}else{    				
			include 'inicio.php';  
		}        
	}else{		
		include 'inicio.php';  
	}
}
