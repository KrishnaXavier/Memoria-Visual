<?php
require "../inc/connect.php";

$titulo = $_POST['titulo'];
$noticia = $_POST['noticia'];


echo "Titulo: ".$titulo;
echo "<br>Noticia: ".$noticia;