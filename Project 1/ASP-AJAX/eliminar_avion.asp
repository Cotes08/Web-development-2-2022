<!--#include file="conexion.asp"-->
<!--#include file="seguridad.asp"-->
<!DOCTYPE html>

<%
    id_avion=Request.QueryString("id")

    set consulta= Conexion.execute("select * FROM AVION WHERE IDAVION = " & id_avion)
    idAvion= consulta("IDAVION")
    avion= consulta("AVION")
    plazas= consulta("N_PLAZAS")
    precio= consulta("PRECIO_BASE")

%>
<html>
    <head>
        <title>Formulario eliminar aviones</title>
    </head>
    <body>
        <h1>Formulario para eliminar aviones</h1>
        <h3>Desea eliminar el siguiente avion ?</h3>
        <%Response.Write("<form method=POST action=delete_avion.asp?id=" & consulta("IDAVION") & ">")%>
            Id Avion: <input type="text" name="idAvion" id="idAvion" placeholder="1" value="<% response.Write(idAvion)%>" disabled><br><br>
            Avion: <input type="text" name="nombreAvion" id="nombreAvion" placeholder="Boeing 747" value="<% response.Write(avion)%>" disabled><br><br>
            Numero de plazas: <input type="text" name="n_plazas" id="n_plazas" placeholder="230" value="<% response.Write(plazas)%>" disabled><br><br>
            Precio base: <input type="text" name="precio_base" id="precio_base" placeholder="65" value="<% response.Write(precio)%>" disabled><br><br>
            <a href="listado_aviones.asp"><input type="button" value ="Volver"></a>
            <input type="submit" value ="Si, Eliminar">
        </form>
    </body>
</html>
