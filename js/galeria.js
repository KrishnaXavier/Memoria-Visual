$(document).ready(function() {
	
	var caixaPesquisa = $("#caixa-pesquisa");
	var categoriasPesquisa = $("#categorias-pesquisa");
	var botoesCategoriasPesquisa = $("#categorias-pesquisa > ul > li");

	var subcategoriaAberta = null;

	caixaPesquisa.focus(function(event) {
		
		categoriasPesquisa.fadeIn();

	});

	botoesCategoriasPesquisa.click(function(event) {
		/* Act on the event */
		event.preventDefault();

		$(this).css({
			color: '#000',
			backgroundColor: '#FFF'
		});

		if(subcategoriaAberta != null)
		{
			$("#subcategoria-pesquisa #" + subcategoriaAberta).toggle();
			subcategoriaAberta = null;
		}

		subcategoriaAberta = $(this).children().children()[0].id;

		$("#subcategoria-pesquisa #" + subcategoriaAberta).toggle('slow');
	});

});