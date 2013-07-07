$(function() {
$("#modal-categorias").dialog({
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
$(".escolher-categorias").click(function() {
$("#modal-categorias").dialog("open");
});
	  $("#busca-categorias").keyup(function(){
		if($("#busca-categorias").val().length>0){
		$.ajax({
			type: "post",
			url: "/acaocategorias/live_search",
			cache: false,				
			data:'termo='+$("#busca-categorias").val(),
			success: function(response){
				$('#resultado-categorias').html("");
				var obj = JSON.parse(response);
				if(obj.length>0){
					try{
						var items=[]; 	
						$.each(obj, function(i,val){

						    items.push($('<tr/>').prepend("<td>" + val.id + "</td><td>" + val.nome + "</td><td><button class=\"close\" id=\"" + val.id + "\" nome=\"" + val.nome + "\">selecionar</button></td>"));
						});	
						$('#resultado-categorias').append.apply($('#resultado-categorias'), items);

			$(".close").click(function () {

				var acaocategoria_id = $(this).attr('id');
				var nome = $(this).attr('nome');

                                if(acaocategoria_id){
					$("#acaocategoria_id").val(acaocategoria_id);
					$(".escolher-categorias").val(nome);
				}
				$('#modal-categorias').dialog("close");				

			});


					}catch(e) {		
						alert('Exception while request..');
					}		
				}else{
					$('#resultado-categorias').html($('<tr/>').text("No Data Found"));		
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


