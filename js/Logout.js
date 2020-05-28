$(document).ready(function(){
    
    $('#botonLogout').click(function(){
        var ajaxurl = 'php/CerrarSesion.php',
        data =  {'action': 1};
        $.post(ajaxurl, data, function (response) {
            
            if(response){
            console.log(response);
            document.cookie = "PHPSESSID=;Path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT;";
            location.replace("index.php")
            }
        });
    });
});

