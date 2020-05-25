$(document).ready(function(){
    
    $('#botonLogout').click(function(){
        var ajaxurl = 'php/CerrarSesion.php',
        data =  {'action': 1};
        $.post(ajaxurl, data, function (response) {
            
            console.log(response);
            location.replace("index.php")
        });
    });
});

