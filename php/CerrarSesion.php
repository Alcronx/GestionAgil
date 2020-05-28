
<?php
    

    CerrarSesion();
    
    function CerrarSesion() {
            
            session_start (); // inicializa sesión
            $_SESSION = array();
            session_destroy (); // destruir sesión
            echo(true);
                  
    }
?>