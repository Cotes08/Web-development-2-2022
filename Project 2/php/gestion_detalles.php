<html>
    <head>
        <title>Listado detalles</title>
    </head>    
    <body>

    <h2>Listado de facturas: </h2>
    <table border=1>
        <td>Id_Det_Factura</td>
        <td>Numero_Factura</td>
        <td>Referencia</td>
        <td>Unidades</td>
        <?php
            include("conexionPDO.php");
            include("seguridad.php");
            $numFactura = $_GET["factura"];
            //Definimos la cadena de consulta
            $sql= "SELECT * FROM detalle_factura WHERE Numero_Factura='$numFactura'";
            //Creamos la consulta y asignamos el resultado a la variable $result
            $result = $conexion->query($sql);
            //Extraemos los valores de $result
            $rows = $result->fetchAll();
            //Como los valores estan en un array asociativo,
            //usamos foreach para extraer los valores de $rows

            foreach ($rows as $row) {

                
                $Id_Det_Factura=$row['Id_Det_Factura'];
                $Numero_Factura=$row['Numero_Factura'];
                $Referencia=$row['Referencia'];
                $Unidades=$row['Unidades'];
                echo"
                <form method=post action=eliminar_facturas_lista.php>
                    <tr>
                    <td>$Id_Det_Factura</td>
                    <td>$Numero_Factura</td>
                    <td>$Referencia</td>
                    <td>$Unidades</td>
                    <td><a href=eliminar_detalles_factura.php?ide=$Id_Det_Factura&numFactura=$numFactura&referencia=$Referencia><input type=button value = 'Eliminar detalle'></a></td></tr>";
            }
        ?>      </table>
                </form>
            
        
     
    </br>
     <a href="menu.php"><input type="button" value ="Volver"></a>
     <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
    <?php echo"<a href=formulario_detalles_factura2.php?numFactura=$numFactura><input type=button value ='A&ntilde;adir detalle a la factura'></a>";?>
   </body>
</html>       