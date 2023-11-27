<%
    If session("autenticacion") <> "True" then
        response.redirect("login.html")  
    End if

%>