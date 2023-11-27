<!--#include file="conexion.asp"-->
<!--#include file="seguridad.asp"-->
<html>
   <head>
      <title>Listado de aviones</title>
   </head>
<body>
   <%
      SentenciaSQL = "Select IDAVION, AVION from AVION"
      Set rs = Conexion.Execute(SentenciaSQL)
   %>
      <h1>Listado de aviones: </h1>
      <table >
         <tr>
            <th>IDAVION</th>
            <th>AVION</th>
         </tr>
         <%do until rs.Eof%>
            <tr>        
               <td><%Response.Write("<a href = modificar_avion.asp?id=" & rs("IDAVION") & " >" & rs("IDAVION") & "</a>")%></td>
               <td><%=rs("AVION")%> </td> 
               <td>
               <%Response.Write("<form method= post action=eliminar_avion.asp?id=" & rs("IDAVION") & " >")%>
                  <input type="submit" value ="Eliminar">
               </form>
               </td>
            </tr>
            <p></p>
         <%rs.MoveNext 
         loop%>
      </table>  
      <a href="menu.asp"><input type="button" value ="Volver"></a>
      <a href="nuevo_avion.html"><input type="submit" value ="A&ntilde;adir avion" ></a>
  
   <%      
      Conexion.Close
      Set rs = nothing
      Set Conexion = nothing	  	  
   %>   
</body>
</html>


