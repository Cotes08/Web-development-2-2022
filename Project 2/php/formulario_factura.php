<!DOCTYPE html>
<?php

include("conexionPDO.php");
include("seguridad.php");

//Definimos la cadena de consulta
$sql= "SELECT * FROM Facturas order by Numero_Factura DESC LIMIT 1";
//Creamos la consulta y asignamos el resultado a la variable $result
$result = $conexion->query($sql);
$cuenta = $result->fetchColumn(0);
$cuenta++;

if ($cuenta==NULL) {
    $cuenta=1;
}

?>
<html>
    <head>
        <title>Nueva facturas</title> 
    </head>
    <body>
        <h2>Fromulario de nueva factura</h2>
        <?php echo"<form method=post action=insert_factura.php?cuenta=$cuenta enctype=multipart/form-data>  
         </br>Numero de factura: $cuenta"?>
            </br></br>Matricula:
            <select name="matriculas" id="matriculas">
                <option selected value="0">Seleccione Matricula</option> 
                <?php
                    $sql= "SELECT Matricula FROM motocicletas order by id_cliente";
                    //Creamos la consulta y asignamos el resultado a la variable $result
                    //Creamos la consulta y asignamos el resultado a la variable $result
                    $result = $conexion->query($sql);
                    //Extraemos los valores de $result
                    $rows = $result->fetchAll();
                    //Como los valores estan en un array asociativo,
                    //usamos foreach para extraer los valores de $rows
                    foreach ($rows as $row) {
                        $matricula=$row['Matricula'];
                        echo"<option value= $matricula> $matricula </option>";
                    }
                ?>
            </select>
            </br></br>Horas mano de obra:
                <input type="text" name="manoObra">
            </br></br>Precio por hora:
                <input type="text" name="precioHora">
            </br></br>Fecha de emision:
                <input type="date" name="emision">
            </br></br>Fecha de pago:
                <input type="date" name="pago">
            </br></br>
            <a href="gestion_facturas.php"><input type="button" value ="Volver"></a>
            <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
            <input type = submit value="Introducir Factura"> 
            <input type = reset value="Borrar">
        </form>
    </body>
</html>


