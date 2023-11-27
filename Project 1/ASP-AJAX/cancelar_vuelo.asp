<!--#include file="conexion.asp"-->
<%

    idreserva=Request.QueryString("idreserva")

    cancelar=1

    SentenciaSQL="UPDATE RESERVA set CANCELADO= "& cancelar &" where IDRESERVA= "&idreserva
    Set rs = Conexion.Execute(SentenciaSQL)
    
    Conexion.Close
    if Conexion.Errors.Count>0 then
        for each objErr in Conexion.Errors
            response.write("<p>")
            response.write("Error al Cancelar: ")
            response.write(objErr.Description & "</p>")
        next
    else
        response.write("Cancelacion OK")
    end if
    Set Conexcion = nothing

%>


<a href="index.asp"><input type="button" value ="Volver"></a>