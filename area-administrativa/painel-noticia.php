<script type="text/javascript" src="classes/ckeditor-full/ckeditor.js"></script>
<script type="text/javascript">
    window.onload = function(){
        CKEDITOR.replace( 'noticia' );
    };
</script>
<h1 class='titulo-pagina'>Painel das Noticias</h1>
<div class='conteiner'>
    <div class='painel'>
        <form name="form1" method="post" action="classes/SalvarNoticia.php" enctype="multipart/form-data">        
            
            <div class="conteiner-campos" id="">   
                <div class='titulo-campo'>Titulo:</div>     
                <input type="text" size="40" name="titulo" />             
            </div>    

            <div class='conteiner-campos'>
                <div class='titulo-campo'>Imagem destaque da Noticía:</div>
                <input type="file" name="imagem-noticia" id="imagem-noticia">
            </div>

            <div class="conteiner-campos" id="">                
                <textarea name="noticia" cols="100" rows="20"></textarea>        
            </div>    

            <div class='conteiner-salvar-noticia'>
                <div class="conteiner-campos" id="">                
                    <input type="submit" name="Submit" value="Salvar Noticía" id="btn-salvar" class='btn-principal'/>
                </div>    
            </div>    

        </form>
    </div>
</div>