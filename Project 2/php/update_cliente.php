<?php
    include ("conexionPDO.php");
    include("seguridad.php");

    $idCliente = $_POST['idCliente'];
    $dni=$_POST["dni"];
    $nombre=$_POST["nombre"];
    $apellido1=$_POST["apellido1"];
    $apellido2=$_POST["apellido2"];
    $direccion=$_POST["direccion"];
    $cp=$_POST["cp"];
    $poblacion=$_POST["poblacion"];
    $provincia=$_POST["provincia"];
    $telefono=$_POST["telefono"];
    $email=$_POST["email"];
    $control=0;
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
        $control=1;
    }
    if ($control==1) {
        $sql = "UPDATE clientes
                SET DNI='$dni',
                Nombre='$nombre',
                Apellido1='$apellido1',
                Apellido2='$apellido2',
                Direccion='$direccion',
                CP='$cp',
                Poblacion='$poblacion',
                Provincia='$provincia',
                Telefono='$telefono',
                Email='$email',
                Fotografia = '$jpg'
                WHERE Id_Cliente='$idCliente'";   
    }
    else {
            $sql = "UPDATE clientes
            SET DNI='$dni',
            Nombre='$nombre',
            Apellido1='$apellido1',
            Apellido2='$apellido2',
            Direccion='$direccion',
            CP='$cp',
            Poblacion='$poblacion',
            Provincia='$provincia',
            Telefono='$telefono',
            Email='$email'
            WHERE Id_Cliente='$idCliente'";
    }
    $update = $conexion->prepare($sql);
    $update->execute();
    header("Location: gestion_clientes.php");
    
    

?>