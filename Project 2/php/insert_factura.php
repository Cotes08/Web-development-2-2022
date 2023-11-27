<?php

include("conexionPDO.php");
include("seguridad.php");
    
    $cuenta=$_GET["cuenta"];
    $matricula=$_POST["matriculas"];
    $manoObra=$_POST["manoObra"];
    $precioHora=$_POST["precioHora"];
    $emision=$_POST["emision"];
    $pago=$_POST["pago"];

    $SentenciaSQL=("insert into facturas (Numero_Factura, Matricula, Mano_Obra, Precio_Hora, Fecha_Emision, Fecha_Pago, Base_Imponible, IVA, Total) values 
    ('$cuenta', '$matricula', '$manoObra', '$precioHora', '$emision', '$pago', '', '21', '')");

    // Creamos la consulta y asignamos el resultado a la variable $result
    $result = $conexion->query($SentenciaSQL); 
    if (!$result)
    {
        echo "<br>Error al introducir la factura en la
       Base de Datos $result";
    }else{
        header("Location: formulario_detalles_factura.php?numFactura= $cuenta");
    }
?>    