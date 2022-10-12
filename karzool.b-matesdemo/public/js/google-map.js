var map; 
var marker = false;

function initMap() {
 
    var defaultLatitude = parseFloat(document.getElementById('latitude').value);
    var defaultLongitude = parseFloat(document.getElementById('longitude').value);
    //The center location of our map.
    var centerOfMap = new google.maps.LatLng(Math.round(defaultLatitude, 6), Math.round(defaultLongitude, 6));
 
    //Map options.
    var options = {
      center: centerOfMap, //Set center.
      zoom: 7 //The zoom value.
    };
 
    //Create the map object.
    map = new google.maps.Map(document.getElementById('map'), options);
    if (24.774265 != defaultLatitude || 46.738586 != defaultLongitude) {
        marker = new google.maps.Marker({
                position: { lat: defaultLatitude, lng: defaultLongitude},
                map: map,
                draggable: true //make it draggable
            });
    }
 
    //Listen for any clicks on the map.
    google.maps.event.addListener(map, 'click', function(event) {                
        //Get the location that the user clicked.
        var clickedLocation = event.latLng;
        if (marker === false) {
            //Create the marker.
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(marker, 'dragend', function(event){
                markerLocation();
            });
        } else{
            //Marker has already been added, so just change its location.
            marker.setPosition(clickedLocation);
        }
        //Get the marker's location.
        markerLocation();
    });
}
        
//This function will get the marker's current location and then add the lat/long
//values to our textfields so that we can save the location.
function markerLocation(){
    //Get location.
    var currentLocation = marker.getPosition();
    //Add lat and lng values to a field that we can save.
    document.getElementById('latitude').value = currentLocation.lat(); //latitude
    document.getElementById('longitude').value = currentLocation.lng(); //longitude
    //var latlng = { lat: currentLocation.lat(), lng: currentLocation.lng() };
    /*
    var geocoder = new google.maps.Geocoder;
    geocoder.geocode({'location': latlng}, function(results, status) {
        if (status === 'OK') {
            if (results[0]) {
                //map.setZoom(9);
                var address_options = '';
                var a;
                for(var i in results) {
                    a = escape(results[i].formatted_address);
                    address_options += '<option value="' +  a + '">' + a + '</option>';
                    if (i > 3) {
                        break;
                    }
                }
                document.getElementById('address').innerHTML = address_options;
            } else {
                console.log(status);
            }
        } else {
            console.log(status);
        }
    });*/
}
