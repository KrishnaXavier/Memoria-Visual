<script type="text/javascript">	
	$(document).ready(function(){ //windows.onload

		//Adiciona um evento aos radios com nome de semestre, pega o valor selecionado no radio para visibiliar as cadeiras correspondentes a quele semestre
		$('input:radio[name="semestre"]').change(function() {			
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
		$.ajax({
			url: 'classes/SalvarTrabalho.php'+urlGet,
			data: imagens,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(data) 
			{					
				$('#alerta').html(data);															
			}
		});		
	}
</script>

<h1 class='titulo-pagina'> Painel de criação de Galeria</h1>

<div class='conteiner'>
	<div class='painel'>
		<div class='pai-conteiner-menor'>
			<div class='conteiner-menor'>
				<div class='semestre conteiner-campos' id=''>
					<div class='titulo-campo'>Semestre de conclusão do trabalho:</div>
					<input type="radio" name="semestre" value="1" checked="true">1º 
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
					<?php include'cadeiras.php'; ?>
				</div>
			</div>

			<div class='conteiner-menor'>
				<div class='autor conteiner-campos' id=''>
					<div class='titulo-campo'>Autor(nome do aluno):</div>
					<input type='text' class='' id='autor' name='autor' placeholder='nome do aluno'/>
				</div>

				<div class='titulo-trabalho conteiner-campos' id=''>
					<div class='titulo-campo'>Título do Trabalho:</div>
					<input type='text' class='' id='titulo' name='titulo' placeholder='nome do trabalho'/>
				</div>

				<div class='data-conclusao conteiner-campos' id=''>
					<div class='titulo-campo'>Data de conslusão do trabalho:</div>
					<input type='date' class='' id='data' name='data'/>
				</div>

				<div class='tipo conteiner-campos' id=''>
					<div class='titulo-campo'>Tipo:</div>
					<input type='' class='' id='tipo' name='tipo' placeholder='Estudos Volumétricos'/>
				</div>	
			</div>
		</div>

		<div class='conteiner-imagens'>
			<div class='conteiner-campos' id=''>
				<div class='titulo-campo'>Imagens </div>				
				<form enctype="multipart/form-data">
					<input type="file" name="fileimagem" id="fileimagem" multiple="true"/>			
				</form>
				Aviso: selecione todas as imagens do trabalho
			</div>
		</div>

		<div class='conteiner-salvar-trabalho'>
			<div class='conteiner-campos' id=''>
				<button onclick="registrarTrabalho()" class='btn-salvar-trabalho'>Salvar Trabalho</button>
			</div>
		</div>

		<div class='conteiner-campos' id=''>
			<divl class='alertas' id='alerta'></divl>
		</div>

	</div>
</div>
