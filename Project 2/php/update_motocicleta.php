<?php
    include ("conexionPDO.php");
    include("seguridad.php");

    $matricula=$_POST["matricula"];
    $marca=$_POST["marca"];
    $modelo=$_POST["modelo"];
    $anyo=$_POST["anyo"];
    $color=$_POST["color"];
    $idCliente=$_POST["idCliente"];


    $sql = "UPDATE motocicletas
    SET Marca='$marca',
    Modelo='$modelo',
    Anyo='$anyo',
    Color='$color',
    Id_Cliente='$idCliente'
    WHERE Matricula='$matricula'";


    $update = $conexion->prepare($sql);
    $update->execute();
    header("Location: gestion_motocicletas.php");
    
    

?>