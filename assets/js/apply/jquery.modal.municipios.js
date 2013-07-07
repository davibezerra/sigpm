$(function() {
$("#modal-municipios").dialog({
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
$(".escolher-municipios").click(function() {
$("#modal-municipios").dialog("open");
});
	  $("#busca-municipios").keyup(function(){
		if($("#busca-municipios").val().length>0){
		$.ajax({
			type: "post",
			url: "/sigpm/municipios/live_search",
			cache: false,				
			data:'termo='+$("#busca-municipios").val(),
			success: function(response){
				$('#resultado-municipios').html("");
				var obj = JSON.parse(response);
				if(obj.length>0){
					try{
						var items=[]; 	
						$.each(obj, function(i,val){

						    items.push($('<tr/>').prepend("<td>" + val.id + "</td><td>" + val.nome + "</td><td><button class=\"close\" id=\"" + val.id + "\" nome=\"" + val.nome + "\">selecionar</button></td>"));
						});	
						$('#resultado-municipios').append.apply($('#resultado-municipios'), items);

			$(".close").click(function () {

				var municipio_id = $(this).attr('id');
				var nome = $(this).attr('nome');

                                if(municipio_id){
					$("#municipio_id").val(municipio_id);
					$(".escolher-municipios").val(nome);
				}
				$('#modal-municipios').dialog("close");				

			});


					}catch(e) {		
						alert('Exception while request..');
					}		
				}else{
					$('#resultado-municipios').html($('<tr/>').text("No Data Found"));		
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


