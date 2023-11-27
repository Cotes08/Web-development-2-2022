<!-- #include file=conexion.asp -->
<html>
    <head>
        <title>Listado vuelos AJAX</title>
        
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
                  
            // Recibe y muestra los vuelos que pertenecen a la compania seleccionada

            function leerDatos(){
                        
                // Comprobamos que se han recibido los datos
                
                if (oXML.readyState == 4) {
                    
                    // Accedemos al XML recibido
                    var xml = oXML.responseXML.documentElement;

                    // Accedemos al componente html correspondiente a la tabla
                    var tabla = document.getElementById('tabla_vuelos');
                    
                    // Vaciamos el DIV
                    var definicion_tabla = new String("");

                    // cadena con los datos para crear la tabla
                    definicion_tabla ='<th>Id Vuelo</th><th>ID Ciudad Origen</th><th>ID Ciudad Destino</th><th>Fecha</th><th>Compa&ntilde;&iacute;a</th><th>Plazas Disponibles</th><th>Duraci&oacute;n</th><th>ID Avi&oacute;n</th><tr>';
                    


                    // Iteramos cada vuelo
                    var v;
                    var reserva;
                    var item;

                    
                    
                    for (i = 0; i < xml.getElementsByTagName('vuelo').length; i++){
                    
                        // Accedemos al objeto XML 
                        item = xml.getElementsByTagName('vuelo')[i];

                        //Recuperamos el identificador de vuelo
                        v = item.getElementsByTagName('idvuelo')[0].firstChild.data; 
                        
                        reserva = v;

                        
                        // Añadimos el campo a la tabla
                        definicion_tabla =definicion_tabla+'<td>'+ v +'</td>';
                        

                        // Recuperamos el id de la ciudad de origen
                        v = item.getElementsByTagName('ciudad_origen')[0].firstChild.data;

                        // Añadimos el campo a la tabla
                        definicion_tabla =definicion_tabla+'<td>'+ v +'</td>';


                        // Recuperamos el id de la ciudad destino
                        v = item.getElementsByTagName('ciudad_destino')[0].firstChild.data;

                        // Añadimos el campo a la tabla
                        definicion_tabla= definicion_tabla+'<td>' + v +'</td>';

                        // Recuperamos la fecha
                        v = item.getElementsByTagName('fecha')[0].firstChild.data;

                        // Añadimos el campo a la tabla
                        definicion_tabla= definicion_tabla+'<td>' + v + '</td>';

                        // Recuperamos la compania
                        v = item.getElementsByTagName('compania')[0].firstChild.data;

                        // Añadimos el campo a la tabla
                        definicion_tabla= definicion_tabla+'<td>' + v + '</td>';

                        // Recuperamos el numero de planzas disponibles
                        v = item.getElementsByTagName('n_plazas_disponibles')[0].firstChild.data;

                        // Añadimos el campo a la tabla
                        definicion_tabla= definicion_tabla+'<td>' + v + '</td>';

                        // Recuperamos la duracion del vuelo
                        v = item.getElementsByTagName('duracion')[0].firstChild.data;

                        // Añadimos el campo a la tabla
                        definicion_tabla= definicion_tabla+'<td>' + v + '</td>';

                        // Recuperamos el id de avion
                        v = item.getElementsByTagName('avion')[0].firstChild.data;

                        // añadimo el campo a la tabla
                        definicion_tabla= definicion_tabla+'<td>' + v + '</td>';

                        definicion_tabla= definicion_tabla+'<td> <a href="reservar_vuelo.asp?idVuelo='+ reserva +'"><input type="button" value ="Reservar"></a> </td></tr>';
                
                    }

                    // rellenamos el objeto html tabla con la definicion construida
                    tabla.innerHTML = definicion_tabla;
                    
                }
                

            }

            function campo_destino()
            {
                
                if (oXML2.readyState == 4) {
                    
                    // Accedemos al XML recibido
                    var xml = oXML2.responseXML.documentElement;

                    // Accedemos al componente html correspondiente a la tabla
                    var destino = document.getElementById('Ciudades_destino');
                    
                    // Vaciamos el DIV
                    var definicion_select = new String('<option value="0">Seleccione el destino</option> ');
                    

                    // Iteramos cada vuelo
                    var v;
                    var v2;
                    var item;

                    
                    
                    for (i = 0; i < xml.getElementsByTagName('vuelo').length; i++){
                    
                        // Accedemos al objeto XML 
                        item = xml.getElementsByTagName('vuelo')[i];
                        
                        // Recuperamos el id de la ciudad de destino
                        v = item.getElementsByTagName('nom_ciudad_destino')[0].firstChild.data;
                        // Recuperamos el nombre de la ciudad destino
                        v2 = item.getElementsByTagName('ciudad_destino')[0].firstChild.data;

                        // Añadimos el campo a la tabla
                        definicion_select =definicion_select+'<option value='+ v2 +'>'+v+'</option> ';
                    }

                    // rellenamos el objeto html tabla con la definicion construida
                    destino.innerHTML = definicion_select;
                }
            }
                
            function mostrar_vuelos(){
                
                // recupera el objeto html desplegable de companias
                var valorx=document.getElementById("Ciudades_origen").value;
                var valory=document.getElementById("Ciudades_destino").value;
                

                // crea el objeto httprequest 
                oXML = AJAXCrearObjeto();
                oXML.open('POST', 'consulta.asp');
                oXML.onreadystatechange = leerDatos;
                oXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                // lanza la peticion enviando los parametros 
                oXML.send('Ciudades_origen='+valorx+'&Ciudades_destino='+valory);
            }

            function actualizar_destino()
            {
                // recupera el objeto html desplegable de companias
                var valorx=document.getElementById("Ciudades_origen").value;
                

                // crea el objeto httprequest 
                oXML2 = AJAXCrearObjeto();
                oXML2.open('POST', 'consulta2.asp');
                oXML2.onreadystatechange = campo_destino;
                oXML2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                // lanza la peticion enviando los parametros 
                oXML2.send('Ciudades_origen='+valorx);

            }
            
        </script>	
        
    </head>

    <body>
        <br>
        <h1>Listado vuelos AJAX</h1>
        <br>
        <%
            SentenciaSQL = "Select IDCIUDAD, CIUDAD from CIUDAD order by IDCIUDAD"
            Set rs = Conexion.Execute(SentenciaSQL)
        %>
        <select name="Ciudades_origen" id="Ciudades_origen" onChange="return actualizar_destino()">
            <option value="0">Seleccione el origen</option> 
            <%
                Do While not rs.EOF
                    Response.Write("<option value="& rs("IDCIUDAD") &">"& rs("CIUDAD") &"</option> ")
                    rs.MoveNext
                Loop
            %>  
        </select>

        <select name="Ciudades_destino" id="Ciudades_destino"onChange=" return mostrar_vuelos()">
            <option value="0">Seleccione el destino</option>  
        </select>

        <br><br>

        <table id="tabla_vuelos" name="tabla_vuelos" border=1></table>
        <br><br>
        <a href="index.asp"><input type="button" value ="Volver"></a>

    </body>
</html>