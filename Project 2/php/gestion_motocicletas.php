
<html>
    <head>
        <title>Listado Motocicletas</title>
    </head>    
    <body>

    <h2>Listado de motocicletas: </h2>
    <table border=1>
        <td>Matricula</td>
        <td>Marca</td>
        <td>Modelo</td>
        <td>A&ntilde;o</td>
        <td>Color</td>
        <td>Id Cliente</td>
        <?php
            include("conexionPDO.php");
            include("seguridad.php");
            include("eliminar_temporales.php");
            //Definimos la cadena de consulta
            $sql= "SELECT * FROM motocicletas order by id_cliente";
            //Creamos la consulta y asignamos el resultado a la variable $result
            $result = $conexion->query($sql);
            //Extraemos los valores de $result
            $rows = $result->fetchAll();
            //Como los valores estan en un array asociativo,
            //usamos foreach para extraer los valores de $rows

            foreach ($rows as $row) {

                
                $matricula=$row['Matricula'];
                $marca=$row['Marca'];
                $modelo=$row['Modelo'];
                $anyo=$row['Anyo'];
                $color=$row['Color'];
                $id_cliente=$row['Id_Cliente'];
                echo"
                <form method=post action=eliminar_motociletas_lista.php>
                    <tr>
                    <td>$matricula</td>
                    <td>$marca</td>
                    <td>$modelo</td>
                    <td>$anyo</td>
                    <td>$color</td>
                    <td><center>$id_cliente</center></td> 
                    <td><center><input type=checkbox name=borrar[] value =$matricula></center></td>
                    <td><a href=ver_motocicleta.php?matricula=$matricula><input type=button value = 'Editar motocicleta'></a></td></tr>";
            }
        ?>      </table>
                    </br><input type=submit value="Eliminar motos Seleccionadas">
                    <input type=reset value="Deseleccionar Todos"></br></br>
                </form>
            
        
     
    </br>
     <a href="menu.php"><input type="button" value ="Volver"></a>
     <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
     <a href="formulario_motocicleta.php"><input type="button" value ="A&ntilde;adir motocicleta"></a>
   </body>
</html>       