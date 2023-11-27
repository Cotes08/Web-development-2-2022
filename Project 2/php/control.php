<?php
    session_start();
    $usuario=$_POST["Usuario"];
    $password=$_POST["Contrasenya"];

    if ($usuario == "user1" and $password == "user1") {
        $_SESSION["autentificado"] = "SI";
        header("Location: menu.php");
    }
    else
    {
        header("Location: login.html");
    }

?>

    