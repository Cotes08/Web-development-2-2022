<!--#include file="moddb.asp"-->
<!--#include file="seguridad.asp"-->
<%


  idOrigen = request.form("idOrigen")
  idDestino = request.form("idDestino")
  fecha = request.form("fecha")
  idCompania = request.form("idCompania")
  idAvion = request.form("idAvion")
  duracion = request.form("duracion")
  plazas = request.form("plazas")

  SentenciaSQL="Select * from VUELO"
  rs.Open SentenciaSQL, Conexion

  rc=rs.recordcount
  rs.addnew
  rs("IDVUELO")= rc+1
  rs("IDCIUDADORIGEN")= idOrigen
  rs("IDCIUDADDESTINO")= idDestino
  rs("FECHA")= fecha
  rs("IDCOMPANIA")= idCompania
  rs("IDAVION")= idAvion
  rs("DURACION")= duracion
  rs("N_PLAZAS_DISPONIBLES")= plazas
  
  rs.update
  rs.close
 
%>
      
    