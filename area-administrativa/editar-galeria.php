<?php
require "inc/head.php";
require "inc/menu.php";
require "inc/connect.php";
require "inc/Functions.php";

$idTrabalho = $_GET['idTrabalho'];
$query=$pdo->query("SELECT * FROM trabalhos WHERE idTrabalho = '$idTrabalho' ");
$result=$query->fetch(PDO::FETCH_ASSOC);

/* Dados Gerais, tabela trabalhos */
$autor = $result['autor'];
$data = $result['data'];
$semestre = $result['semestre'];
$titulo = $result['tituloTrabalho'];
$tipo = $result['tipo'];

$query=$pdo->query("SELECT * FROM imagens WHERE idTrabalho = '$idTrabalho' AND ativa = 1");
$result=$query->fetch(PDO::FETCH_ASSOC);
while($result!=null){
	$arrayImagens[] = $result['imagem'];
	$arrayIdImagens[] = $result['idImagem'];
	$result=$query->fetch(PDO::FETCH_ASSOC);
}
?>
<script type="text/javascript">	
	$(document).ready(function(){ //windows.onload

		//Adiciona um evento aos radios com nome de semestre, pega o valor selecionado no radio para visibiliar as cadeiras correspondentes a quele semestre
		$('input:radio[name="semestre"]').change(function() {			
			var value =  $( this ).val();				
			displayCadeiras(value);
		});

		contadorRemoverImagens = 0;
		arrayRemoverImagens = [];

	});

	function displayCadeiras(semestre){
		var contadorSemestres = 1;
		while(contadorSemestres<=8){
			$('.semestre'+contadorSemestres+'-cadeiras').css("display","none");
			contadorSemestres++;
		}

		$('.semestre'+semestre+'-cadeiras').css("display","initial");
	}

	function registrarTrabalho(){
		/* pegando dados dos inputs */
		var semestre = $('input[name="semestre"]:checked').val(); /* pega o valor do radio do semestre */
		var autor = $('input[name="autor"]').val();
		var titulo = $('input[name="titulo"]').val();
		var dataConclusao = $('input[name="data"]').val(); /* retornar YYYY/MM/DD */
		var tipo = $('input[name="tipo"]').val();		
		var cadeiras = $('input[name="cadeiras"]:checked').map(function(){ return $(this).val(); }).get(); /* pega dados dos checkboxes, retorna um array */
		
		/* contruindo url do GET para cadeiras*/
		var contadorCadeiras = 0;
		var urlGetCadeiras = '';
		while(cadeiras[contadorCadeiras]!=null){
			urlGetCadeiras += '&cadeira'+contadorCadeiras+'='+cadeiras[contadorCadeiras++];			
		}

		/* contruindo url do GET para os IDs da imagens que vão ser removidas */
		var urlGetRemoverImagens = '';
		contadorRemoverImagens = 0;
		while(arrayRemoverImagens[contadorRemoverImagens]!=null){
			urlGetRemoverImagens += '&revimg'+contadorRemoverImagens+'='+arrayRemoverImagens[contadorRemoverImagens++];			
		}

		/* contruindo url do GET */
		var urlGet = '?';	
		urlGet += 'semestre='+semestre
		+'&autor='+autor
		+'&titulo='+titulo
		+'&dataConclusao='+dataConclusao
		+'&tipo='+tipo
		+'&idTrabalho='+<?php echo $idTrabalho?>
		+urlGetCadeiras
		+urlGetRemoverImagens;
		console.log('@Dev, URL do GET: '+urlGet);			

		/* pegando as imagens*/
		var imagens = new FormData();
		var contadorFiles = 0;
		while($('#fileimagem')[0].files[contadorFiles] != null){
			imagens.append('fileimagem'+contadorFiles, $('#fileimagem')[0].files[contadorFiles++]);
		}	

		/* Ajax */
		$.ajax({
			url: 'classes/EditarGaleria.php'+urlGet,
			data: imagens,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(data) 
			{					
				console.log('done');			
				var infs = JSON.parse(data);
				console.log(JSON.stringify(infs));			
				
				var htmlAviso = '';
				if(infs.hasOwnProperty('erros')){
					htmlAviso += '<br>Erro: '+infs['erros'];
					$('#aviso').html(htmlAviso);
					setTimeout(
						function(){
							$('#avisosMensagens').hide('slow');
						},
						4500
						);					
					$("#salvarGaleria").prop("disabled",false);
				}
				if(infs['imagens'].hasOwnProperty('erros')){
					htmlAviso += '<br>Erro: '+infs['imagens']['erros'];
					$('#aviso').html(htmlAviso);
					setTimeout(
						function(){
							$('#avisosMensagens').hide('slow');
						},
						4500
						);					
					$("#salvarGaleria").prop("disabled",false);
				}
				else{
					$('#aviso').html('Edição feita com sucesso!');
					$('#avisosMensagens').hide('slow');	
					setTimeout(
						function(){
							location.reload();	
						},
						2500
						);				
				}						
			},
			beforeSend: function(){     
				console.log('antes de enviar');
				$('#aviso').html('Carregando...Aguarde');				
				$('#avisosMensagens').show();				
			},
			error: function (){
				console.log('fail');
				$('#aviso').html('Ocorreu algum erro, tente de novo');
				$('#avisosMensagens').hide('slow');
				$("#salvarGaleria").prop("disabled",false);
			}																			
		});


	}

	function removerImagem(img){
		arrayRemoverImagens[contadorRemoverImagens++] = img.id;		
		c("Imagem com id "+img.id+" foi removida");
		img.remove();		
	}

	function desativarGaleria(){
		console.log("@removerTrabalho");
		$.ajax({
			url: 'classes/DesativarGaleria.php',
			data: {idTrabalho:<?php echo $idTrabalho?>},			
			type: 'POST',
			success: function(data) 
			{					
				console.log('done');			
				var infs = JSON.parse(data);
				console.log(JSON.stringify(infs));			
				
				var htmlAviso = '';						
				$('#aviso').html('Galeria desativa com sucesso!');
				$('#avisosMensagens').hide('slow');	
				setTimeout(
					function(){
						location.reload();	
					},
					2500
					);								
			},
			beforeSend: function(){     
				console.log('antes de enviar');
				$('#aviso').html('Carregando...Aguarde');				
				$('#avisosMensagens').show();				
			},
			error: function (){
				console.log('fail');
				$('#aviso').html('Ocorreu algum erro, tente de novo');
				$('#avisosMensagens').hide('slow');
				$("#salvarGaleria").prop("disabled",false);
			}																								
		});		
	}


	/* Funções de Redução */

	function c(txt){
		console.log(txt);
	}

</script>

<h1 class='titulo-pagina'> Painel Edição de Galeria</h1>

<div class='conteiner'>
	<div class='painel'>
		<div class='pai-conteiner-menor'>
			<div class='conteiner-menor'>
				<div class='semestre conteiner-campos' id=''>
					<div class='titulo-campo'>Semestre de conclusão do trabalho:</div>
					<?php 				
					for($i=1; $i<=8; $i++){							
						if($i==$semestre){
							$checked = 'checked="$checked"';
						}else{
							$checked = '';
						}										

						echo ("<input type='radio' name='semestre'  $checked value='$i'>$i º");										
					}
					?>			
				</div>

				<div class='cadeiras conteiner-campos' id=''>
					<div class='titulo-campo'>Cadeira(s):</div>					
					<?php 					
					contruirHTMLCadeiras($pdo, $semestre, $idTrabalho);

					function contruirHTMLCadeiras($pdo, $semestreDisplay, $idTrabalho){
						$query=$pdo->query("SELECT * FROM diciplinas_trabalhos WHERE  idTrabalho = $idTrabalho");
						$result=$query->fetch(PDO::FETCH_ASSOC);
						while($result!=null){
							$arrayCodDisciplinas[] = $result['codigo'];							
							$result=$query->fetch(PDO::FETCH_ASSOC);							
						}

						for($semestre=1; $semestre<=8; $semestre++){
							$query=$pdo->query("SELECT * FROM disciplinas WHERE semestre = $semestre");	
							$result=$query->fetch(PDO::FETCH_ASSOC);

							if($semestreDisplay==$semestre){
								$display = 'inline';			
							}else{
								$display = 'none';			
							}		

							echo '<div class="semestre'.$semestre.'-cadeiras" style="display:'.$display.';" >';	
							while($result!=null){ 					
								$nome_utf8_enc = utf8_encode ($result['nomeDisciplina']);			
								$codigo = $result['codigo'];								

								if(in_array($codigo, $arrayCodDisciplinas)){
									$checked = 'checked="true"';
								}else{
									$checked = '';
								}

								echo '<input type="checkbox" value="'.$codigo.'" name="cadeiras" '.$checked.'/>'.$nome_utf8_enc.' <br>';
								$result=$query->fetch(PDO::FETCH_ASSOC);
							}
							echo '</div>';
						}

					}

					?>
				</div>
			</div>

			<div class='conteiner-menor'>
				<div class='autor conteiner-campos' id=''>
					<div class='titulo-campo'>Autor(nome do aluno):</div>
					<input type='text' class='' id='autor' name='autor' placeholder='nome do aluno' value="<?php echo $autor; ?>" />
				</div>

				<div class='titulo-trabalho conteiner-campos' id=''>
					<div class='titulo-campo'>Título do Trabalho:</div>
					<input type='text' class='' id='titulo' name='titulo' placeholder='nome do trabalho' value="<?php echo $titulo; ?>" />
				</div>

				<div class='data-conclusao conteiner-campos' id=''>
					<div class='titulo-campo'>Data de conslusão do trabalho:</div>
					<input type='date' class='' id='data' name='data' value="<?php echo $data; ?>"/>
				</div>

				<div class='tipo conteiner-campos' id=''>
					<div class='titulo-campo'>Tipo:</div>
					<input type='' class='' id='tipo' name='tipo' placeholder='Estudos Volumétricos' value="<?php echo $tipo; ?>" />
				</div>	
			</div>
		</div>

		<div class='conteiner-imagens'>
			<div class='conteiner-campos' id=''>
				<div class='titulo-campo'>Adicionar novas Imagens a Galeria</div>				
				<form enctype="multipart/form-data">
					<input type="file" name="fileimagem" id="fileimagem" multiple="true"/>			
				</form>
				Aviso: selecione todas as imagens do trabalho
			</div>
		</div>

		<div class='conteiner-imagens'>
			<div class='conteiner-campos' id=''>
				<div class='titulo-campo'>Clique nas imagens para remover da Galeria</div>	
				<div cass='conteiner-remover-imagem'>
					<?php 
					$diretorioImagens = '../imgs/trabalhos/';
					foreach ($arrayImagens as $key => $value) {					
						echo ("<img src='".$diretorioImagens.$value."' class='remover-imagens' id='".$arrayIdImagens[$key]."' height='180px' onclick='removerImagem(this)'/>");					
					}
					?>			
				</div>				
			</div>
		</div>



		<div class='conteiner-salvar-trabalho'>
			<div class='conteiner-campos' id=''>
				<button onclick="registrarTrabalho()" class='btn-principal'>Confirmar Edição da Galeria</button>
			</div>
		</div>

		<div class='conteiner-deletar-trabalho'>
			<div class='conteiner-campos' id=''>
				<button onclick="desativarGaleria()" class='btn-principal deletar-trabalho'>Desativar Trabalho</button>
			</div>
		</div>

		<div class='conteiner-campos' id=''>
			<divl class='alertas' id='alerta'></divl>
		</div>

	</div>
</div>

<div class='conteiner-campos' id=''>
	<divl class='alertas' id='alerta'></div>
	</div>

	<div id='avisosMensagens' class='avisos-mensagens'>
		<div class='container-aviso'>				
			<dvi class='aviso' id='aviso'></div>				
			</div>			
		</div>

	</div>	
</div>