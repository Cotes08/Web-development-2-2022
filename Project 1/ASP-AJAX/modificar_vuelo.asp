<!--#include file="moddb.asp"-->
<!--#include file="seguridad.asp"-->
<%
    idVuelo = Request.Form("idVuelo")
    idOrigen = request.form("idOrigen")
    idDestino = request.form("idDestino")
    fecha = request.form("fecha")
    idCompania = request.form("idCompania")
    idAvion = request.form("idAvion")
    duracion = request.form("duracion")
    plazas = request.form("plazas")

    SentenciaSQL="update VUELO set IDCIUDADORIGEN="& idOrigen & ", IDCIUDADDESTINO= "& idDestino & ", FECHA='"& fecha &"', IDCOMPANIA="& idCompania & ", IDAVION="& idAvion & ", DURACION="& duracion & ", N_PLAZAS_DISPONIBLES="& plazas &" where IDVUELO= "&idVuelo
    Set rs = Conexion.Execute(SentenciaSQL)
    
    Conexion.Close

    

%>

