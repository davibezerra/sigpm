$(function() {
$("#modal-bairros").dialog({
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
$(".escolher-bairros").click(function() {
$("#modal-bairros").dialog("open");
});
	  $("#busca-bairros").keyup(function(){
		if($("#busca-bairros").val().length>0){
		$.ajax({
			type: "post",
			url: "/bairros/live_search",
			cache: false,				
			data:'termo='+$("#busca-bairros").val(),
			success: function(response){
				$('#resultado-bairros').html("");
				var obj = JSON.parse(response);
				if(obj.length>0){
					try{
						var items=[]; 	
						$.each(obj, function(i,val){

						    items.push($('<tr/>').prepend("<td>" + val.id + "</td><td>" + val.nome + "</td><td>" + val.distrito_nome + "</td><td><button class=\"close\" id=\"" + val.id + "\" nome=\"" + val.nome + "\">selecionar</button></td>"));
						});	
						$('#resultado-bairros').append.apply($('#resultado-bairros'), items);

			$(".close").click(function () {

				var bairro_id = $(this).attr('id');
				var nome = $(this).attr('nome');

                                if(bairro_id){
					$("#bairro_id").val(bairro_id);
					$(".escolher-bairros").val(nome);
				}
				$('#modal-bairros').dialog("close");				

			});


					}catch(e) {		
						alert('Exception while request..');
					}		
				}else{
					$('#resultado-bairros').html($('<tr/>').text("No Data Found"));		
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


