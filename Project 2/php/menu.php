<?php
    include("seguridad.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Menu de administrador</title>
    </head>
    <body>
    
        <h1>Menu de administrador</h1>
        <p></p>
        <a href = "gestion_clientes.php"><input type="button" value="Gesti&oacute;n de clientes"></a>
        <a href = "gestion_motocicletas.php"><input type="button" value="Gesti&oacute;n de motocicletas"></a>
        <a href = "gestion_repuestos.php"><input type="button" value="Gesti&oacute;n de repuestos"></a>
        <a href = "gestion_facturas.php"><input type="button" value="Gesti&oacute;n de facturas"></a>
        <a href = "buscar_cliente.php"><input type="button" value="Buscar cliente"></a>
        <a href = "buscar_facturas.php"><input type="button" value="Buscar facturas"></a>
        <a href="destruir_sesion.php"><input type="button" value ="Cerrar sesion"></a>
    </body>
</html>


