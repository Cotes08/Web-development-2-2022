<!DOCTYPE html>
<?php

include("seguridad.php");

?>
<html>
    <head>
        <title>Buscar cliente</title> 
    </head>
    <body>
        <h2>Buscar cliente</h2>
        <form method="post" action="busqueda_cliente.php" enctype="multipart/form-data">  
        </br>Nombre:
            <input type="text" name="nombre">
        </br></br>Primer apelldio:
            <input type="text" name="apellido1">
        </br></br>Segundo apellido:
            <input type="text" name="apellido2">
        </br></br>Poblacion:
            <input type="text" name="poblacion">
        </br></br>Provincia:
            <input type="text" name="provincia">
        </br></br>Telefono:
            <input type="text" name="telefono">  
        </br></br>
        <a href="menu.php"><input type="button" value ="Volver"></a>
        <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
        <input type = submit value="Buscar Cliente"> 
        <input type = reset value="Borrar">
        
        </form>
    </body>
</html>