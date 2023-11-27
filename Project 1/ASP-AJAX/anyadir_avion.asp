<!--#include file="moddb.asp"-->
<!--#include file="seguridad.asp"-->
<%

  avion = request.form("nombreAvion")
  n_plazas = request.form("n_plazas")
  precio_base = request.form("precio_base")

  SentenciaSQL="Select * from AVION"
  rs.Open SentenciaSQL, Conexion

  rc=rs.recordcount
  rs.addnew
  rs("IDAVION")= rc+1
  rs("AVION")= avion
  rs("N_PLAZAS")= n_plazas
  rs("PRECIO_BASE")= precio_base

  rs.update
  rs.close
  response.redirect ("Listado_aviones.asp")
%>
      
    

             
  