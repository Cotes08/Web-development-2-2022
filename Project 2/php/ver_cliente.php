<!DOCTYPE html>

<html>
    <head>
        <title>Modificar cliente</title> 
    </head>
    <body>
        <h2>Fromulario de modificacion de cliente</h2>
        <form method="post" action="update_cliente.php" enctype="multipart/form-data"> 
            <?php 
                include ("conexionPDO.php");
                include("seguridad.php");
                $idCliente=$_GET["idCliente"];
                $sql = "SELECT * FROM clientes where Id_Cliente = $idCliente";
                $consulta = $conexion->prepare($sql);
                $consulta->execute();
                $resultado = $consulta->fetchAll();  
                foreach ($resultado as $row) {
                    $dni=$row['DNI'];
                    $nombre=$row['Nombre'];
                    $apellido1=$row['Apellido1'];
                    $apellido2=$row['Apellido2'];
                    $direccion=$row['Direccion'];
                    $cp=$row['CP'];
                    $poblacion=$row['Poblacion'];
                    $provincia=$row['Provincia'];
                    $telefono=$row['Telefono'];
                    $email=$row['Email'];
                } 
                echo"
                </br></br> Id Cliente:$idCliente
                    <input type='text' name='idCliente' value='$idCliente' hidden>
                </br></br> DNI:
                    <input type='text' name='dni' value='$dni'>
                </br></br>Nombre:
                    <input type='text' name='nombre' value='$nombre'>
                </br></br>Primer apelldio:
                    <input type='text' name='apellido1' value='$apellido1'>
                </br></br>Segundo apellido:
                    <input type='text' name='apellido2' value='$apellido2'>
                </br></br>Direccion:
                    <input type='text' name='direccion' value='$direccion'>
                </br></br>C.P:
                    <input type='text' name='cp' value='$cp'>
                </br></br>Poblacion:
                    <input type='text' name='poblacion' value='$poblacion'>
                </br></br>Provincia:
                    <input type='text' name='provincia' value='$provincia'>
                </br></br>Telefono:
                    <input type='text' name='telefono' value='$telefono'>  
                </br></br>Email:
                    <input type='text' name='email' value='$email'>
                </br></br>Fotograf&iacute;a:
                    <input type='file' name='foto'>
                </br></br>";
            ?>
            <a href="gestion_clientes.php"><input type="button" value ="Volver"></a>
            <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
            <input type = submit value="Modificar Cliente"> 
            <input type = reset value="Borrar">
            
        </form>
    </body>
</html>