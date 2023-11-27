
<!--#include file="conexion.asp"-->
<!--#include file="seguridad.asp"-->
<%

    idAvion=Request.QueryString("id")

    SentenciaSQL="DELETE FROM AVION where IDAVION= "& idAvion
    Set rs = Conexion.Execute(SentenciaSQL)
    
    Conexion.Close

    Set Conexcion = nothing

    response.redirect ("Listado_aviones.asp")

%>