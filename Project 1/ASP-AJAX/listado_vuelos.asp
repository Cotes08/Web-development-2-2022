<!--#include file="conexion.asp"-->
<html>
   <head>
      <title>Listado de los vuelos</title>
   </head>
<body>
    <%
      Ciudad_origen = Request.Form("Ciudades_origen")
      Ciudad_destino = Request.Form("Ciudades_destino")

      If Ciudad_origen = "0" and Ciudad_destino = "0" Then
         SentenciaSQL = "Select * from LISTA_VUELOS_PRECIO" 

      Elseif Ciudad_origen = "0" Then
         SentenciaSQL = "Select * from LISTA_VUELOS_PRECIO WHERE CIUDAD_DESTINO = (SELECT CIUDAD FROM CIUDAD WHERE IDCIUDAD = "& Ciudad_destino &")"

      Elseif Ciudad_destino = "0" Then
         SentenciaSQL = "Select * from LISTA_VUELOS_PRECIO WHERE CIUDAD_ORIGEN = (SELECT CIUDAD FROM CIUDAD WHERE IDCIUDAD = "& Ciudad_origen &")"

      Else
         SentenciaSQL = "Select * from LISTA_VUELOS_PRECIO WHERE CIUDAD_ORIGEN = (SELECT CIUDAD FROM CIUDAD WHERE IDCIUDAD = "& Ciudad_origen &") AND CIUDAD_DESTINO = (SELECT CIUDAD FROM CIUDAD WHERE IDCIUDAD = "& Ciudad_destino &")"
      End if

      Set rs = Conexion.Execute(SentenciaSQL)
    %>

    <h1>Listado de los vuelos seleccionados</h1>
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
            <td><%=Round(rs("PRECIO"))%> </td>   
            <td>
            <%Response.Write("<form method=POST action=reservar_vuelo.asp?idVuelo=" & rs("IDVUELO") & ">")%>
               <input type="submit" value ="Reservar">
            </form>
            </td>
        </tr>
        <p></p>
        <%rs.MoveNext 
        loop%>
    </table>  
    <a href="vuelos_disponibles.asp"><input type="button" value ="Volver"></a>
  
   <%      
      Conexion.Close
      Set rs = nothing
      Set Conexion = nothing	  	  
   %>   
</body>
</html>