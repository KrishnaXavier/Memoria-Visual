<?php
require "inc/permission.php";
require "inc/head.php";
require "inc/menu.php";
require "inc/connect.php";
require "inc/Functions.php";

$idNoticia = $_GET['idNoticia'];
$query=$pdo->query("SELECT * FROM noticias WHERE idNoticia = '$idNoticia' ");
$result=$query->fetch(PDO::FETCH_ASSOC);

/* Dados Gerais, tabela trabalhos */
$titulo = $result['titulo'];
$corpoNoticia = $result['noticia'];
$imagem = $result['imagem'];	
?>

<script type="text/javascript" src="classes/ckeditor-full/ckeditor.js"></script>
<script type="text/javascript">
	window.onload = function(){
		CKEDITOR.replace( 'noticia' );
	};
</script>
<h1 class='titulo-pagina'>Painel das Noticias</h1>
<div class='conteiner'>
	<div class='painel'>
		<form name="form1" method="post" action="classes/EditarNoticia.php" enctype="multipart/form-data">        

			<div class="conteiner-campos" id="">   
				<div class='titulo-campo'>Titulo:</div>     
				<input type="text" size="40" name="titulo" value="<?php echo $titulo?>" required>
			</div>                

			<div class="conteiner-campos" id="">                
				<textarea name="noticia" cols="100" rows="20" required> <?php echo $corpoNoticia?> </textarea>        
			</div>  			

			<div class='conteiner-campos'>
				<div class='titulo-campo'>Mudar Imagem destaque da Noticía:</div>
				<input type="file" name="imagem-noticia" id="imagem-noticia">
				<br>
				<?php 
				$width = 300;
				$srcImagem = "../imgs/noticias/".$imagem;				
				echo ("<br><img src='".$srcImagem."' width='$width'/>");
				?>
			</div>

			<input type="hidden" name="idNoticia" value=<?php echo ($idNoticia) ?>></input>

			<div class='conteiner-salvar-noticia'>
				<div class="conteiner-campos" id="">                
					<input type="submit" name="Submit" value="Editar Noticía" id="btn-editar" class='btn-principal'/>
				</div>    
			</div>    

		</form>
	</div>
</div>