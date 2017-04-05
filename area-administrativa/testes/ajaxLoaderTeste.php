<script type="text/javascript">
	$( document ).ajaxStart(function() {
		$( ".log" ).text( "Triggered ajaxStart handler." );
	});
	$( document ).ajaxStart(function() {
		$( ".log2" ).text( "ajaxStart." );
	});

	$( document ).ajaxStop(function() {
		$( ".log3" ).text( "ajaxStop." );
	});

	$( ".trigger" ).click(function() {
		$( ".result" ).load( "teste.html" );
	});
	$( document ).ajaxError(function( event, request, settings ) {
		$( "#msg" ).append( "<li>Error requesting page " + settings.url + "</li>" );
	});

	function a(){
		var request = $.ajax({
			url: 'ajaxLoaderTesteAjax.php',			
			type: 'POST',
			success:function(data){				
				console.log('done');
			},
			beforeSend: function(){     			
				console.log('antes de enviar');
			},
			error: function (){
				console.log('fail');
			}		
		});
	}
</script>
<div class="trigger">Trigger</div>
<div class="result"></div>
<div class="log"></div>
<div class="log2"></div>
<div class="log3"></div>
<button onclick="a();">Ajax</button>