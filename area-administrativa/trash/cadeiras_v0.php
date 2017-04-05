<?php
require "inc/connect.php";


function contruirHTML($pdo, $semestreDisplay){	
	for($semestre=1; $semestre<=8; $semestre++){
		$query=$pdo->query("SELECT * FROM disciplinas WHERE semestre = $semestre");	
		$result=$query->fetch(PDO::FETCH_ASSOC);
		
		if($semestreDisplay==$semestre){
			$display = 'initial';
		}else{
			$display = 'none';
		}

		?><div class='semestre$semestre-cadeiras' style='display: <?php echo $display?>;'><?php
		while($result!=null){ 		
			$nome = $result['nomeDisciplina'];
			$codigo = $result['codigo'];

			?><input type='checkbox' value='<?php echo $codigo; ?>' name='cadeiras'/> <?php echo $nome; ?> <br> <?php
			$result=$query->fetch(PDO::FETCH_ASSOC);
		}
		?></div><?php
	}

}
?>