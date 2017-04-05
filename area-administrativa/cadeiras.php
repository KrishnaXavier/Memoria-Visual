<?php
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