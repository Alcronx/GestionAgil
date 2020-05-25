
<?php
    session_start();

    CerrarSesion();
    
    function CerrarSesion() {
        session_unset(); 
        // destroy the session 
        session_destroy();
        echo("Desconectado");
    }
?>