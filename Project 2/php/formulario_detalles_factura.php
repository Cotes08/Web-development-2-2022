<!DOCTYPE html>
<?php

include("conexionPDO.php");
include("seguridad.php");
    
?>
<html>
    <head>
        <title>Detalles facturas</title> 
    </head>
    <body>
        <h2>Fromulario de detalles de la factura:</h2>
        <?php
        $numFactura = $_GET["numFactura"];
        echo"<form method=post action=insert_detalles.php enctype=multipart/form-data>  
            </br>Numero de factura: $numFactura
                <input type=text name=factura value = $numFactura hidden> ";?>
            </br></br>Referencia del repuesto:
            <select name="referencias" id="referencias">
                <option selected value="0">Seleccione la referencia</option> 
                <?php
                    $sql= "SELECT Referencia FROM Repuestos order by Referencia";
                    //Creamos la consulta y asignamos el resultado a la variable $result
                    $result = $conexion->query($sql);
                    //Extraemos los valores de $result
                    $rows = $result->fetchAll();
                    //Como los valores estan en un array asociativo,
                    //usamos foreach para extraer los valores de $rows
                    foreach ($rows as $row) {
                        $Referencia=$row['Referencia'];
                        echo"<option value= $Referencia> $Referencia </option>";
                    }
                ?>
            </select>
            </br></br>Unidades:
                <input type="number" name="unidades" min="1" max = "100" value="1">
            </br></br>
            <input type = submit value="Introducir detalles"> 
            <input type = reset value="Borrar">
            
        </form>
    </body>
</html>


