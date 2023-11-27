<?php
    include ("conexionPDO.php");
    include("seguridad.php");

    $numFactura=$_POST['factura'];
    $matricula=$_POST['matriculas'];
    $manoObra=$_POST['manoObra'];
    $precioHora=$_POST['precioHora'];
    $emision=$_POST['emision'];
    $pago=$_POST['pago'];

    $sql = "UPDATE facturas
    SET Matricula='$matricula',
    Mano_Obra='$manoObra',
    Precio_Hora='$precioHora',
    Fecha_Emision='$emision',
    Fecha_Pago='$pago'
    WHERE Numero_Factura='$numFactura'";
    $update = $conexion->prepare($sql);
    $update->execute();
    header("Location: auxPrecioFactura.php?factura=$numFactura");


    
    

?>