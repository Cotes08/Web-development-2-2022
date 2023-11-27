<!DOCTYPE html>
<?php

include("seguridad.php");
?>
<html>
    <head>
        <title>Nuevo cliente</title> 
    </head>
    <body>
        <h2>Fromulario de nuevo cliente</h2>
        <form method="post" action="insert_cliente.php" enctype="multipart/form-data">  
        </br> DNI:
            <input type="text" name="dni">
        </br></br>Nombre:
            <input type="text" name="nombre">
        </br></br>Primer apelldio:
            <input type="text" name="apellido1">
        </br></br>Segundo apellido:
            <input type="text" name="apellido2">
        </br></br>Direccion:
            <input type="text" name="direccion">
        </br></br>C.P:
            <input type="text" name="CP">
        </br></br>Poblacion:
            <input type="text" name="poblacion">
        </br></br>Provincia:
            <input type="text" name="provincia">
        </br></br>Telefono:
            <input type="text" name="telefono">  
        </br></br>Email:
            <input type="text" name="email">
        </br></br>Fotograf&iacute;a:
            <input type="file" name="foto">
        </br></br>
        <a href="gestion_clientes.php"><input type="button" value ="Volver"></a>
        <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
        <input type = submit value="Introducir Cliente"> 
        <input type = reset value="Borrar">
        
        </form>
    </body>
</html>