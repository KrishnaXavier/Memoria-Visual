<?php
require "inc/permission.php";
require "inc/head.php";
require "inc/menu.php";
require "inc/connect.php";
require "inc/Functions.php";

if($_GET['idDisciplina']){	
	$idDisciplina = $_GET['idDisciplina'];
	$query=$pdo->query("SELECT * FROM disciplinas WHERE codigo = '$idDisciplina ' AND ativa=1 ");
	$result=$query->fetch(PDO::FETCH_ASSOC);
	$nome = $result['nomeDisciplina'];
	$semanal = $result['horaAulaSemanal'];
	$teorica = $result['cargaHorarioTeoria'];
	$pratica = $result['cargaHorarioPratica'];
	$total = $result['cargaHorarioTotal'];
	$semestre = $result['semestre'];
	$emenda = $result['emenda'];	
}else{
	echo "<h1 class='titulo-pagina'>Disciplina não encontrada";
}
?>
<h1 class='titulo-pagina'>Editar Disciplinas (em desenvolvimento)</h1>
<div class='conteiner'>
	<div class='disciplinas'>
		<div class='pai-conteiner-menor'>
			<div class='conteiner-menor'>

				<form onsubmit="editarDisciplina(); return false;">
					<div class="conteiner-campos" id="">
						<div class="titulo-campo">Código(não pode ser editado):</div>
						<input type="text" class="" id="codigo" name="codigo" placeholder="código único" required value="<?php echo $idDisciplina; ?>">
					</div>

					<input type="hidden" value="<?php echo $idDisciplina; ?>" name="codigoPrimario" >

					<div class="conteiner-campos" id="">
						<div class="titulo-campo">Nome:</div>
						<input type="text" class="" id="nome" name="nome" placeholder="nome da cadeira" required value="<?php echo utf8_encode($nome); ?>">
					</div>			

					<div class="conteiner-campos" id="">
						<div class="titulo-campo">Semestre:</div>
						<input type="number" class="" id="semestre" name="semestre" placeholder="1 ou 2 ou 3..." required value="<?php echo $semestre; ?>">
					</div>			

					<div class="conteiner-campos" id="">
						<div class="titulo-campo">Emenda:</div>
						<input type="text" class="" id="emenda" name="emenda" placeholder="código da emenda" required value="<?php echo $emenda; ?>">
					</div>
				</div>

				<div class='conteiner-menor'>
					<div class="conteiner-campos" id="">
						<div class="titulo-campo">Horas Aulas Semanal:</div>
						<input type="number" class="" id="semanal" name="semanal" placeholder="horas" step="0.01" required value="<?php echo $semanal; ?>">
					</div>

					<div class="conteiner-campos" id="">
						<div class="titulo-campo">Carga Horária Teórica:</div>
						<input type="number" class="" id="teorica" name="teorica" placeholder="horas" step="0.01" required value="<?php echo $teorica; ?>">
					</div>

					<div class="conteiner-campos" id="">
						<div class="titulo-campo">Carga Horária Prática:</div>
						<input type="number" class="" id="pratica" name="pratica" placeholder="horas" step="0.01" required value="<?php echo $pratica; ?>">
					</div>

					<div class="conteiner-campos" id="">
						<div class="titulo-campo">Carga Horária Total:</div>
						<input type="number" class="" id="total" name="total" placeholder="horas" step="0.01" required value="<?php echo $total; ?>">
					</div>
				</div>				

				<div class="nova-disciplina">
					<input type="submit" class="btn-adicionar" onsubmit="" value="Confirmar Edição">
				</div>
			</form>
			
		</div>
	</div>
</div>
</div>

<div id='avisosMensagens' class='avisos-mensagens'>
	<div class='container-aviso'>				
		<div class='aviso' id='aviso'></div>				
	</div>			
</div>

<script type="text/javascript">
	function editarDisciplina(){
		let dados = pegarDados();
		console.log(dados);

		var request = $.ajax({
			type: "POST",			
			url: 'classes/EditarDisciplina.php',
			data: dados,  							
			success:function(data){								
				if(data!=""){
					$('#aviso').html('Acorreu um erro: <br>'+data);
				}else{
					$('#aviso').html('Disciplina Editada com Sucesso!');
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
	function pegarDados(){
		let dados = {
			"codigoPrimario": $('input[name="codigoPrimario"]').val(),
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