<%@page contentType="text/html; charset=iso-8859-1" language="java" import="java.sql.*,org.firebirdsql.management.*"%>

<html>
   <head>
      <title>Sus reservas</title>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   </head>

   <body bgcolor="#CCCCFF" text="#000000">
   <h1>Sus reservas: </H1>

   <%@include file = "conexion.jsp"%>
         
      

      <%

         String dni = request.getParameter("dni");
         String ciudadOrigen = request.getParameter("ciudadOrigen");
         ciudadOrigen.toUpperCase();

         String sql = "SELECT LR.IDRESERVA, R.IDVUELO, R.APELLIDOS, R.NOMBRE, LR.CIUDAD_ORIGEN, LR.CIUDAD_DESTINO, LR.FECHA_VUELO, LR.COMPANIA, LR.CANCELADO FROM RESERVA R, LISTADO_RESERVAS LR WHERE LR.NIF = \'" + dni +"\' AND LR.CIUDAD_ORIGEN= \'" + ciudadOrigen +"\' AND LR.IDRESERVA = R.IDRESERVA";  
         PreparedStatement StatementRSFind = null;
         ResultSet RSFind = null;
         boolean resultException = false;
         boolean rsReady = false;

         try
         {
            StatementRSFind = connRSFind.prepareStatement(sql);
            RSFind = StatementRSFind.executeQuery();
            rsReady = RSFind.next();
         } 
         catch(SQLException e1)
         {
            resultException = true;
            
            %>
               <p>Error: <%=e1.getMessage()%></p>
            <%
         }

         if(rsReady)
         {
            %>
               <table border="1">
                  <tr>
                     <th>IDRESERVA</th>
                     <th>IDVUELO</th>
                     <th>APELLIDOS</th>
                     <th>NOMBRE</th>
                     <th>CIUDAD_ORIGEN</th>
                     <th>CIUDAD_DESTINO</th>
                     <th>FECHA_VUELO</th>
                     <th>COMPANIA</th>
                     <th>CANCELADO</th>
                  </tr>

                  <%
                     boolean done = false;

                     while(!done)
                     {
                        String IDRESERVA = RSFind.getString("IDRESERVA");
                        String IDVUELO = RSFind.getString("IDVUELO");
                        String APELLIDOS = RSFind.getString("APELLIDOS");
                        String NOMBRE = RSFind.getString("NOMBRE");
                        String CIUDAD_ORIGEN = RSFind.getString("CIUDAD_ORIGEN");
                        String CIUDAD_DESTINO = RSFind.getString("CIUDAD_DESTINO");
                        String FECHA_VUELO =  RSFind.getString("FECHA_VUELO");
                        String COMPANIA = RSFind.getString("COMPANIA");
                        String CANCELADO = RSFind.getString("CANCELADO");
                  %>
                        <tr>
                           <td><%=IDRESERVA%></td>
                           <td><%=IDVUELO%></td>
                           <td><%=APELLIDOS%></td>
                           <td><%=NOMBRE%></td>
                           <td><%=CIUDAD_ORIGEN%></td>
                           <td><%=CIUDAD_DESTINO%></td>
                           <td><%=FECHA_VUELO%></td>
                           <td><%=COMPANIA%></td>
                           <td><%=CANCELADO%></td>

                        </tr>
                        <%
                        done = !RSFind.next();
                     }
                  %>
               </table>  
               <a href="http://localhost/Entrega/AJAX/index.asp"><input type="button" value ="Volver"></a> 
            <%   
         }
         else
         {
            %>
            <p>The result set was empty. Check to be sure database is running and settings in search.jsp are correct.</p>
            <%
         }
         if (StatementRSFind != null)
         StatementRSFind.close();

         if (connRSFind != null)
         connRSFind.close();
      %>

   </body>
</html>