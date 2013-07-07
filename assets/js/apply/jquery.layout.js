$(function() {
    
    $("input, a, button").button();
    
    $("#buscar").click(function(event){
        if($("#termo").val().length==0){
        alert('erro');
        event.preventDefault();
        }
    });
    
    $('#termo').focusin(function(){
        $(this).animate({
            width: 350
        }, 300 )        
    });    
   
});
