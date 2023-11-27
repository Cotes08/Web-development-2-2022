<!-- #include file=conexion.asp -->
<%
    '  Script ASP programado con VBScript
    ' Realiza consulta en la base de datos y genera como resultato
    '  una lista de vuelos en formato XML

    'on Error Resume Next

	' Accedemos al compañía enviado desde la pagina principal
	origen=request.form("Ciudades_origen") 
	 
	 
    ' El contenido a devolver es XML
	response.ContentType="text/xml"
	response.CacheControl="no-cache, must-revalidate"


    ' Consulta SQL de las ciudades que son origen de algun vuelo

    SentenciaSQL = "Select DISTINCT IDCIUDADDESTINO from VUELO where IDCIUDADORIGEN =" & origen

    Set rs = Conexion.Execute(SentenciaSQL)


    ' Se genera una salida XML con la lista de vuelos
	  
    if (not(rs.Eof)) then

		%><?xml version="1.0" encoding="UTF-8"?> <%
		response.write("<XML>")
  	     
        ' Recorremos el Recorset
        do until rs.Eof

	      response.write("<vuelo>")

            response.write("<ciudad_destino>")
            response.write( rs("IDCIUDADDESTINO") )
            response.write("</ciudad_destino>")

            response.write("<nom_ciudad_destino>")
            SQL = "Select CIUDAD from CIUDAD where IDCIUDAD =" &  rs("IDCIUDADDESTINO")
            Set rs2 = Conexion.Execute(SQL)
            response.write( rs2("CIUDAD") )
            response.write("</nom_ciudad_destino>")

          response.write("</vuelo>")
             
			 
		   rs.MoveNext
        loop

        response.write("</XML>")
    
    end if  
%>    