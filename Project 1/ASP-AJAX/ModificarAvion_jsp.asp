<!-- #include file=conexion.asp -->
<!--#include file="seguridad.asp"-->
<html>
    <head>
        <title>Interfaz AJAX + ASP + JSP</title>
        
        <script type="text/javascript">

            // FUNCIONES JAVASCRIPT
                
            // Creamos el objeto AJAX httprequest

            function AJAXCrearObjeto(){
                var obj;
                        
                if (window.XMLHttpRequest) { // no es IE
                        
                    obj = new XMLHttpRequest();
                    //alert('El navegador no es IE');
                }        
                else { // Es IE o no tiene el objeto
                
                    try {
                    
                    obj = new ActiveXObject("Microsoft.XMLHTTP");
                        alert('El navegador utilizado es IE');
                    }
                    catch (e) {
                    
                    alert('El navegador utilizado no está soportado');
                    }
                }

                //alert('realizado');
                return obj;
            }
            
            function leerDatos(){
                        
                // Comprobamos que se han recibido los datos
                
                if (oXML.readyState == 4) {
                    
                    // Accedemos al XML recibido
                    var xml = oXML.responseXML.documentElement;

                    // Iteramos cada vuelo
                    var v;
                    var id;
                    var item;

                    
                    
                    for (i = 0; i < xml.getElementsByTagName('avion').length; i++){
                    
                        // Accedemos al objeto XML 
                        item = xml.getElementsByTagName('avion')[i];

                        //Obtenemos la referencia del elemento
                        id = document.getElementById("avion");
                        //Cogemos el valor 
                        v = item.getElementsByTagName('avion')[0].firstChild.data;
                        //lo introducimos
                        id.value = v;
                        
                        //Obtenemos la referencia del elemento
                        id = document.getElementById("n_plazas");
                        //Cogemos el valor 
                        v = item.getElementsByTagName('n_plazas')[0].firstChild.data;
                        //lo introducimos
                        id.value = v; 


                        //Obtenemos la referencia del elemento
                        id = document.getElementById("precio");
                        //Cogemos el valor 
                        v = item.getElementsByTagName('precio')[0].firstChild.data;
                        //lo introducimos
                        id.value = v; 
                    }
                    
                }
            }
            
                
            function datos_vuelo(){
                
                // recupera el objeto html desplegable de companias
                var valor=document.getElementById("idAvion").value;
                
                console.log(valor);

                // crea el objeto httprequest 
                oXML = AJAXCrearObjeto();
                //oXML.open('POST', 'ServVuelos.asp');
                oXML.open('GET', 'ServAvion.asp?idAvion='+valor);
                oXML.onreadystatechange = leerDatos;
                oXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                // lanza la peticion enviando los parametros 
                //oXML.send('idVuelo='+valor);
                oXML.send('');
            }
            
        </script>	
        
    </head>

    <body>
        <h1>Listado vuelos AJAX +JSP</h1>
        <br>
        <%
            SentenciaSQL = "Select IDAVION from AVION"
            Set rs = Conexion.Execute(SentenciaSQL)
        %>
        <form method= "post" action="http://localhost:8080/prueba/mod_avion.jsp">
            <select name="idAvion" id="idAvion" onChange="return datos_vuelo()">
                Id Vuelo: <option value="0">Seleccione una id</option> 
            <%
                Do While not rs.EOF
                    Response.Write("<option value="& rs("IDAVION") &">"& rs("IDAVION") &"</option> ")
                    rs.MoveNext
                Loop
            %>  
            </select>
            <br><br>
            Avion: <input type="text" name="avion" id="avion" placeholder="BOEING 747" ><br><br>
            Precio: <input type="text" name="precio" id="precio" placeholder="100" ><br><br>
            Numero de plazas: <input type="text" name="n_plazas" id="n_plazas" placeholder="161" ><br><br>
            <a href="menu.asp"><input type="button" value ="Volver"></a>   
            <input type="submit" value ="Modificar avion">
        </form> 
        
    </body>
</html>