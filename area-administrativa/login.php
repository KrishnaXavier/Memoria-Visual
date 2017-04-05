<?php 
require "inc/head.php"; 
require "inc/Functions.php";
require "inc/connect.php";
?>
<h1 class='titulo-pagina'>Login</h1>
<form action = '#' method = 'post' >
	<div class='container-login'>
		<div class='slot-campos'>
			<input type='text' class='login' required='' placeholder='usuário' name='usuario'></inpupt>
		</div>
		<div class='slot-campos'>
			<input type='email' class='login' required='' placeholder='usuario@email.com' name='email'></inpupt>
		</div>
		<div class='slot-campos'>
			<input type='password' class='pass' required='' placeholder='senha' name='senha'></input>
		</div>	
		<div class='slot-campos'>
			<button class='btn-principal btn-login' type='submit' name='entrar'>Entrar</button>
		</div>
	</div>
</form>

<center>
	<div class='alerta'>
		<?php    		      
		if (isset($_POST['entrar']))
		{
			$_POST = sprt($_POST);
			$usuario = $_POST['usuario'];
			$senha = $_POST['senha'];
			$email = $_POST['email'];

			$query = $pdo->query("SELECT * FROM usuarios WHERE usuario = '$usuario' and senha = '$senha' and email = '$email' ");			
			$result = $query->fetch(PDO::FETCH_ASSOC);   						
			echo $query->rowCount();			

			if($query->rowCount() >0)
			{            
				session_start();
				$_SESSION = sprt($_SESSION);
				$_SESSION['email']=$email;
				$_SESSION['usuario']=$usuario;
				$_SESSION['idUsuario']=$result['idUsuario'];								
				header('Location: inicio');
				exit; 
			}

			else
			{                        
				echo "Usuário ou senha invalido(s)";
			}
		}
		?>
	</div>
</center>


