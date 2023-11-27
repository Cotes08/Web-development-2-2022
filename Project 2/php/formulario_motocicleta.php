<!DOCTYPE html>
<?php

include("seguridad.php");
include ("conexionPDO.php");

?>
<html>
    <head>
        <title>Nueva motocicleta</title> 
    </head>
    <body>
        <h2>Fromulario nueva motocicleta</h2>
        <form method="post" action="insert_motocicleta.php" enctype="multipart/form-data">  
        </br> Matricula:
            <input type="text" name="matricula">
        </br></br>Marca:
            <input type="text" name="marca">
        </br></br>Modelo:
            <input type="text" name="modelo">
        </br></br>A&ntilde;o:
            <input type="text" name="anyo">
        </br></br>Color:
            <input type="text" name="color">
        </br></br>Id Cliente:
            <?php
                echo"<select name=idCliente id=idCliente>
                <option selected value=0>Seleccione Cliente</option>";
                $sql= "SELECT Id_Cliente FROM clientes order by id_cliente";
                $result = $conexion->query($sql);
                $rows = $result->fetchAll();
                foreach ($rows as $row) {
                    $id_cliente=$row['Id_Cliente'];
                    echo"<option value= $id_cliente> $id_cliente </option>";
                }
            echo"</select>";
            ?>
        </br></br>
        <a href="gestion_motocicletas.php"><input type="button" value ="Volver"></a>
        <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
        <input type = submit value="Introducir Motocileta"> 
        <input type = reset value="Borrar">
        
        </form>
    </body>
</html>