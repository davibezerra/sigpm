$(function() {
$("#modal-estados").dialog({
    autoOpen: false,
    modal: true,
    width: '80%',
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
$(".escolher-estados").click(function() {
$("#modal-estados").dialog("open");
});
	  $("#busca-estados").keyup(function(){
		if($("#busca-estados").val().length>0){
		$.ajax({
			type: "post",
			url: "/sigpm/estados/live_search",
			cache: false,				
			data:'termo='+$("#busca-estados").val(),
			success: function(response){
				$('#resultado-estados').html("");
				var obj = JSON.parse(response);
				if(obj.length>0){
					try{
						var items=[]; 	
						$.each(obj, function(i,val){

						    items.push($('<tr/>').prepend("<td>" + val.id + "</td><td>" + val.nome + "</td><td><button class=\"close\" id=\"" + val.id + "\" nome=\"" + val.nome + "\">selecionar</button></td>"));
						});	
						$('#resultado-estados').append.apply($('#resultado-estados'), items);

			$(".close").click(function () {

				var estado_id = $(this).attr('id');
				var nome = $(this).attr('nome');

                                if(estado_id){
					$("#estado_id").val(estado_id);
					$(".escolher-estados").val(nome);
				}
				$('#modal-estados').dialog("close");				

			});


					}catch(e) {		
						alert('Exception while request..');
					}		
				}else{
					$('#resultado-estados').html($('<tr/>').text("No Data Found"));		
				}		
				
			},
			error: function(){
 				alert('URL não encontrada');
			}
		});
		}
		return false;
	  });

});


