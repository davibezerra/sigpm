$(function() {
$("#modal-modulos").dialog({
    autoOpen: false,
    modal: true,
    width: '95%',
    height: 550,
    show: {
        effect: "fade",
        duration: 250
    },
    hide: {
        effect: "fade",
        duration: 250
    }
});

// abre o modal ao clicar no botão
$(".escolher-modulos").click(function() {
$("#modal-modulos").dialog("open");
});
	  $("#busca-modulos").keyup(function(){
		if($("#busca-modulos").val().length>0){
		$.ajax({
			type: "post",
			url: "/sistemamodulos/live_search",
			cache: false,				
			data:'termo='+$("#busca-modulos").val(),
			success: function(response){
				$('#resultado-modulos').html("");
				var obj = JSON.parse(response);
				if(obj.length>0){
					try{
						var items=[]; 	
						$.each(obj, function(i,val){

						    items.push($('<tr/>').prepend("<td>" + val.id + "</td><td>" + val.nome + "</td><td><button class=\"close\" id=\"" + val.id + "\" nome=\"" + val.nome + "\">selecionar</button></td>"));
						});	
						$('#resultado-modulos').append.apply($('#resultado-modulos'), items);

			$(".close").click(function () {

				var sistemamodulo_id = $(this).attr('id');
				var nome = $(this).attr('nome');

                                if(sistemamodulo_id){
					$("#sistemamodulo_id").val(sistemamodulo_id);
					$(".escolher-modulos").val(nome);
				}
				$('#modal-modulos').dialog("close");				

			});


					}catch(e) {		
						alert('Exception while request..');
					}		
				}else{
					$('#resultado-modulos').html($('<tr/>').text("No Data Found"));		
				}		
				
			},
			error: function(){						
				alert('Error while request..');
			}
		});
		}
		return false;
	  });

});


