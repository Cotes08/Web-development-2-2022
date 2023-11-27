<!--#include file="conexion.asp"-->
<html>
   <head>
      <title>Vuelos disponibles </title>
   </head>
<body>
   <%
      SentenciaSQL = "Select IDCIUDAD, CIUDAD from CIUDAD"
      Set rs = Conexion.Execute(SentenciaSQL)
    %>

    <h1>Seleccione los vuelos que desee ver</h1>
    <form method="post" action="listado_vuelos.asp">
        <br>
        <select name="Ciudades_origen">
            <option selected value="0">Todos los origenes</option> 
            <%
                Do While not rs.EOF
                    Response.Write("<option value="& rs("IDCIUDAD") &">"& rs("CIUDAD") &"</option> ")
                    rs.MoveNext
                Loop
            %>  
        </select>

        <select name="Ciudades_destino">
            <option selected value="0">Todos los destinos</option> 
            <%
                rs.MoveFirst
                Do While not rs.EOF
                    Response.Write("<option value="& rs("IDCIUDAD") &">"& rs("CIUDAD") &"</option> ")
                    rs.MoveNext
                Loop
            %>  
        </select>

        <input type="submit" value ="Buscar ">
        <a href="index.asp"><input type="button" value ="Volver"></a>
    </form>
    
         

   <%      
      Conexion.Close
      Set rs = nothing
      Set Conexion = nothing	  	  
   %>   
</body>
</html>