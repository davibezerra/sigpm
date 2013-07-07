$(function() {
$("#modal-distritos").dialog({
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
$(".escolher-distritos").click(function() {
$("#modal-distritos").dialog("open");
});
	  $("#busca-distritos").keyup(function(){
		if($("#busca-distritos").val().length>0){
		$.ajax({
			type: "post",
			url: "/distritos/live_search",
			cache: false,				
			data:'termo='+$("#busca-distritos").val(),
			success: function(response){
				$('#resultado-distritos').html("");
				var obj = JSON.parse(response);
				if(obj.length>0){
					try{
						var items=[]; 	
						$.each(obj, function(i,val){

						    items.push($('<tr/>').prepend("<td>" + val.id + "</td><td>" + val.nome + "</td><td>" + val.municipio_nome + "</td><td><button class=\"close\" id=\"" + val.id + "\" nome=\"" + val.municipio_nome + " / " + val.nome + "\">selecionar</button></td>"));
						});	
						$('#resultado-distritos').append.apply($('#resultado-distritos'), items);

			$(".close").click(function () {

				var distrito_id = $(this).attr('id');
				var nome = $(this).attr('nome');

                                if(distrito_id){
					$("#distrito_id").val(distrito_id);
					$(".escolher-distritos").val(nome);
				}
				$('#modal-distritos').dialog("close");				

			});
					}catch(e) {		
						alert('Exception while request..');
					}		
				}else{
					$('#resultado-distritos').html($('<tr/>').text("No Data Found"));		
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


