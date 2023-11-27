<?php

    include ("conexionPDO.php");
    include("seguridad.php");

    $referencia=$_GET["referencia"];
    $numFactura=$_GET["numFactura"];


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

    $base = $base + $baseAux;

    $iva = $base*0.21;

    $total = $base +$iva;

    $sql = "UPDATE facturas
            SET Base_Imponible='$base',
            Total='$total'
            WHERE Numero_Factura='$numFactura'";
    $update = $conexion->prepare($sql);
    $update->execute();

    header("Location: gestion_facturas.php");



?>