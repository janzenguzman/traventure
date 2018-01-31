<!DOCTYPE html>
<html>
<head>
<title>test</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTJOuFQhHjI4jec4gTSD4_x0Ke7cI3bRg&callback=initialize&libraries=places">
</script>
<script>
var map = null;
var marker = [];
var autocomplete = [];

var autocompleteOptions = {
    componentRestrictions: {country: "PH"}
};

$(document).ready(function(){
    var count = 2;
    $("#addInputField").click(function(){
        count++;
        console.log('add new input field');
        $("#inputlar").append("<input id='pac-input" + count + "' class='controlsInput' type='text' placeholder='Enter your destination' /> <br /><input id='longitude" + count + "' class='controlsInput' type='text' placeholder='Enter your destination' /> <br /><input id='latitude" + count + "' class='controlsInput' type='text' placeholder='Enter your destination' /> <br />");
        
        var newInput = [];
        var newEl = document.getElementById('pac-input' + count);
        newInput.push(newEl);
        setupAutocomplete(autocomplete, newInput, 0);
        
        if (count === 7) {
            $("#addInputField").remove();
        }
    });    
});

function setupAutocomplete(autocomplete, inputs, i) {
    console.log('setupAutocomplete...');

        // autocomplete[i] = new google.maps.places.Autocomplete(inputs[i], autocompleteOptions);
        autocomplete.push(new google.maps.places.Autocomplete(inputs[i], autocompleteOptions));
        var idx = autocomplete.length - 1;
        //autocomplete[i].bindTo('bounds', map);
        autocomplete[idx].bindTo('bounds', map);
        
        

        //google.maps.event.addListener(autocomplete[i], 'place_changed', function() {
        google.maps.event.addListener(autocomplete[idx], 'place_changed', function() {
          var infowindow = new google.maps.InfoWindow();
          if (marker[idx] && marker[idx].setMap) {
             marker[idx].setMap(null);
             marker[idx] = null;
          }
          marker[idx] = new google.maps.Marker({
                map: map
          });  
          infowindow.close();
          marker[idx].setVisible(false);
          var place = autocomplete[idx].getPlace();
          if (!place.geometry) {
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }

          marker[idx].setPosition(place.geometry.location);
          marker[idx].setVisible(true);
          var lat = place.geometry.location.lat();
          var lng = place.geometry.location.lng();
          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong><input type="text" value="' + place.name +'">' + place.name + +lng+ ' || ' +lng+'</strong><br>' + address);
          infowindow.open(map, marker[idx]);
          document.getElementById('latitude').value = lat[idx];
            document.getElementById('longitude"'+idx+'"').value = lng[idx];
        });
    }

function initialize() {
    var mapOptions = {
        center: new google.maps.LatLng(40.4700, 50.0000),
        zoom: 10,
        zoomControl:true,
        zoomControlOptions: {
          style:google.maps.ZoomControlStyle.SMALL
        },
        mapTypeControl:true,
        mapTypeControlOptions: {
          style:google.maps.MapTypeControlStyle.DROPDOWN_MENU 
        }
      };
    map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);
    var types = document.getElementById('type-selector');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);


    var inputs = document.getElementsByClassName("controlsInput");
    for (var i = 0; i < inputs.length; i++) {  
       setupAutocomplete(autocomplete, inputs, i);
    }
    
    // Sets a listener on a radio button to change the filter type on Places
    // Autocomplete.
    function setupClickListener(id, types) {
        var radioButton = document.getElementById(id);
        google.maps.event.addDomListener(radioButton, 'click', function() {
            for (var i=0 ; i<autocomplete.length; i++) {
                autocomplete[i].setTypes(types);
            }
        });
    }

      setupClickListener('changetype-all', []);
      setupClickListener('changetype-establishment', ['establishment']);
      setupClickListener('changetype-geocode', ['geocode']);
    }


</script>
</head>

<body>
    <table>
                <tr>
                    <td>
                        <div>
                            <div id="inputlar">
                            <input id="pac-input" class="controlsInput" type="text" placeholder="Marşrutunuzu haradan başlayırsınız" /> <br />
                            <input id="pac-input2" class="controlsInput" type="text" placeholder="Haraya gedirsiniz"> <br />
                            </div>  <br />
                            <input id="addInputField" type="button" value="Yolüstü dayanacaq əlavə et" class="styled-button-10"/>

                            <div hidden="hidden" id="type-selector" class="controls">
                              <input type="radio" name="type" id="changetype-all" checked="checked">
                              <label for="changetype-all">All</label>

                              <input type="radio" name="type" id="changetype-establishment">
                              <label for="changetype-establishment">Establishments</label>

                              <input type="radio" name="type" id="changetype-geocode">
                              <label for="changetype-geocode">Geocodes</label>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div id="map-canvas" style="width:540px;height:380px;"></div>
                    </td>
                </tr>
            </table>
</body>
</html>