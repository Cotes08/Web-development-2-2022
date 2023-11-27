
<!--#include file="conexion.asp"-->
<!DOCTYPE html>
<%  
    session("flag")= 0
%>
<html>
    <head>
        <title>Pagina principal</title>
    </head>
    <body>
        <h1>Pagina principal</h1>
        <p></p>
        <a href = "login.html"><input type="button" value="Iniciar sesion"></a>
        <a href = "vuelos_disponibles.asp"><input type="button" value="Vuelos disponibles"></a>
        <a href = "ver_reserva.html"><input type="button" value="Ver reservas"></a>
        <a href = "listado_vuelos_ajax.asp"><input type="button" value="Vuelos con ajax"></a>
        <a href = "http://localhost:8080/prueba/reservas.html"><input type="button" value="Consulta reservas JSP"></a>
    </body>
</html>