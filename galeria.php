<link rel="stylesheet" type="text/css" href="<?php echo DIR_RAIZ; ?>css/galeria.css">

<script src="<?php echo DIR_RAIZ; ?>js/galeria.js"></script>

<section class="formulario-busca">
	<!-- BUSCA -->
	<form method="post">
		<input type="search" name="query" placeholder="Buscar trabalhos" id="caixa-pesquisa">
		<div id="categorias-pesquisa" class="noDisplay">
			<ul class="nivel2">
				<li>
					<label>
						<input type="radio" name="filtro-ver" id="filtro-ver-disciplinas">
						Ver <strong>Disciplinas</strong>
					</label>
				</li>
				<li>
					<label>
						<input type="radio" name="filtro-ver" id="filtro-ver-semestres">
						Ver <strong>Semestres</strong>
					</label>
				</li>
				<li>
					<label>
						<input type="radio" name="filtro-ver" id="filtro-ver-professores">
						Ver <strong>Professores</strong>
					</label>
				</li>
				<li>
					<label>
						<input type="radio" name="filtro-ver" id="filtro-ver-alunos">
						Ver <strong>Alunos</strong>
					</label>
				</li>
			</ul>
		</div>
		<section id="subcategoria-pesquisa" class="nivel3">
			<div id="filtro-ver-disciplinas">
				<a href="#">Todas</a>
				<a href="#">Disciplina 01</a>
				<a href="#">Disciplina 02</a>
				<a href="#">Disciplina 03</a>
				<a href="#">Disciplina 04</a>
				<a href="#">Disciplina 05</a>
				<a href="#">Disciplina 06</a>
			</div>
			<div id="filtro-ver-semestres">
				<a href="#">Todos</a>
				<a href="#">2010-1</a>
				<a href="#">2010-2</a>
				<a href="#">2011-1</a>
				<a href="#">2011-2</a>
				<a href="#">2012-1</a>
				<a href="#">2012-2</a>
			</div>
		</section>
	</form>
</section>

<main class="conteudo content">
	<h2>Confira o <strong>portifolio dos estudantes</strong></h2>

	<ul class="lista-galerias">
		<?php

		$n_trabalhos = 0;

		$sql_galeria = $pdo->query("SELECT * FROM trabalhos LEFT JOIN imagens USING (idTrabalho) WHERE ativo = 1");
		while($dados_item = $sql_galeria->fetch(PDO::FETCH_ASSOC))
		{
			$n_trabalhos++;

			?>

		<li <?php if($n_trabalhos > 4 and false) echo 'style="display:none;"'; ?>>
			<a href="<?php echo $dados_item['idTrabalho']; ?>">
				<!-- imagem do portifolio -->
				<img src="<?php echo DIR_RAIZ; ?>imgs/trabalhos/<?php echo $dados_item['imagem']; ?>" alt="<?php echo $dados_item['titulo']; ?>">
				<!-- titulo -->
				<span class="titulo"><?php echo $dados_item['titulo']; ?></span>
				<!-- autor -->
				<span>de <strong class="autor"><?php echo $dados_item['autor']; ?></strong></span>
				<!-- Categoria -->
				<a href="#" class="categoria"><?php echo $dados_item['tipo']; ?></a>
			</a>
		</li>

			<?php
		}

		?>
	</ul>

	<div class="mais-portifolios">
		<a href="#" class="botao-carregar">Carregar <strong>mais</strong></a>
	</div>
</main>