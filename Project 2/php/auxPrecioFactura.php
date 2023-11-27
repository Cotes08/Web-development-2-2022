<?php

    include ("conexionPDO.php");
    include("seguridad.php");

    $numFactura=$_GET["factura"];


    $sql= "SELECT * FROM detalle_factura where Numero_Factura = $numFactura" ;
    $result = $conexion->query($sql);
    $rows = $result->fetchAll();      
    foreach ($rows as $row) {
        $referencia =$row['Referencia'];
    }


    header("Location: calculoTotal.php?referencia=$referencia&numFactura=$numFactura");



?>