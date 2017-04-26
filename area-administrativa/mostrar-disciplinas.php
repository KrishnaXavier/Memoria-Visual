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

	function desativarDisciplina(codigo){
		console.log("desativarDisciplina: "+codigo);
		$.ajax({
			url: 'classes/DesativarDisciplina.php',
			data: {codigo:codigo},			
			type: 'POST',
			success:function(data){								
				if(data!=""){
					$('#aviso').html('Acorreu um erro: <br>'+data);
				}else{
					$('#aviso').html('Disciplina Desativada com Sucesso!');
					setTimeout(
						function(){
							window.location.replace("mostrar-disciplinas");
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

<h1 class='titulo-pagina'>Mostrar Disciplinas</h1>
<div class='conteiner'>
	<div class='disciplinas'>
		<div class='pai-conteiner-menor'>
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
							$query=$pdo->query("SELECT * FROM disciplinas WHERE semestre = $semestre AND ativa = 1");	
							$result=$query->fetch(PDO::FETCH_ASSOC);

							if($semestreDisplay==$semestre){
								$display = 'inline';			
							}else{
								$display = 'none';			
							}		

							echo '<div class="semestre'.$semestre.'-cadeiras cadeiras" style="display:'.$display.';" >';							
							while($result!=null){ 													
								$nome = $result['nomeDisciplina'];
								$codigo = $result['codigo'];
								?>  <div class="slot-cadeira">								
								<div name="cadeiras" class="cadeira" id=""><?php echo ($nome); ?></div> 																		
								<?php botaoEditar($codigo); ?>									
								<button class="btn btn-desativar"onclick="desativarDisciplina(<?php echo "'$codigo'"; ?>)">Desativar Disciplina</button>								
							</div>
							<?php														
							$result=$query->fetch(PDO::FETCH_ASSOC);
						}
						echo '</div>';
					}
				}
				?>
			</div>			
		</div>			
	</div>	

	<div id='avisosMensagens' class='avisos-mensagens'>
		<div class='container-aviso'>				
			<div class='aviso' id='aviso'></div>				
		</div>			
	</div>
</div>

<?php

function botaoEditar($idDisciplina){
	echo "
	<a href='editar-disciplinas.php?idDisciplina=".$idDisciplina."'>
		<button class='btn btn-editar'>Editar</button>
	</a>
	";
}