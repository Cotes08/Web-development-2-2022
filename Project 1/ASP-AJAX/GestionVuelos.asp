<!-- #include file=conexion.asp -->
<!--#include file="seguridad.asp"-->
<html>
    <head>
        <title>Interfaz AJAX + ASP</title>
        
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

                    
                    
                    for (i = 0; i < xml.getElementsByTagName('vuelo').length; i++){
                    
                        // Accedemos al objeto XML 
                        item = xml.getElementsByTagName('vuelo')[i];

                        //Obtenemos la referencia del elemento
                        id = document.getElementById("idOrigen");
                        //Cogemos el valor 
                        v = item.getElementsByTagName('idOrigen')[0].firstChild.data;
                        //lo introducimos
                        id.value = v;
                        
                        //Obtenemos la referencia del elemento
                        id = document.getElementById("idDestino");
                        //Cogemos el valor 
                        v = item.getElementsByTagName('idDestino')[0].firstChild.data;
                        //lo introducimos
                        id.value = v; 


                        //Obtenemos la referencia del elemento
                        id = document.getElementById("fecha");
                        //Cogemos el valor 
                        v = item.getElementsByTagName('fecha')[0].firstChild.data;
                        //lo introducimos
                        id.value = v; 


                        //Obtenemos la referencia del elemento
                        id = document.getElementById("idCompania");
                        //Cogemos el valor 
                        v = item.getElementsByTagName('idCompania')[0].firstChild.data;
                        //lo introducimos
                        id.value = v;


                        //Obtenemos la referencia del elemento
                        id = document.getElementById("idAvion");
                        //Cogemos el valor 
                        v = item.getElementsByTagName('idAvion')[0].firstChild.data;
                        //lo introducimos
                        id.value = v;


                        //Obtenemos la referencia del elemento
                        id = document.getElementById("duracion");
                        //Cogemos el valor 
                        v = item.getElementsByTagName('duracion')[0].firstChild.data;
                        //lo introducimos
                        id.value = v;


                        //Obtenemos la referencia del elemento
                        id = document.getElementById("plazas");
                        //Cogemos el valor 
                        v = item.getElementsByTagName('plazas')[0].firstChild.data;
                        //lo introducimos
                        id.value = v;
                    }
                    
                }
            }
            
                
            function datos_vuelo(){
                
                // recupera el objeto html desplegable de companias
                var valor=document.getElementById("idVuelo").value;
                
                console.log(valor);

                // crea el objeto httprequest 
                oXML = AJAXCrearObjeto();
                //oXML.open('POST', 'ServVuelos.asp');
                oXML.open('GET', 'ServVuelos.asp?idVuelo='+valor);
                oXML.onreadystatechange = leerDatos;
                oXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                // lanza la peticion enviando los parametros 
                //oXML.send('idVuelo='+valor);
                oXML.send('');
            }

            function eleccion(){
                
                // recupera el objeto html desplegable de companias
                var valor0=document.getElementById("idVuelo").value;
                var valor1=document.getElementById("idOrigen").value;
                var valor2=document.getElementById("idDestino").value;
                var valor3=document.getElementById("fecha").value;
                var valor4=document.getElementById("idCompania").value;
                var valor5=document.getElementById("idAvion").value;
                var valor6=document.getElementById("duracion").value;
                var valor7=document.getElementById("plazas").value;
                

                oXML = AJAXCrearObjeto();
                if(valor0 == 0)
                {
                   
                    oXML.open('POST', 'insertar_vuelo.asp');
                    window.alert("Vuelo insertado correctamente");
                }
                else
                {
                    oXML.open('POST', 'modificar_vuelo.asp');
                    window.alert("Vuelo modificado correctamente");
                }
                oXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                // lanza la peticion enviando los parametros 
                oXML.send('idVuelo='+valor0+'&idOrigen='+valor1+'&idDestino='+valor2+'&fecha='+valor3+'&idCompania='+valor4+'&idAvion='+valor5+'&duracion='+valor6+'&plazas='+valor7);
            }
            
        </script>	
        
    </head>

    <body>
        <h1>Listado vuelos AJAX</h1>
        <br>
        <%
            SentenciaSQL = "Select IDVUELO from VUELO"
            Set rs = Conexion.Execute(SentenciaSQL)
        %>
        <select name="idVuelo" id="idVuelo" onChange="return datos_vuelo()">
            Id Vuelo: <option value="0">Seleccione una id</option> 
            <%
                Do While not rs.EOF
                    Response.Write("<option value="& rs("IDVUELO") &">"& rs("IDVUELO") &"</option> ")
                    rs.MoveNext
                Loop
            %>  
        </select>
        <br><br>
        ID ciudad origen: <input type="text" name="idOrigen" id="idOrigen" placeholder="1" value=""><br><br>
        ID ciudad destino: <input type="text" name="idDestino" id="idDestino" placeholder="1" value=""><br><br>
        Fecha: <input type="text" name="fecha" id="fecha" placeholder="28/04/2014" value=""><br><br>
        ID compa&ntilde;ia: <input type="text" name="idCompania" id="idCompania" placeholder="1" value=""><br><br>
        Id Avion: <input type="text" name="idAvion" id="idAvion" placeholder="1" value=""><br><br>
        Duracion: <input type="text" name="duracion" id="duracion" placeholder="50" value=""><br><br>
        Plazas disponibles: <input type="text" name="plazas" id="plazas" placeholder="161" value=""><br><br>
        <a href="menu.asp"><input type="button" value ="Volver"></a>
        <button onclick="eleccion()">Insertar/modificar vuelo</button>
        </form>    
    </body>
</html>