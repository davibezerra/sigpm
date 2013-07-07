$(function() {
$("#modal-logradouros").dialog({
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
$(".escolher-logradouros").click(function() {
$("#modal-logradouros").dialog("open");
});
	  $("#busca-logradouros").keyup(function(){
		if($("#busca-logradouros").val().length>0){
		$.ajax({
			type: "post",
			url: "/logradouros/live_search",
			cache: false,				
			data:'termo='+$("#busca-logradouros").val(),
			success: function(response){
				$('#resultado-logradouros').html("");
				var obj = JSON.parse(response);
				if(obj.length>0){
					try{
						var items=[]; 	
						$.each(obj, function(i,val){

						    items.push($('<tr/>').prepend("<td>" + val.id + "</td><td>" + val.logradourotipo_nome + " " + val.nome + "</td><td>" + val.bairro_nome + "</td><td><button class=\"close\" id=\"" + val.id + "\" nome=\"" + val.nome + "\">selecionar</button></td>"));
						});	
						$('#resultado-logradouros').append.apply($('#resultado-logradouros'), items);

			$(".close").click(function () {

				var logradouro_id = $(this).attr('id');
				var nome = $(this).attr('nome');

                                if(logradouro_id){
					$("#logradouro_id").val(logradouro_id);
					$(".escolher-logradouros").val(nome);
				}
				$('#modal-logradouros').dialog("close");				

			});


					}catch(e) {		
						alert('Exception while request..');
					}		
				}else{
					$('#resultado-logradouros').html($('<tr/>').text("No Data Found"));		
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


