<!-- #include file=conexion.asp -->
<!--#include file="seguridad.asp"-->
<%
    '  Script ASP programado con VBScript
    ' Realiza consulta en la base de datos y genera como resultato
    '  una lista de vuelos en formato XML

    'on Error Resume Next

	' Accedemos al compañía enviado desde la pagina principal
	'idVuelo=request.form("idVuelo")'
    idVuelo=request.QueryString("idVuelo")

    
    
     
    ' El contenido a devolver es XML
	response.ContentType="text/xml"
	response.CacheControl="no-cache, must-revalidate"


    ' Consulta SQL de las ciudades que son origen de algun vuelo

    SentenciaSQL = "Select * from VUELO WHERE IDVUELO ="&idVuelo

    Set rs = Conexion.Execute(SentenciaSQL)


    ' Se genera una salida XML con la lista de vuelos
	  
    if (not(rs.Eof)) then

		%><?xml version="1.0" encoding="UTF-8"?> <%
		response.write("<XML>")
  	     
        ' Recorremos el Recorset
        do until rs.Eof

	      response.write("<vuelo>")

            response.write("<idOrigen>")
            response.write( rs("IDCIUDADORIGEN") )
            response.write("</idOrigen>")

            response.write("<idDestino>")
            response.write( rs("IDCIUDADDESTINO") )
            response.write("</idDestino>")

            response.write("<fecha>")
            response.write( rs("FECHA") )
            response.write("</fecha>")

            response.write("<idCompania>")
            response.write( rs("IDCOMPANIA") )
            response.write("</idCompania>")

            response.write("<idAvion>")
            response.write( rs("IDAVION") )
            response.write("</idAvion>")

            response.write("<duracion>")
            response.write( rs("DURACION") )
            response.write("</duracion>")

            response.write("<plazas>")
            response.write( rs("N_PLAZAS_DISPONIBLES") )
            response.write("</plazas>")

          response.write("</vuelo>")
             
			 
		   rs.MoveNext
        loop

        response.write("</XML>")
    
    end if  
%>    