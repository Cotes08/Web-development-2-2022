<!--#include file="moddb.asp"-->
<!--#include file="seguridad.asp"-->
<%

    idAvion=Request.QueryString("id")
    avion = request.form("nombreAvion")
    n_plazas = request.form("n_plazas")
    precio_base = request.form("precio_base")

    SentenciaSQL="update AVION set AVION='"& avion & "', N_PLAZAS="& n_plazas & ", PRECIO_BASE="& precio_base & "where IDAVION= "&idAvion
    Set rs = Conexion.Execute(SentenciaSQL)
    
    Conexion.Close

    Set Conexcion = nothing

    response.redirect ("Listado_aviones.asp")

%>



            
            

           


