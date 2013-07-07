$(function() {
$("#modal-subunidades").dialog({
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
$(".escolher-subunidades").click(function() {
$("#modal-subunidades").dialog("open");
});
	  $("#busca-subunidades").keyup(function(){
		if($("#busca-subunidades").val().length>0){
		$.ajax({
			type: "post",
			url: "/subunidades/live_search",
			cache: false,				
			data:'termo='+$("#busca-subunidades").val(),
			success: function(response){
				$('#resultado-subunidades').html("");
				var obj = JSON.parse(response);
				if(obj.length>0){
					try{
						var items=[]; 	
						$.each(obj, function(i,val){

						    items.push($('<tr/>').prepend("<td>" + val.id + "</td><td>" + val.nome + "</td><td>" + val.descricao + "</td><td><button class=\"close\" id=\"" + val.id + "\" nome=\"" + val.nome + "\">selecionar</button></td>"));
						});	
						$('#resultado-subunidades').append.apply($('#resultado-subunidades'), items);

			$(".close").click(function () {

				var subunidade_id = $(this).attr('id');
				var nome = $(this).attr('nome');

                                if(subunidade_id){
					$("#subunidade_id").val(subunidade_id);
					$(".escolher-subunidades").val(nome);
				}
				$('#modal-subunidades').dialog("close");				

			});


					}catch(e) {		
						alert('Exception while request..');
					}		
				}else{
					$('#resultado-subunidades').html($('<tr/>').text("No Data Found"));		
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


