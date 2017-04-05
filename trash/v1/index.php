<?php
require "inc/connect.php";
require "inc/head.php";
require "inc/menu.php";
$pages = array('inicio', 'dados-gerais', 'carreira', 'grade-curricular' , 'galeria', 'pesquisa', 'extensao', 'tcc', 'noticias', 'contato', 'painel', 'painel-galeria');

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
