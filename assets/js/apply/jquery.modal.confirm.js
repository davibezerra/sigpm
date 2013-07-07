$(function() {

            $("#dialog-confirm").hide();

            $("#confirma").click(function(){

		$( "#dialog-confirm" ).dialog({
			resizable: false,
			width:600,
			height:200,
			modal: true,
			buttons: {
				"Confirmar Solicitação": function() {
					$( this ).dialog( "close" );
                                        $("form").submit();
				},
				"Quero desistir": function() {
					$( this ).dialog( "close" );
				}
			}
		});
	});

     });