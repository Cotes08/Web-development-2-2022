<?php
    include("conexionPDO.php");
    include("seguridad.php");
    $descripcion=$_POST["descripcion"];
    $importe=$_POST["importe"];
    $ganancia=$_POST["ganancia"];
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

    $SentenciaSQL=("insert into repuestos (Descripcion, Importe, Ganancia, Fotografia) values 
    ('$descripcion', '$importe', '$ganancia', '$jpg')");

    // Creamos la consulta y asignamos el resultado a la variable $result
    $result = $conexion->query($SentenciaSQL); 
    if (!$result)
    {
        echo "<br>Error al introducir el Cliente en la
       Base de Datos $result";
    }else{
        header("Location: gestion_repuestos.php");
    }
?>    