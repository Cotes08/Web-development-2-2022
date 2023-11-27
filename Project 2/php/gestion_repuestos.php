
<html>
    <head>
        <title>Repuestos</title>
    </head>    
    <body>

    <h2>Listado de repuestos: </h2>
    <table border=1>
        <td>Referencia</td>
        <td>Descripcion</td>
        <td>Importe</td>
        <td>Ganancia</td>
        <td>Fotografia</td>
        <?php
            include("conexionPDO.php");
            include("seguridad.php");
            include("eliminar_temporales.php");
            //Definimos la cadena de consulta
            $sql= "SELECT * FROM repuestos order by Referencia";
            //Creamos la consulta y asignamos el resultado a la variable $result
            $result = $conexion->query($sql);
            //Extraemos los valores de $result
            $rows = $result->fetchAll();
            //Como los valores estan en un array asociativo,
            //usamos foreach para extraer los valores de $rows

            foreach ($rows as $row) {

                
                $referencia=$row['Referencia'];
                $descripcion=$row['Descripcion'];
                $importe=$row['Importe'];
                $ganancia=$row['Ganancia'];
                $foto=$row['Fotografia'];
                $imagen=basename(tempnam(getcwd()."/temporales", "temp"));
                //añadimos la extension jpg
                $imagen.=".jpg";
                //abrimos el fihero con permisos de escritura
                $fichero=fopen("./temporales/" .$imagen, "w");
                //escribimos en el fichero el contenido del campo de la base de datos
                fwrite($fichero, $foto);
                fclose($fichero);
                echo"
                <form method=post action=eliminar_repuestos_lista.php>
                    <tr>
                    <td><center><b>$referencia</b></center></td>
                    <td>$descripcion</td>
                    <td>$importe</td>
                    <td>$ganancia</td>
                    <td><center><a href=temporales/$imagen><img src=temporales/$imagen width=50 border=0></a></center></td>
                    <td><center><input type=checkbox name=borrar[] value =$referencia></center></td>
                    <td><a href=ver_repuesto.php?referencia=$referencia><input type=button value = 'Editar repuesto'></a></td></tr>";
            }
        ?>      </table>
                    </br><input type=submit value="Eliminar Repuestos Seleccionados">
                    <input type=reset value="Deseleccionar Todos"></br></br>
                </form>
            
        
     
    </br>
     <a href="menu.php"><input type="button" value ="Volver"></a>
     <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
     <a href="formulario_repuesto.php"><input type="button" value ="A&ntilde;adir repuesto"></a>
   </body>
</html>       