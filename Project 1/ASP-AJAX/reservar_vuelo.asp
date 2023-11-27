<!--#include file="conexion.asp"-->
<!DOCTYPE html>

<%
    idVuelo=Request.QueryString("idVuelo")
    SentenciaSQL="SELECT PRECIO FROM LISTA_VUELOS_PRECIO where IDVUELO= "& idVuelo
    Set rs = Conexion.Execute(SentenciaSQL)
    Set sql = Conexion.Execute("Select max(idreserva) as reservas from reserva")
    idReserva = sql("reservas")+1

%>
<html>
    <head>
      <title>Panel de reservas</title>
   </head>
    <body>
        <h1>Formulario para realizar la reserva</h1>
        <h3>Complete los siguiente campos porfavor</h3>
        
        Tu identificador de reserva es: <%Response.Write(idReserva)%><br><br>

        <%Response.Write("<form method=POST action=reserva.asp?idVuelo=" & idVuelo & ">")%>
            Nombre: <input type="text" name="Nombre" id="Nombre" placeholder="Manuel"><br><br>
            Apellidos: <input type="text" name="Apellidos" id="Apellidos" placeholder="Garcia Cotes"><br><br>
            NIF: <input type="text" name="NIF" id="NIF" placeholder="77777777R"><br><br>
            ID vuelo: <input type="text" name="idVuelo" id="idVuelo" value="<% response.Write(idVuelo)%>" disabled><br><br>
            Numero de asientos: <input type="number" name="Asientos" id="Asientos" min="1" value = "1"><br><br>
            Precio por asiento: <%=Round(rs("PRECIO"))%><br><br>
            <a href="vuelos_disponibles.asp"><input type="button" value ="Volver"></a>
            <input type="submit" value ="Reservar">
        </form>
    </body>
</html>