<script type="text/javascript">
	window.onload = function(){
		$("input[type='text']").on("click", function () {
			$(this).select();
		});
	}
	
	function carregarImagem(){
		console.log("carregarImagem()");
		var imagens = pegarImagens();
		console.log("Imagem: "+imagens);

		var request = $.ajax({
			url: 'classes/CarregarImagem.php',
			data: imagens,
			processData: false,
			contentType: false,
			type: 'POST',
			success:function(data){				
				console.log('done');				
				var infs = JSON.parse(data);
				console.log(JSON.stringify(infs));			

				var htmlAviso = '';		
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
					$('#aviso').html('Imagem Carregada!');
					$('#avisosMensagens').hide('slow');
					var urlSite = window.location.href.replace("area-administrativa/carregar-imagem", "");				
					urlImagem = urlSite+"imgs/imagens-carregadas/"+infs["imagens"];
					$('#urlImagem').val(urlImagem);
					$("#imagemCarregada").attr("src", urlImagem);
					$(".conteiner-url-imagem").show();
					
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

	function pegarImagens(){
		var imagens = new FormData();
		var contadorFiles = 0;
		while($('#fileimagem')[0].files[contadorFiles] != null){
			imagens.append('fileimagem'+contadorFiles, $('#fileimagem')[0].files[contadorFiles++]);
		}	

		return imagens;
	}
</script>
<h1 class='titulo-pagina'>Carregar Imagens</h1>
<div class='conteiner carregar-imagem'>
	<div class='painel-menor'>

		<form enctype="multipart/form-data">
			<input type="file" name="fileimagem" id="fileimagem" multiple="false" accept="image/*"/>			
		</form>

		<div class='conteiner-carregar-imagem'>
			<div class='conteiner-campos' id=''>
				<button onclick="carregarImagem()" class='btn-carregar-imagem' id='carregarImagem'>Carregar imagem</button>
			</div>
		</div>	

		<div class='conteiner-url-imagem' id='' >
			<div class='titulo-campo'>Copie o URL da imagem:</div>
			<input type='text' class='' id='urlImagem' placeholder='link da imagem carrega'/>
			<img src="" width="80%" id="imagemCarregada"/>
		</div>		

	</div>
</div>


<!-- Caixa de Avisos -->
<div id='avisosMensagens' class='avisos-mensagens'>
	<div class='container-aviso'>				
		<dvi class='aviso' id='aviso'></div>				
		</div>			
	</div>

</div>	