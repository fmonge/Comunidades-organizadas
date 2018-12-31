<!DOCTYPE html>
<html lang="en">
<head>
    <title>Comunidad organizada</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../jquery.mobile-1.1.1.min.css" />
    <script src="../jquery-1.8.2.min.js"></script>
    <script src="../jquery.mobile-1.1.1.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEPYKB-N0arXC7NY0HKivs9_hdOHnDXiA&callback=myMap"></script>
</head>
<body>
    <div id="add_report_security_page" data-role="page">
        <div data-role="header">
            <h1>Reporte de seguridad</h1>    
            <a href="report_type.html" data-rel="back">Back</a>
        </div><!-- /header -->

        <div data-role="content">    
           
            <form id="security<_report_form" data-ajax="false">
            
               
                <label for="title_security">Titulo:</label>
                <input type="text" name="title" id="title_security" value="" placeholder="Titulo" required />               

                <label for="Description_security">Descripción del incidente:</label>
               <textarea name="description" id="description_security" cols="50" rows="100" placeholder="Descripción"></textarea>
               
                <label for="date">Fecha de lo ocurrido:</label>
                <input type="date" name="date" id="date" value="">
                
                <label for="community" class="select">Comunidad:</label>
                <select name="community" id="community" data-native-menu="false">
                    <option>Comunidad</option>
                    <option value="1">Comunidad 1</option>
                    <option value="2">Comunidad 2</option>
                    <option value="3">Comunidad 3</option>
                    <option value="4">Comunidad 4</option>
                </select>
                
                <label for="sub_cat_report" class="select">Tipo de delito:</label>
                <select name="sub_cat_report" id="sub_cat_report" data-native-menu="false">
                    <option>Tipo de delito</option>
                    <option value="1">Asalto</option>
                    <option value="2">Actividad sospechosa</option>
                    <option value="3">Acoso</option>
                    <option value="4">Robo</option>
                </select>
                
                <label for="cat_weapon" class="select">Tipo de arma:</label>
                <select name="cat_weapon" id="cat_weapon" data-native-menu="false">
                    <option>Arma usada:</option>
                    <option value="1">Arma de fuego</option>
                    <option value="2">Arma blanca</option>
                </select>
                
                <label for="cat_transportation" class="select">Medio de transporte del perpetrador:</label>
                <select name="cat_transportation" id="cat_transportation" data-native-menu="false">
                    <option>Medio de transporte:</option>
                    <option value="1">Carro</option>
                    <option value="2">Motocicleta</option>
                    <option value="3">Bicicleta</option>
                </select>
                
                <label for="number_male" class="select">Numero de perpetradores masculinos:</label>
                <input type="number" data-clear-btn="true"  pattern="[0-9]*" id="number_male" value="">
                
                <label for="number_male" class="select">Numero de perpetradoras femeninas:</label>
                <input type="number" data-clear-btn="true" pattern="[0-9]*" id="number_female" value="">
                
                <label for="number_male_victims" class="select">Numero de victimas masculinos:</label>
                <input type="number" data-clear-btn="true"  pattern="[0-9]*" id="number_male_victims" value="">
                
                <label for="number_male" class="select">Numero de victimas femeninas:</label>
                <input type="number" data-clear-btn="true" pattern="[0-9]*" id="number_female_victims" value="">
                             
                <label for="state" class="select">Estado de la publicación:</label>
                <select name="state" id="state" data-native-menu="false">
                    <option>Estado</option>
                    <option value="1">Procesado legalmente</option>
                    <option value="2">Aun no procesado legalmente</option>
                    <option value="3">En proceso legal</option>
                </select>
                              
                               
                <label for="exampleInputLongitud">Longitud:</label>
                <input id="exampleInputLongitud" type="text" placeholder="" name="longitud" required>
            
                <label for="exampleInputLatitud">Latitud:</label>
                <input id="exampleInputLatitud" type="text" placeholder="" name="latitud" required>
                <label for="map">Seleccione un punto en el mapa para guardar la ubicacion exacta (longitud,latitud) del evento.</label><br><br>
                <div id="map" style="width:100%;height:400px;"></div>

                <script>
                  var map;
                  function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                      center: {lat: 9.8896299, lng: -84.2203189},
                      zoom: 8
                    });
                    google.maps.event.addListener(map, 'click', function (event) {
                        document.getElementById("exampleInputLatitud").value = event.latLng.lat();
                        document.getElementById("exampleInputLongitud").value = event.latLng.lng();
                    });
                  }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEPYKB-N0arXC7NY0HKivs9_hdOHnDXiA&callback=initMap"
                async defer>
                </script>
                <br>
                <label for="evidence">Evidencia:</label>
                <input type="file" data-clear-btn="true" name="evidence" id="evidence" value="">
                
           

                <input type="submit" value="Publicar" data-theme="b">

            
            
            </form>
            
            
        </div><!-- /header -->  
    </div>
    
</body>
</html>