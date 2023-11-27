<!DOCTYPE html>
<html>
    <head>
        <title>Modificar motocicleta</title> 
    </head>
    <body>
        <h2>Fromulario de modificacion de motocicleta</h2>
        <form method="post" action="update_motocicleta.php" enctype="multipart/form-data">  
            <?php 
                include ("conexionPDO.php");
                include("seguridad.php");
                $matricula=$_GET["matricula"];
                $sql = "SELECT * FROM motocicletas where Matricula = '$matricula'";
                $consulta = $conexion->prepare($sql);
                $consulta->execute();
                $resultado = $consulta->fetchAll();  
                foreach ($resultado as $row) {
                    $marca=$row['Marca'];
                    $modelo=$row['Modelo'];
                    $anyo=$row['Anyo'];
                    $color=$row['Color'];
                    $id_cliente=$row['Id_Cliente'];
                } 
                echo"
                </br> Matricula: $matricula
                    <input type='text' name='matricula' value='$matricula' hidden>
                </br></br>Marca:
                    <input type='text' name='marca' value='$marca'>
                </br></br>Modelo:
                    <input type='text' name='modelo' value='$modelo'>
                </br></br>A&ntilde;o:
                    <input type='text' name='anyo' value='$anyo'>
                </br></br>Color:
                    <input type='text' name='color' value='$color'>    
                </br></br>Id Cliente:
                <select name=idCliente id=idCliente>
                    <option value=$id_cliente>$id_cliente</option>";
                    $sql= "SELECT Id_Cliente FROM clientes order by id_cliente";
                    $result = $conexion->query($sql);
                    $rows = $result->fetchAll();
                    foreach ($rows as $row) {
                        $id_cliente=$row['Id_Cliente'];
                        echo"<option value= $id_cliente> $id_cliente </option>";
                    }
                echo"</select>
                </br></br>";
            ?> 
        <a href="gestion_motocicletas.php"><input type="button" value ="Volver"></a>
        <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>       
        <input type = submit value="Modificar Motocileta"> 
        <input type = reset value="Borrar">
        
        </form>
    </body>
</html>


                
            

