<?php

require "inc/connect.php";

//
define("DIR_RAIZ", "http://localhost/Memoria-Visual/");

$paginas_permitidas = array('inicio', 'dados-gerais', 'carreira', 'grade-curricular' , 'galeria', 'pesquisa', 'extensao', 'tcc', 'noticias', 'contato');

if(isset($_GET['url']))
{
	$url = explode('/', $_GET['url']);
}
else
{
	$url = "";
}

?>

<link rel='stylesheet' href='<?php echo DIR_RAIZ; ?>css/padrao.css'>

<script src="<?php echo DIR_RAIZ; ?>js/jquery-3.2.0.min.js"></script>

<body>

	<header class="cabecalho">
		<main class="content">
			<div class="logo-if">
				<img src="<?php echo DIR_RAIZ; ?>imgs/fixas/ifsul-pelotas.png">
			</div>
			<div class="logo-design">
				<img src="<?php echo DIR_RAIZ; ?>imgs/fixas/design-bacharelado.png">
			</div>
			<div class="menu-topo">
				<nav>
					<a href="#">Notícias</a> / <a href="#">Contato</a>
				</nav>

				<img src="<?php echo DIR_RAIZ; ?>imgs/fixas/youtube-icon.png" class="logo-youtube">
				<img src="<?php echo DIR_RAIZ; ?>imgs/fixas/facebook-icon.png" class="logo-facebook">
			</div>
		</main>

		<nav class="menu-principal">
			<ul>
				<li>
					<a href="#">Dados gerais</a>
				</li>
				<li>
					<a href="#">Carreira</a>
				</li>
				<li>
					<a href="#">Grade Curricular</a>
				</li>
				<li>
					<a href="galeria">Galeria</a>
				</li>
				<li>
					<a href="#">Produções</a>
				</li>
				<li>
					<a href="#">TCC</a>
				</li>
			</ul>
		</nav>
	</header>

	<section>
		<!-- BANNER TOPO -->

	</section>

	<?php

	if(!isset($_GET['url']) || $url == "")
	{
		include 'inicio.php';
	}
	elseif(in_array($url[0], $paginas_permitidas))
	{
		include $url[0].'.php';
	}
	else
	{
		echo "pagina nao encontrada";
	}

	?>

	<footer class="rodape">
		<div class="content">
			<div>
				<img src="<?php echo DIR_RAIZ; ?>imgs/fixas/logo-if-rodape.png">
			</div>
			<div>
				<ul>
					<li><h2>Acesso Rápido</h2></li>
					<li>
						<a href="#">Informações básicas</a>
					</li>
					<li>
						<a href="#">Corpo Doscente</a>
					</li>
					<li>
						<a href="#">Infraestrutura</a>
					</li>
					<li>
						<a href="#">Equipe</a>
					</li>
					<li>
						<a href="#">Documentos</a>
					</li>
					<li>
						<a href="#">Horários e Monitorias</a>
					</li>
				</ul>
			</div>
			<div>
				<ul>
					<li>Instituto Federal Sul-Riograndense</li>
					<li>
						<address>
							Campus Pelotas<br>
							Praça Vinte de Setembro, 455<br>
							Centro - Pelotas/RS<br>
							CEP 96015-360<br>
							Telefone: 53 2123-1000<br>
							FAX: 53 2123-1006<br>
							<br>
							<a href="#">mapa</a>
						</address>
					</li>
				</ul>
			</div>
			<div>
				<ul id="cd-dados-rodape">
					<li><h2>Coordenadoria do design</h2></li>
					<li>Telefone: +55 53 2123-1028</li>
					<li>
						<address>
							<h2>Reitoria IFSul</h2>
							Rua Gonçalves Chaves, 3218<br>
							Centro - Pelotas/RS - CEP 96015-560<br>
							Telefone: +55 53 3026-6050<br>
							E-mail: reitoria@ifsul.edu.br
						</address>
					</li>
				</ul>
			</div>
		</div>
	</footer>

</body>