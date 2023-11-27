<!--#include file="conexion.asp"-->
<!DOCTYPE html>

<% 
    idreserva=Request.Form("idreserva")
    dni=Request.Form("dni")

    SentenciaSQL="SELECT * FROM RESERVA where IDRESERVA= "& idreserva & " AND NIF ="&dni
    Set rs = Conexion.Execute(SentenciaSQL)
    
%>
<html>
    <head>
        <title>Pagina con su reserva</title>
     </head>
    <body>
        <h1>Sus reservas</h1>
    <table border = "1">
        <tr>
            <th>IDRESERVA</th>
            <th>APELLIDOS</th>
            <th>NOMBRE</th>
            <th>NIF</th>
            <th>IDVUELO</th>
            <th>N_ASIENTOS</th>
            <th>CANCELADO</th>
        </tr>
        <%do until rs.Eof%>
        <tr>        
            <td><%=rs("IDRESERVA")%> </td>
            <td><%=rs("APELLIDOS")%> </td> 
            <td><%=rs("NOMBRE")%> </td> 
            <td><%=rs("NIF")%> </td> 
            <td><%=rs("IDVUELO")%> </td> 
            <td><%=rs("N_ASIENTOS")%> </td> 
            <td><%=rs("CANCELADO")%> </td> 
            <td>
            <%Response.Write("<form method=POST action=cancelar_vuelo.asp?idreserva=" & rs("IDRESERVA") & ">")%>
               <input type="submit" value ="Cancelar vuelo">
            </form>
            </td>
        </tr>
        <p></p>
        <%rs.MoveNext 
        loop%>
    </table>  
    <a href="index.asp"><input type="button" value ="Volver"></a>
  
   <%      
      Conexion.Close
      Set rs = nothing
      Set Conexion = nothing	  	  
   %>
    </body>
</html>