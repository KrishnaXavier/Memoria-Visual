<script type="text/javascript">	
	$(document).ready(function(){ //windows.onload
		
		$('input:radio[name="semestre"]').change(function() { /* adiciona um evento aos radios com nome de semestre, pega o valor selecionado no radio para visibiliar as cadeiras correspondentes a quele semestre */
			var value =  $( this ).val();				
			displayCadeiras(value);
		});

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
		/* desativando butão de salvar galeria, até a galeria ser salva, para evitar que a mesma galeria seja salva 2x seguidas */
		$("#salvarGaleria").prop("disabled",true);	
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

		/* contruindo url do GET */
		var urlGet = '?';	
		urlGet += 'semestre='+semestre
		+'&autor='+autor
		+'&titulo='+titulo
		+'&dataConclusao='+dataConclusao
		+'&tipo='+tipo
		+urlGetCadeiras;
		console.log('@Dev, URL do GET: '+urlGet);			

		/* pegando as imagens*/
		var imagens = new FormData();
		var contadorFiles = 0;
		while($('#fileimagem')[0].files[contadorFiles] != null){
			imagens.append('fileimagem'+contadorFiles, $('#fileimagem')[0].files[contadorFiles++]);
		}	

		/* Ajax */
		var request = $.ajax({
			url: 'classes/SalvarGaleria.php'+urlGet,
			data: imagens,
			processData: false,
			contentType: false,
			type: 'POST',
			success:function(data){				
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
					$('#aviso').html('Galeria Salva!');
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
</script>

<h1 class='titulo-pagina'> Painel de criação de Galeria</h1>

<div class='conteiner'>
	<div class='painel'>
		<div class='pai-conteiner-menor'>

			<form enctype="multipart/form-data" onsubmit="registrarTrabalho(); return false;">
				<div class='conteiner-menor'>				
					<div class='semestre conteiner-campos' id=''>
						<div class='titulo-campo'>Semestre de conclusão do trabalho:</div>
						<input type="radio" name="semestre" value="1">1º 
						<input type="radio" name="semestre" value="2">2º
						<input type="radio" name="semestre" value="3">3º
						<input type="radio" name="semestre" value="4">4º 
						<input type="radio" name="semestre" value="5">5º
						<input type="radio" name="semestre" value="6">6º
						<input type="radio" name="semestre" value="7">7º 
						<input type="radio" name="semestre" value="8">8º  		
					</div>

					<div class='cadeiras conteiner-campos' id=''>
						<div class='titulo-campo'>Cadeira(s):</div>															
						<?php						
						contruirHTMLCadeiras($pdo, 1); 

						function contruirHTMLCadeiras($pdo, $semestreDisplay){		
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
									echo '<input type="checkbox" value="'.$codigo.'" name="cadeiras"/>'.$nome_utf8_enc.' <br>';
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
						<input type='text' class='' id='autor' name='autor' placeholder='nome do aluno' required/>
					</div>

					<div class='titulo-trabalho conteiner-campos' id=''>
						<div class='titulo-campo'>Título do Trabalho:</div>
						<input type='text' class='' id='titulo' name='titulo' placeholder='nome do trabalho' required/>
					</div>

					<div class='data-conclusao conteiner-campos' id=''>
						<div class='titulo-campo'>Data de conslusão do trabalho:</div>
						<input type='date' class='' id='data' name='data'/>
					</div>

					<div class='tipo conteiner-campos' id=''>
						<div class='titulo-campo'>Tipo:</div>
						<input type='' class='' id='tipo' name='tipo' placeholder='Estudos Volumétricos' required/>
					</div>	
				</div>			

				<div class='conteiner-imagens'>
					<div class='conteiner-campos' id=''>
						<div class='titulo-campo'>Imagens </div>				

						<input type="file" name="fileimagem" id="fileimagem" multiple="true" required/>			
						<div>Aviso: selecione todas as imagens do trabalho</div>
					</div>
				</div>

				<div class='conteiner-salvar-trabalho'>
					<div class='conteiner-campos' id=''>
						<input type="submit" class='btn-principal' id='salvarGaleria' value="Salvar Galeria"/>
					</div>
				</div>

			</form>

			<div id='avisosMensagens' class='avisos-mensagens'>
				<div class='container-aviso'>				
					<div class='aviso' id='aviso'></div>				
				</div>			
			</div>

		</div>	
	</div>

<!--
t = 1;
$('input[name="autor"]').val("codTeste"+t);
$('input[name="titulo"]').val("codTeste"+t);
$('input[name="tipo"]').val("codTeste"+t);
$('input[name="data"]').val("2000-01-01");
-->