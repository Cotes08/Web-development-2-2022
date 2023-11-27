<?php
    include ("conexionPDO.php");
    include("seguridad.php");

    $referencia=$_POST["referencia"];
    $descripcion=$_POST["descripcion"];
    $importe=$_POST["importe"];
    $ganancia=$_POST["ganancia"];
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
        $sql = "UPDATE repuestos
                SET Descripcion='$descripcion',
                Importe='$importe',
                Ganancia='$ganancia',
                Fotografia = '$jpg'
                WHERE Referencia=$referencia";   
    }
    else {
        $sql = "UPDATE repuestos
        SET Descripcion='$descripcion',
        Importe='$importe',
        Ganancia='$ganancia'
        WHERE Referencia=$referencia"; 
    }
    $update = $conexion->prepare($sql);
    $update->execute();
    header("Location: gestion_repuestos.php");
    
    

?>