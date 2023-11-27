<!-- #include file=conexion.asp -->
<!--#include file="seguridad.asp"-->
<%
    '  Script ASP programado con VBScript
    ' Realiza consulta en la base de datos y genera como resultato
    '  una lista de vuelos en formato XML

    'on Error Resume Next

	' Accedemos al compañía enviado desde la pagina principal
	'idVuelo=request.form("idVuelo")'
    idAvion=request.QueryString("idAvion")

    
    
     
    ' El contenido a devolver es XML
	response.ContentType="text/xml"
	response.CacheControl="no-cache, must-revalidate"


    ' Consulta SQL de las ciudades que son origen de algun vuelo

    SentenciaSQL = "Select * from AVION WHERE IDAVION ="&idAvion

    Set rs = Conexion.Execute(SentenciaSQL)


    ' Se genera una salida XML con la lista de vuelos
	  
    if (not(rs.Eof)) then

		%><?xml version="1.0" encoding="UTF-8"?> <%
		response.write("<XML>")
  	     
        ' Recorremos el Recorset
        do until rs.Eof

	      response.write("<avion>")

            response.write("<avion>")
            response.write( rs("AVION") )
            response.write("</avion>")

            response.write("<precio>")
            response.write( rs("PRECIO_BASE") )
            response.write("</precio>")

            response.write("<n_plazas>")
            response.write( rs("N_PLAZAS") )
            response.write("</n_plazas>")

          response.write("</avion>")
             
			 
		   rs.MoveNext
        loop

        response.write("</XML>")
    
    end if  
%>    