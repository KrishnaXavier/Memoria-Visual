<!--
EXEMPLO DE UPLOAD DE IMAGEM COM AJAX

EX1:
http://pt.stackoverflow.com/questions/130422/upload-de-imagem-com-jquery

EX2:
http://www.devmedia.com.br/upload-de-imagens-sem-dar-refresh-utilizando-php-e-jquery/22190

SQL, Retorna o id do ultimo insert:
INSERT INTO `users` (`name`, `email`, `password`) 
VALUES ('user', 'user@gmail.com', 'user')
SELECT @@IDENTITY

Proximo passo: as imagens já estão sendo upadas corretamente, os SRCs da imagens estão retornando corretamento por echo <script> no SalverImagem_teste.php,
o proximo passado e enviar os SRCs para o RegistrarTrabalho.php para salvar nas tabelas correspondentes

Ajxa com imagens + dados extras
https://laracasts.com/discuss/channels/requests/upload-image-with-ajax?page=1
-->

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

	function enviarImagens(){
		data = new FormData();
		contadorFiles = 0;
		while($('#fileimagem')[0].files[contadorFiles] != null){
			data.append('fileimagem'+contadorFiles, $('#fileimagem')[0].files[contadorFiles++]);
		}

		$.ajax({
			url: 'classes/SalvarImagem_teste.php',
			data: data,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(data) 
			{					
				$('#alerta').html(data);															
			}
		});							
	}

	function pegarDadosTrabalho(srcImagnes){		
		var semestre = $('input[name="semestre"]:checked').val();// pega o valor do radio do semestre
		var cadeiras = $('input[name="cadeiras"]:checked').map(function(){ return $(this).val(); }).get(); //pegar dados dos checkboxes, retorna um array
		var autor = $('input[name="autor"]').val();
		var titulo = $('input[name="titulo"]').val();
		var dataConclusao = $('input[name="data"]').val(); //retornar YYYY/MM/DD
		var tipo = $('input[name="tipo"]').val();
		//var dados = {'semestre':semestre, 'cadeiras':cadeiras, 'autor':autor, 'titulo':titulo, 'data':dataConclusao, 'tipo':tipo};		

		$.ajax({
			url: 'classes/RegistrarTrabalho.php',
			data: {semestre:semestre, cadeiras:cadeiras, autor:autor, titulo:titulo, dataConclusao:dataConclusao, tipo:tipo, srcImagnes:srcImagnes},			
			type: 'POST',
			success: function(data) 
			{					
				$('#alerta').html(data);
			}
		});				
	}

</script>

<h1> Painel de criação de Galeria</h1>

<div class='painel'>

	<div class='semestre conteiner-campos' id=''>
		Semestre de conclusão do trabalho:
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
		Cadeira(s): 
		<br>
		<?php include'cadeiras.php'; ?>
	</div>

	<div class='autor conteiner-campos' id=''>
		Autor(nome do aluno): <input type='text' class='' id='autor' name='autor' placeholder='nome do aluno'/>
	</div>

	<div class='titulo-trabalho conteiner-campos' id=''>
		Título do Trabalho: <input type='text' class='' id='titulo' name='titulo' placeholder='nome do trabalho'/>
	</div>

	<div class='data-conclusao conteiner-campos' id=''>
		Data de conslusão do trabalho: <input type='date' class='' id='data' name='data'/>
	</div>

	<div class='tipo conteiner-campos' id=''>
		Tipo: <input type='' class='' id='tipo' name='tipo' placeholder='Estudos Volumétricos'/>
	</div>	

	<div class='conteiner-campos' id=''>
		<h1> Imagens </h1>
		<form enctype="multipart/form-data">
			<input type="file" name="fileimagem" id="fileimagem" multiple="true"/>			
		</form>
	</div>

	<div class='conteiner-campos' id=''>
		<button onclick="pegarDadosTrabalho()">Confirmar Dados</button>
	</div>

	<div class='conteiner-campos' id=''>
		<divl class='alertas' id='alerta'></divl>
	</div>

</div>
