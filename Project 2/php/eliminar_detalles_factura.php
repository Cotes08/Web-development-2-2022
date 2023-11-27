<?php

    include ("conexionPDO.php");
    include("seguridad.php");

    $referencia=$_GET["referencia"];
    $numFactura=$_GET["numFactura"];
    $ide=$_GET["ide"];


    //Para obtener el precio del repuesto
    $sql= "SELECT * FROM repuestos where Referencia = $referencia" ;
    $result = $conexion->query($sql);
    $rows = $result->fetchAll();      
    foreach ($rows as $row) {
        $precioRepuesto =$row['Importe'];
        $gananciaRepuesto=$row['Ganancia'];
    }

    $sql= "SELECT * FROM detalle_factura where Numero_Factura = $numFactura" ;
    $result = $conexion->query($sql);
    $rows = $result->fetchAll();      
    foreach ($rows as $row) {
        $numRepuestos =$row['Unidades'];
    }

    $sql= "SELECT * FROM facturas where Numero_Factura = $numFactura ";
    //Creamos la consulta y asignamos el resultado a la variable $result
    $result = $conexion->query($sql);
    $rows = $result->fetchAll();      
    foreach ($rows as $row) {
        $baseAux =$row['Base_Imponible'];
    }

    $PrecioRepuestos = $precioRepuesto * $numRepuestos;
    $GananciaDelRepuesto = $PrecioRepuestos * ($gananciaRepuesto/100);
    $base = $PrecioRepuestos+$GananciaDelRepuesto;

    $basefinal = $baseAux - $base;

    $iva = $basefinal*0.21;

    $total = $basefinal +$iva;

    $sql = "UPDATE facturas
            SET Base_Imponible='$basefinal',
            Total='$total'
            WHERE Numero_Factura='$numFactura'";
    $update = $conexion->prepare($sql);
    $update->execute();



    $SentenciaSQL="Delete from detalle_factura where Id_Det_Factura='$ide'";


    // Creamos la consulta y asignamos el resultado a la variable $result

    $result = $conexion->query ($SentenciaSQL);
    if(!$result)
    {
        $error=1;
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