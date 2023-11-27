<?php 
    include("conexionPDO.php");
    include("seguridad.php");
    include("eliminar_temporales.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Facturas de Cliente</title>
    </head>
    
    <body>

        <h1>Facturas de Cliente</h1>
        <table border=1>
            <td>Numero de factura</td>
            <td>Matricula</td>
            <td>Horas mano de obra</td>
            <td>Preio por hora</td>
            <td>Fecha de emision</td>
            <td>Fecha de pago</td>
            <td>Base imponible</td>
            <td>IVA</td>
            <td>Total</td>

        <?php
            $cliente=$_POST['cliente'];
            $sql="SELECT * FROM facturas as f, motocicletas as m WHERE  Id_Cliente='$cliente' AND f.Matricula=m.Matricula order by Numero_Factura";
            $result = $conexion->query($sql);
            //Extraemos los valores de $result
            $rows = $result->fetchAll();

            foreach ($rows as $row)
            {
                $numFactura=$row['Numero_Factura'];
                $matricula=$row['Matricula'];
                $manoObra=$row['Mano_Obra'];
                $precioHora=$row['Precio_Hora'];
                $emision=$row['Fecha_Emision'];
                $pago=$row['Fecha_Pago'];
                $base=$row['Base_Imponible'];
                $iva=$row['IVA'];
                $total=$row['Total'];
                
                echo "
                    <form method=post action=eliminar_facturas_lista.php>
                    <tr>
                    <td>$numFactura</td>
                    <td>$matricula</td>
                    <td>$manoObra</td>
                    <td>$precioHora</td>
                    <td>$emision</td>
                    <td>$pago</td>
                    <td>$base</td>
                    <td>$iva</td>
                    <td><center>$total</center></td> 
                    <td><center><input type=checkbox name=borrar[] value =$numFactura></center></td>
                    <td><a href=ver_factura.php?numFactura=$numFactura><input type=button value = 'Editar Factura'></a></td></tr>";
                }
            ?>  </table>
                </br><input type=submit value="Eliminar facturas Seleccionadas">
                <input type=reset value="Deseleccionar Todos"></br></br>
                </form>

                </br>
                <a href="menu.php"><input type="button" value ="Volver"></a>
                <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
                <a href="formulario_factura.php"><input type="button" value ="A&ntilde;adir factura"></a>
    </body>
</html>