$("#boton").on("click", function(){
    var posicion = $("#boton").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 2000); 
});