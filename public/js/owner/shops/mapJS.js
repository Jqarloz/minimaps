var map, marker;
var postal_code, locality, political, country, address;

function initMap() {
    var posX = document.getElementById("geoLatitude").value;
    var posY = document.getElementById("geoLongitude").value;

    var location = new google.maps.LatLng(posX, posY);
    var mapProperty = {
        center: location,
        zoom: 17,         
        mapTypeControl: false,
        streetViewControl: false,
        mapId: '19190b11ce75aea2'
    };

    map = new google.maps.Map(document.getElementById('map'), mapProperty);

    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: location
    });

    geocodePosition(marker.getPosition());

    //EVENTO PARA GEOLOCALIZACION DEL NAVEGADOR
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(function (position){
            pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            marker.setPosition(pos);
            map.setCenter(marker.getPosition());
            geocodePosition(marker.getPosition());
        });
    }

    //EVENTO AL USAR DOBLE CLIC
    google.maps.event.addListener(map, 'dblclick', function(e) {     
        marker.setPosition(e["latLng"]);
        map.setCenter(marker.getPosition());
        geocodePosition(marker.getPosition());
    });  

    //EVENTO AL ARRASTRAR
    google.maps.event.addListener(marker, 'dragend', function(){
        map.setCenter(marker.getPosition());
        geocodePosition(marker.getPosition());
    });

    //EVENTO PARA BUSCAR POR INPUT
    var buttonSearch = document.getElementById("buttonSearch");
    buttonSearch.addEventListener("click", function(){
        var searchAddress = document.getElementById('searchAddress').value;
        geocoder.geocode( { 'address': searchAddress}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                
                $("#addressLabel").html(results[0].formatted_address);
                $("#searchError").html('');

                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);

                setVariablesGlobales(results);
            } else {
                $("#searchError").html('Error al buscar dirección ingresada: '+ status);
                $("#addressLabel").html('');
            }
        });
    }, false);

    //EVENTO PARA ASIGNAR VALORES A INPUT
    var buttonOK = document.getElementById("buttonOK");
    buttonOK.addEventListener("click", function (){
            setInputValues();
    }, false); 

}

//FUNCTION GEOCODE PARA ARRASTRAR, DOBLE CLIC
function geocodePosition(pos){
    geocoder = new google.maps.Geocoder();
    geocoder.geocode({
        latLng: pos
    },
    function(results,status){
        if(status == google.maps.GeocoderStatus.OK){
            $("#addressLabel").html(results[0].formatted_address);
            setVariablesGlobales(results);
            $("#searchError").html('');
            $("#searchAddress").val('');
        }else{
            $("#searchError").html('Error al buscar dirección ingresada: '+ status);
            $("#addressLabel").html('');
            $("#searchAddress").val('');
        }
    }
    );
}

function setInputValues(){
    
    //Assignacion de variables a modelo Livewire mediante emit
    var latitude = marker.getPosition().lat();
    var longitud = marker.getPosition().lng();

    Livewire.emit('getAddressForInput', latitude, longitud, postal_code, locality, political, country, address);
    Livewire.emit('getGeoLocation', latitude, longitud);

}

function setVariablesGlobales(results){
    for (var i=0; i<results[0].address_components.length; i++)
    {
        if (results[0].address_components[i].types[0] == "street_number") {
            //obtener numero de casa
            var street_number = results[0].address_components[i].long_name;
        }
        if (results[0].address_components[i].types[0] == "route") {
            //obtener calle
            var route = results[0].address_components[i].long_name;
        }
        if (results[0].address_components[i].types[0] == "locality") {
            //obtener localidad
            locality = results[0].address_components[i].long_name;
        }
        if (results[0].address_components[i].types[0] == "administrative_area_level_1") {
            //obtener ciudad
            political = results[0].address_components[i].long_name;
        }
        if (results[0].address_components[i].types[0] == "country") {
            //obtener pais 
            country = results[0].address_components[i].long_name;
        }
        if (results[0].address_components[i].types[0] == "postal_code") {
            //obtener codigo postal
            postal_code = results[0].address_components[i].long_name;
        }
    }
    if (street_number == 'undefined' || street_number == 'Unnamed Road') {
        street_number = '';
    }
    if (route == 'undefined' || route == 'Unnamed Road') {
        route = '';
    }

    if (route =='' && street_number == ''){
        address = '';
    }else{
        address = route + ' ' + street_number;
    }
    
}
