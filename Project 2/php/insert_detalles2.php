<?php

include ("conexionPDO.php");
include("seguridad.php");
    
    
    $referencia=$_POST["referencias"];
    $unidades=$_POST["unidades"];
    $numFactura=$_POST["factura"];
    echo"$numFactura";
  
    $SentenciaSQL=("insert into detalle_factura (Numero_Factura, Referencia, Unidades) values 
    ('$numFactura', '$referencia', '$unidades')");

    // Creamos la consulta y asignamos el resultado a la variable $result
    $result = $conexion->query($SentenciaSQL); 
    if (!$result)
    {
        echo "<br>Error al introducir la factura en la
       Base de Datos $result";
    }else{
       
        header("Location: calculoNuevoDetalle.php?referencia=$referencia&numFactura=$numFactura");
    }
?>    
