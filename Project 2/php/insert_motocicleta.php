<?php
    include("conexionPDO.php");
    include("seguridad.php");
    $matricula=$_POST["matricula"];
    $marca=$_POST["marca"];
    $modelo=$_POST["modelo"];
    $anyo=$_POST["anyo"];
    $color=$_POST["color"];
    $idCliente=$_POST["idCliente"];

    $SentenciaSQL=("insert into motocicletas (Matricula, Marca, Modelo, Anyo, Color, Id_Cliente) values 
    ('$matricula', '$marca', '$modelo', '$anyo', '$color', '$idCliente')");

    // Creamos la consulta y asignamos el resultado a la variable $result
    $result = $conexion->query($SentenciaSQL); 
    if (!$result)
    {
        echo "<br>Error al introducir el Cliente en la
       Base de Datos $result";
    }else{
        header("Location: gestion_motocicletas.php");
    }
?>    