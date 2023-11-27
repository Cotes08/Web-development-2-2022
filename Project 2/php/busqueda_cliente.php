<?php
    include("conexionPDO.php");
    include("seguridad.php");
    include("eliminar_temporales.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Buscar clientes</title>
    </head>
    
    <body>
        <h1>Buscar Clientes</h1>
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

            $nombre=$_POST["nombre"];
            $apellido1=$_POST["apellido1"];
            $apellido2=$_POST["apellido2"];
            $poblacion=$_POST["poblacion"];
            $provincia=$_POST["provincia"];
            $telefono=$_POST["telefono"];

            $and = " AND ";
            $order = " order by Id_Cliente";
            $control = 0;

            $sql = "SELECT * FROM clientes WHERE ";
            if($nombre != NULL)
            {
                $nom =" Nombre='$nombre' ";
                $sql = $sql . $nom;

                if($apellido1 != NULL || $apellido2 != NULL || $poblacion != NULL || $provincia != NULL || $telefono != NULL)
                {
                    $sql = $sql . $and;
                }
                $control = 1;
            }
            if($apellido1 != NULL)
            {
                $ape1 =" Apellido1='$apellido1' ";
                $sql = $sql . $ape1;
                if($apellido2 != NULL || $poblacion != NULL || $provincia != NULL || $telefono != NULL)
                {
                    $sql = $sql . $and;
                }
                $control = 1;
            }
            if($apellido2 != NULL)
            {
                $ape2 =" Apellido2='$apellido2' ";
                $sql = $sql . $ape2;

                if($poblacion != NULL || $provincia != NULL || $telefono != NULL)
                {
                    $sql = $sql . $and;
                }
                $control = 1;
            }
            if($poblacion != NULL)
            {
                $pob =" Poblacion='$poblacion' ";
                $sql = $sql . $pob;

                if($provincia != NULL || $telefono != NULL)
                {
                    $sql = $sql . $and;
                }
                $control = 1;
            }
            if($provincia != NULL)
            {
                $prov =" Provincia='$provincia' ";
                $sql = $sql . $prov;

                if($telefono != NULL)
                {
                    $sql = $sql . $and;
                }
                $control = 1;
            }
            if($telefono != NULL)
            {
                $tel =" Telefono='$telefono' ";
                $sql = $sql . $tel;

                $control = 1;
            } 

            if ($control == 1)
            {
                $sql = $sql . $order;
            }
            else
            {
                $sql = "SELECT * FROM clientes";
            }

            $result = $conexion->query($sql);
            //Extraemos los valores de $result
            $rows = $result->fetchAll();

            foreach ($rows as $row)
            {
                $id_cliente=$row['Id_Cliente'];
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
                echo "
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
        ?>
                </table>
                    </br><input type=submit value="Eliminar Clientes Seleccionados">
                    <input type=reset value="Deseleccionar Todos"></br></br>
                </form>

    </br>
     <a href="menu.php"><input type="button" value ="Volver"></a>
     <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
     <a href="formulario_cliente.php"><input type="button" value ="A&ntilde;adir cliente"></a>
    </body>
</html>
