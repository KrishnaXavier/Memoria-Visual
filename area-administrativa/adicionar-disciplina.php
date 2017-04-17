<script type="text/javascript">
	function adicionarDisciplina(){
		let dados = pegarDados();
		console.log(dados);

		var request = $.ajax({
			type: "POST",			
			url: 'classes/AdicionarDisciplina.php',
			data: dados,  							
			success:function(data){					
				$('#aviso').html('Disciplina Adicionada!');
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
	function pegarDados(){
		/* preencher campos automaticos
		let t = 1;
		$('input[name="codigo"]').val("codTeste"+t);
		$('input[name="nome"]').val("codNome"+t);
		$('input[name="semestre"]').val(5);
		$('input[name="emenda"]').val("123_444");
		$('input[name="semanal"]').val(3.5);
		$('input[name="teorica"]').val(100);
		$('input[name="pratica"]').val(60);
		$('input[name="total"]').val(160);
		*/

		let dados = {
			"codigo": $('input[name="codigo"]').val(),
			"nome": $('input[name="nome"]').val(), 
			"semestre": $('input[name="semestre"]').val(), 
			"emenda": $('input[name="emenda"]').val(),		
			"semanal": $('input[name="semanal"]').val(),
			"teorica": $('input[name="teorica"]').val(),
			"pratica": $('input[name="pratica"]').val(),
			"total": $('input[name="total"]').val(),
		}		
		return dados;
	}
</script>
<h1 class='titulo-pagina'>Adicionar Disciplinas (em desenvolvimento)</h1>
<div class='conteiner'>
	<div class='disciplinas'>
		<div class='pai-conteiner-menor'>
			<div class='conteiner-menor'>
				<div class="conteiner-campos" id="">
					<div class="titulo-campo">Código:</div>
					<input type="text" class="" id="codigo" name="codigo" placeholder="DES.005">
				</div>

				<div class="conteiner-campos" id="">
					<div class="titulo-campo">Nome:</div>
					<input type="text" class="" id="nome" name="nome" placeholder="Fundamentos do Design">
				</div>			

				<div class="conteiner-campos" id="">
					<div class="titulo-campo">Semestre:</div>
					<input type="number" class="" id="semestre" name="semestre" placeholder="7">
				</div>			

				<div class="conteiner-campos" id="">
					<div class="titulo-campo">Emenda:</div>
					<input type="text" class="" id="emenda" name="emenda" placeholder="5290_2014_1">
				</div>
			</div>

			<div class='conteiner-menor'>
				<div class="conteiner-campos" id="">
					<div class="titulo-campo">Horas Aulas Semanal:</div>
					<input type="number" class="" id="semanal" name="semanal" placeholder="2.15">
				</div>

				<div class="conteiner-campos" id="">
					<div class="titulo-campo">Carga Horária Teórica:</div>
					<input type="number" class="" id="teorica" name="teorica" placeholder="120">
				</div>

				<div class="conteiner-campos" id="">
					<div class="titulo-campo">Carga Horária Prática:</div>
					<input type="number" class="" id="pratica" name="pratica" placeholder="80">
				</div>

				<div class="conteiner-campos" id="">
					<div class="titulo-campo">Carga Horária Total:</div>
					<input type="number" class="" id="total" name="total" placeholder="200">
				</div>
			</div>				

			<div class="nova-disciplina">
				<button class="btn-adicionar" onclick="adicionarDisciplina()">Adicionar Disciplina</button>
			</div>
		</div>
	</div>
</div>
</div>

<div id='avisosMensagens' class='avisos-mensagens'>
	<div class='container-aviso'>				
		<div class='aviso' id='aviso'></div>				
	</div>			
</div>