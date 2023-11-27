<!DOCTYPE html>
<?php

include("seguridad.php");

?>
<html>
    <head>
        <title>Nuevo repuesto</title> 
    </head>
    <body>
        <h2>Fromulario de nuevo repuesto</h2>
        <form method="post" action="insert_repuesto.php" enctype="multipart/form-data">  
        </br>Descripcion:
            <input type="text" name="descripcion">
        </br></br>Importe:
            <input type="text" name="importe">
        </br></br>Ganancia:
            <input type="text" name="ganancia">
        </br></br>Fotograf&iacute;a:
            <input type="file" name="foto">
        </br></br>
        <a href="gestion_repuestos.php"><input type="button" value ="Volver"></a>
        <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
        <input type = submit value="Introducir Repuesto"> 
        <input type = reset value="Borrar">
        </form>
    </body>
</html>