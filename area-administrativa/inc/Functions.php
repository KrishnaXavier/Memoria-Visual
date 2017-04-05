<?php

/* Funções de Redução */
function e($str){
	echo ("<br>".$str);
}

function sprt($data){
	foreach ($data as $key => $value) {
		$data[$key] = addslashes($data[$key]);	
		$data[$key] = preg_replace('/[^[:alnum:]_]@/', '',$data[$key]);	
		$data[$key] = htmlspecialchars($data[$key]);
	}
	return $data;
}