<?php
    include("conexionPDO.php");
    include("seguridad.php");
    $dni=$_POST["dni"];
    $nombre=$_POST["nombre"];
    $apellido1=$_POST["apellido1"];
    $apellido2=$_POST["apellido2"];
    $direccion=$_POST["direccion"];
    $CP=$_POST["CP"];
    $poblacion=$_POST["poblacion"];
    $provincia=$_POST["provincia"];
    $telefono=$_POST["telefono"];
    $email=$_POST["email"];
    if (is_uploaded_file($_FILES['foto']['tmp_name']))
    {
        $foto=$_FILES['foto']['tmp_name'];
        // Tratamiento necesario para introducir la imagen en la base de datos
        $fotografia=imagecreatefromjpeg($foto);
        ob_start(); // abrimos el buffer interno
        // obtenemos el fichero jpg-binario del buffer y lo almacena en la variable jpg
        imagejpeg($fotografia);
        $jpg=ob_get_contents();
        //cerramos el buffer
        // preparamos la variable para usarla en una consulta sql
        ob_end_clean();
        $intermedio = addslashes(trim($jpg));
        $jpg=str_replace('##','\##',$intermedio);
    }

    $SentenciaSQL=("insert into clientes (DNI, Nombre, Apellido1, Apellido2, Direccion, CP, Poblacion, Provincia, Telefono, Email, Fotografia) values 
    ('$dni', '$nombre', '$apellido1', '$apellido2', '$direccion', '$CP', '$poblacion', '$provincia', '$telefono', '$email', '$jpg')");

    // Creamos la consulta y asignamos el resultado a la variable $result
    $result = $conexion->query($SentenciaSQL); 
    if (!$result)
    {
        echo "<br>Error al introducir el Cliente en la
       Base de Datos $result";
    }else{
        header("Location: gestion_clientes.php");
    }
?>    