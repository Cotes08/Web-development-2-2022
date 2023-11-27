<?php
    include "conexionPDO.php";
    include("seguridad.php");
    $array_borrados=$_POST["borrar"];
    $error=0;

    for ($i=0;$i<count ($array_borrados) ;$i++)
    {
        $SentenciaSQL="Delete from facturas where
        Numero_Factura='$array_borrados[$i]'";

        $SentenciaSQL2="Delete from detalle_factura where
        Numero_Factura='$array_borrados[$i]'";
    
        // Creamos la consulta y asignamos el resultado a la variable $result

        $result = $conexion->query ($SentenciaSQL);
        if(!$result)
        {
            $error=1;
        }

        $result2 = $conexion->query ($SentenciaSQL2);
        if(!$result2)
        {
            $error=1;
        }
    }
    if($error==0)
    {
        header("Location: gestion_facturas.php");
    }
    else
    {
        echo"Ha fallado";
    }
?>
