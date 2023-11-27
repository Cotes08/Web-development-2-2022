<?php
    //Inicio sesion
    session_start();

    //Comprueba si el usuario esta autentificado
    if ($_SESSION["autentificado"] == "SI") {
        
    }
    else
    {
        //si no existe, envio a la pagina de autentificacion
        
        header("Location: login.html");
    }
?>    