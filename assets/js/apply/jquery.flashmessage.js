$(document).ready(function(){
  $("#close-message").click(function(){
    $(".flashmessage").fadeOut();
  });
setTimeout(function(){$(".flashmessage").fadeOut()},3000);
});