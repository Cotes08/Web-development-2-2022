<!DOCTYPE html>
<html>
    <body>
    <%
        user=request.form("Usuario")
        password=request.form("Contrasenya")

        If user="admin" and password="1234" then
            session("autenticacion") = "True"
            response.redirect("menu.asp")
        else
            session("autenticacion") = "False"
            response.redirect("login.html")
        end if

    %>
    </body>
</html>