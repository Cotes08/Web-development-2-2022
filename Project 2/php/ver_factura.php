<!DOCTYPE html>
<html>
    <head>
        <title>Modificacion facturas</title> 
    </head>
    <body>
        <h2>Fromulario de modificacion de factura</h2>
        <form method="post" action="update_factura.php" enctype="multipart/form-data">  
            <?php 
                include("conexionPDO.php");
                include("seguridad.php");
                include("eliminar_temporales.php");
                $numFactura = $_GET["numFactura"];
                //Definimos la cadena de consulta
                $sql= "SELECT * FROM Facturas where Numero_Factura = '$numFactura'";
                $consulta = $conexion->prepare($sql);
                $consulta->execute();
                $resultado = $consulta->fetchAll();
                foreach ($resultado as $row) {
                    $numFactura=$row['Numero_Factura'];
                    $matricula=$row['Matricula'];
                    $manoObra=$row['Mano_Obra'];
                    $precioHora=$row['Precio_Hora'];
                    $emision=$row['Fecha_Emision'];
                    $pago=$row['Fecha_Pago'];
                    $base=$row['Base_Imponible'];
                    $iva=$row['IVA'];
                    $total=$row['Total'];
                } 
                echo"
                </br> Numero de la factura: $numFactura
                    <input type='text' name='factura' value='$numFactura' hidden>
                </br></br>Horas mano de obra:
                    <input type=text name=manoObra value='$manoObra'>
                </br></br>Matricula:    
                <select name=matriculas id=matriculas>
                    <option selected value=$matricula>$matricula</option>";
                    $sql= "SELECT Matricula FROM motocicletas order by id_cliente";
                    $result = $conexion->query($sql);
                    $rows = $result->fetchAll();
                    foreach ($rows as $row) {
                        $matricula=$row['Matricula'];
                        echo"<option value= $matricula> $matricula </option>";
                    }
                echo"
                </select>
                </br></br>Precio por hora:
                    <input type=text name=precioHora value='$precioHora'>
                </br></br>Fecha de emision:
                    <input type=date name=emision value='$emision'>
                </br></br>Fecha de pago:
                    <input type=date name=pago value='$pago'>  
                </br></br>";
            ?> 
        <a href="gestion_facturas.php"><input type="button" value ="Volver"></a>
        <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>       
        <input type = submit value="Modificar Factura">
        <?php
        $numFactura = $_GET["numFactura"];
        echo"<a href=gestion_detalles.php?factura=$numFactura><input type=button value='Ver detalles de la factura'></a>";
        ?>
        <input type = reset value="Borrar">
        
        </form>
    </body>
</html>

