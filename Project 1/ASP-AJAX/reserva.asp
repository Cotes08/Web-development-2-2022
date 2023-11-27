<!--#include file="moddb.asp"-->
<%
    
    idVuelo=Request.QueryString("idVuelo")
    Nombre=Request.Form("Nombre")
    Apellidos=Request.Form("Apellidos")
    NIF=Request.Form("NIF")
    Asientos=Request.Form("Asientos")

    SentenciaSQL="Select * from RESERVA"
    rs.Open SentenciaSQL, Conexion

    rc=rs.recordcount
    idreserva=rc+1
    rs.addnew
    rs("IDRESERVA")= idreserva
    rs("APELLIDOS")= Apellidos
    rs("NOMBRE")= Nombre
    rs("NIF")= NIF
    rs("IDVUELO")= idVuelo
    rs("N_ASIENTOS")= Asientos
    rs("CANCELADO")= 0

    rs.update
    rs.close

    If session("flag") = 1 Then
        Response.Redirect("index.asp")
    End if
 

%>

<html>
   <head>
      <title>Listado de los vuelos</title>
   </head>
<body>
    <%
        set consulta= Conexion.Execute("select IDCIUDADORIGEN, IDCIUDADDESTINO FROM VUELO WHERE IDVUELO="& idVuelo)

        Ciudad_origen = consulta("IDCIUDADORIGEN")
        Ciudad_destino = consulta("IDCIUDADDESTINO")


        SentenciaSQL = "Select * from LISTA_VUELOS_PRECIO WHERE CIUDAD_ORIGEN = (SELECT CIUDAD FROM CIUDAD WHERE IDCIUDAD = "& Ciudad_destino &") AND CIUDAD_DESTINO = (SELECT CIUDAD FROM CIUDAD WHERE IDCIUDAD = "& Ciudad_origen &")"

        Set rs = Conexion.Execute(SentenciaSQL)
    %>

    <h1>Desea reservar el avion de vuelta?</h1>
    <table border = "1">
        <tr>
            <th>IDVUELO</th>
            <th>CIUDAD_ORIGEN</th>
            <th>CIUDAD_DESTINO</th>
            <th>FECHA</th>
            <th>COMPA&Ntilde;IA</th>
            <th>IDAVION</th>
            <th>AVION</th>
            <th>N_PLAZAS</th>
            <th>N_PLAZAS_DISPONIBLES</th>
            <th>DURACION</th>
            <th>PRECIO</th>
        </tr>
        <%do until rs.Eof%>
        <tr>        
            <td><%=rs("IDVUELO")%> </td>
            <td><%=rs("CIUDAD_ORIGEN")%> </td> 
            <td><%=rs("CIUDAD_DESTINO")%> </td> 
            <td><%=rs("FECHA")%> </td> 
            <td><%=rs("COMPANIA")%> </td> 
            <td><%=rs("IDAVION")%> </td> 
            <td><%=rs("AVION")%> </td> 
            <td><%=rs("N_PLAZAS")%> </td>
            <td><%=rs("N_PLAZAS_DISPONIBLES")%> </td> 
            <td><%=rs("DURACION")%> </td> 
            <td><%=rs("PRECIO")%> </td>   
            <td>
            <%Response.Write("<form method=POST action=reservar_vuelo.asp?idVuelo=" & rs("IDVUELO") & ">")
                session("flag")= 1
            %>
               <input type="submit" value ="Reservar">
            </form>
            </td>
        </tr>
        <p></p>
        <%rs.MoveNext 
        loop%>
    </table>  
    <a href = "index.asp"><input type="button" value="No quiero reservar"></a>
  
   <%      
      Conexion.Close
      Set rs = nothing
      Set Conexion = nothing	  	  
   %>   
</body>
</html>
