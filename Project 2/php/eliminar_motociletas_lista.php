<?php
    include "conexionPDO.php";
    include("seguridad.php");
    $array_borrados=$_POST["borrar"];
    $error=0;

    for ($i=0;$i<count ($array_borrados) ;$i++)
    {
        $SentenciaSQL="Delete from motocicletas where
        Matricula='$array_borrados[$i]'";

        echo"$SentenciaSQL";
    
        // Creamos la consulta y asignamos el resultado a la variable $result

        $result = $conexion->query ($SentenciaSQL);
        if(!$result)
        {
            $error=1;
        }
    }
    if($error==0)
    {
        header("Location: gestion_motocicletas.php");
    }
    else
    {
        echo"Ha fallado";
    }
?>
