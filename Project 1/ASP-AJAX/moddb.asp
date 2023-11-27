<!--#include file="conexion.asp"-->
<%
  set rs=Server.CreateObject("ADODB.Recordset")
  rs.CursorType = 1
  rs.LockType = 3
  Conexion.Mode = 3
%>  