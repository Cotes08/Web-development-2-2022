<?php 
    include("conexionPDO.php");
    include("seguridad.php");
?>
<html>
   <head>
      <title>Buscar Factura</title>
   </head>
   
   <body>
        <h1>Buscar Factura</h1>
        <form method="post" action="buscar_factura_fechas.php">
            <h2>Facturas pagadas entre dos fechas</h2>
            <h3>Primera Fecha</h3>
            <input type="date" name="fecha1">
            <h3>Segunda Fecha</h3>
            <input type="date"name="fecha2">
            <br><br><input type="submit" value="Buscar">
        </form>

        <br><br>

        <form method="post" action="buscar_facturas_cliente.php">
            <h2>Facturas de un cliente determinado</h2>
            <select name="cliente" id="cliente">
                <?php
                    $sql = "SELECT Id_Cliente, Nombre, Apellido1 FROM clientes order by Id_Cliente";
                    //Creamos la consulta y asignamos el resultado a la variable $result
                    $result = $conexion->query($sql);
                    //Extraemos los valores de $result
                    $rows = $result->fetchAll();

                    foreach ($rows as $row)
                    {
                        $idCliente = $row['Id_Cliente'];
                        $nombre = $row['Nombre'];
                        $apellido1 = $row['Apellido1'];

                        echo ("<option value=$idCliente>$nombre $apellido1</option>");
                    }                            
                ?>
            </select>
            </br></br>
            <input type = submit value="Buscar facturas"> 
            </br></br></br></br>
            <a href="menu.php"><input type="button" value ="Volver"></a>
            <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
        </form> 
   </body>
</html> 