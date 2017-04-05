<?php
require "inc/connect.php";
contruirHTML($pdo, 1);

function contruirHTML($pdo, $semestreDisplay){		
	for($semestre=1; $semestre<=8; $semestre++){
		$query=$pdo->query("SELECT * FROM disciplinas WHERE semestre = $semestre");	
		$result=$query->fetch(PDO::FETCH_ASSOC);
		
		if($semestreDisplay==$semestre){
			$display = 'inline';
		}else{
			$display = 'none';
		}		

		//echo '<div class="semestre'.$semestre.'-cadeiras" style="display:'.$display.';">';
		//echo '<div class="semestre1-cadeiras"/>';
		while($result!=null){ 		
			$nomehtmlespecial = htmlspecialchars($result['nomeDisciplina']);
			$nomeutf8 = utf8_encode ($result['nomeDisciplina']);
			echo "<br> nome: ".$result['nomeDisciplina'];
			echo "<br>nomehtmlespecial da disciplina: ".$nomehtmlespecial;
			echo "<br>nome utf8 da disciplina: ".$nomeutf8;

			$codigo = $result['codigo'];
			
			//echo '<input type="checkbox" value="'.$codigo.'" name="cadeiras"/>'.$nome.' <br>';
			$result=$query->fetch(PDO::FETCH_ASSOC);
		}
		echo '</div>';
	}

}
?>