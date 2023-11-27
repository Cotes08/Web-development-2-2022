<!DOCTYPE html>
<html>
    <head>
        <title>Modificar repuestos</title> 
    </head>
    <body>
        <h2>Fromulario de modificacion de repuesto</h2>
        <form method="post" action="update_repuesto.php" enctype="multipart/form-data"> 
            <?php 
                include ("conexionPDO.php");
                include("seguridad.php");
                $referencia=$_GET["referencia"];
                $sql = "SELECT * FROM repuestos where Referencia = $referencia";
                $consulta = $conexion->prepare($sql);
                $consulta->execute();
                $resultado = $consulta->fetchAll();  
                foreach ($resultado as $row) {
                    $descripcion=$row['Descripcion'];
                    $importe=$row['Importe'];
                    $ganancia=$row['Ganancia'];
                    $foto=$row['Fotografia'];
                } 
                echo"
                </br>Referencia: $referencia
                    <input type='text' name='referencia' value ='$referencia' hidden>
                </br></br>Descripcion:
                    <input type='text' name='descripcion' value ='$descripcion'>
                </br></br>Importe:
                    <input type='text' name='importe' value ='$importe'>
                </br></br>Ganancia:
                    <input type='text' name='ganancia' value ='$ganancia'>
                </br></br>Fotograf&iacute;a:
                    <input type='file' name='foto'>
                </br></br>";
                ?>
                <a href="gestion_repuestos.php"><input type="button" value ="Volver"></a>
                <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
                <input type = submit value="Modificar Repuesto"> 
                <input type = reset value="Borrar">
                
        </form>
    </body>
</html>