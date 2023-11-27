<%@page contentType="text/html; charset=iso-8859-1" language="java" import="java.sql.*,org.firebirdsql.management.*"%>

<html>
   <head>
      <title>Sus reservas</title>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   </head>

   <body bgcolor="#CCCCFF" text="#000000">

   <%@include file = "conexion.jsp"%>

      <%
         String idAvion = request.getParameter("idAvion");
         String avion = request.getParameter("avion");
         String precio = request.getParameter("precio");
         String n_plazas = request.getParameter("n_plazas");

         String sql ="update AVION set AVION=\'" + avion +"\' , N_PLAZAS= \'" + n_plazas +"\', PRECIO_BASE=\'" + precio +"\' where IDAVION= \'" + idAvion +"\'";
         PreparedStatement StatementRSFind = null;
         ResultSet RSFind = null;
         boolean resultException = false;
         boolean rsReady = false;
         

         try
         {
            StatementRSFind = connRSFind.prepareStatement(sql);
            StatementRSFind.execute();
            out.println("Registro insertado correctamente");
         } 
         catch(SQLException e1)
         {
            resultException = true;
            
            %>
               <p>Error: <%=e1.getMessage()%></p>
            <%
         }
         %>
            <br><br><a href="http://localhost/Entrega/AJAX/menu.asp"><input type="button" value ="Volver"></a>  
         <%
         if (StatementRSFind != null)
         StatementRSFind.close();


         connRSFind.close();
      %>

   </body>
</html>