$(function() {
$("#modal-tipos").dialog({
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
$(".escolher-tipos").click(function() {
$("#modal-tipos").dialog("open");
});
	  $("#busca-tipos").keyup(function(){
		if($("#busca-tipos").val().length>0){
		$.ajax({
			type: "post",
			url: "/logradourotipos/live_search",
			cache: false,				
			data:'termo='+$("#busca-tipos").val(),
			success: function(response){
				$('#resultado-tipos').html("");
				var obj = JSON.parse(response);
				if(obj.length>0){
					try{
						var items=[]; 	
						$.each(obj, function(i,val){

						    items.push($('<tr/>').prepend("<td>" + val.id + "</td><td>" + val.nome + "</td><td><button class=\"close\" id=\"" + val.id + "\" nome=\"" + val.nome + "\">selecionar</button></td>"));
						});	
						$('#resultado-tipos').append.apply($('#resultado-tipos'), items);

			$(".close").click(function () {

				var logradourotipo_id = $(this).attr('id');
				var nome = $(this).attr('nome');

                                if(logradourotipo_id){
					$("#logradourotipo_id").val(logradourotipo_id);
					$(".escolher-tipos").val(nome);
				}
				$('#modal-tipos').dialog("close");				

			});


					}catch(e) {		
						alert('Exception while request..');
					}		
				}else{
					$('#resultado-tipos').html($('<tr/>').text("No Data Found"));		
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


