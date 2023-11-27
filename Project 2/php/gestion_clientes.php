
<html>
    <head>
        <title>Clientes</title>
    </head>    
    <body>

    <h2>Listado de clientes: </h2>
    <table border=1>
        <td>ID</td>
        <td>DNI</td>
        <td>Nombre</td>
        <td>Apellido1</td>
        <td>Apellido2</td>
        <td>Direccion</td>
        <td>CP</td>
        <td>Poblacion</td>
        <td>Provincia</td>
        <td>Telefono</td>
        <td>Email</td>
        <td>Foto</td>
        <?php
            include("conexionPDO.php");
            include("seguridad.php");
            include("eliminar_temporales.php");
            //Definimos la cadena de consulta
            $sql= "SELECT * FROM clientes order by id_cliente";
            //Creamos la consulta y asignamos el resultado a la variable $result
            $result = $conexion->query($sql);
            //Extraemos los valores de $result
            $rows = $result->fetchAll();
            //Como los valores estan en un array asociativo,
            //usamos foreach para extraer los valores de $rows

            foreach ($rows as $row) {

                
                $id_cliente=$row['Id_Cliente'];;
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
                <form method=post action=eliminar_clientes_lista.php>
                    <tr>
                    <td><center><b>$id_cliente</b></center></td>
                    <td>$dni</td>
                    <td>$nombre</td>
                    <td>$apellido1</td>
                    <td>$apellido2</td>
                    <td>$direccion</td>
                    <td>$cp</td>
                    <td>$poblacion</td>
                    <td>$provincia</td>
                    <td>$telefono</td>
                    <td>$email</td>
                    <td><center><a href=temporales/$imagen><img src=temporales/$imagen width=50 border=0></a></center></td>
                    <td><center><input type=checkbox name=borrar[] value =$id_cliente></center></td>
                    <td><a href=ver_cliente.php?idCliente=$id_cliente><input type=button value = 'Editar cliente'></a></td></tr>";
            }
        ?>      </table>
                    </br><input type=submit value="Eliminar Clientes Seleccionados">
                    <input type=reset value="Deseleccionar Todos"></br></br>
                </form>
            
        
     
    </br>
     <a href="menu.php"><input type="button" value ="Volver"></a>
     <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
     <a href="formulario_cliente.php"><input type="button" value ="A&ntilde;adir cliente"></a>
   </body>
</html>       