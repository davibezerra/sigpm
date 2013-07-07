$(function() {
$("#modal-unidades").dialog({
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
$(".escolher-unidades").click(function() {
$("#modal-unidades").dialog("open");
});
	  $("#busca-unidades").keyup(function(){
		if($("#busca-unidades").val().length>0){
		$.ajax({
			type: "post",
			url: "/unidades/live_search",
			cache: false,				
			data:'termo='+$("#busca-unidades").val(),
			success: function(response){
				$('#resultado-unidades').html("");
				var obj = JSON.parse(response);
				if(obj.length>0){
					try{
						var items=[]; 	
						$.each(obj, function(i,val){

						    items.push($('<tr/>').prepend("<td>" + val.id + "</td><td>" + val.nome + "</td><td>" + val.descricao + "</td><td><button class=\"close\" id=\"" + val.id + "\" nome=\"" + val.nome + "\">selecionar</button></td>"));
						});	
						$('#resultado-unidades').append.apply($('#resultado-unidades'), items);

			$(".close").click(function () {

				var unidade_id = $(this).attr('id');
				var nome = $(this).attr('nome');

                                if(unidade_id){
					$("#unidade_id").val(unidade_id);
					$(".escolher-unidades").val(nome);
				}
				$('#modal-unidades').dialog("close");				

			});


					}catch(e) {		
						alert('Exception while request..');
					}		
				}else{
					$('#resultado-unidades').html($('<tr/>').text("No Data Found"));		
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


