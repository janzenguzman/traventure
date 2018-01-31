
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" media="screen">
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <div class="col-lg-6">
        <h3>My Google Maps</h3>
        
        <form action="{{ route('add') }}" method="post">
                {{ csrf_field() }}
            <div class="form-group">
                <label>Address:</label>
                <input type="text" class="form-control" name="destination" id="destination"><br>
            </div>
            <div class="form-group">
                <label>Lat:</label>
                <input type="text" class="form-control" name="lat" id="lat"><br>
            </div>

            <div class="form-group">
                <label>Lng:</label>
                <input type="text" class="form-control" name="lng" id="lng"><br>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Add"><br>
            </div>
        </form>
        
        <div class="form-group">
            <div id="map"></div>
        </div>
    </div>

    <script type="text/javascript">
        
      function initMap() {
        var destination = {
            zoom:12,
            center:{lat: 10.3157, lng: 123.8854}
        }
        var map = new google.maps.Map(document.getElementById('map'), destination);
        
        var marker = new google.maps.Marker({
            position: {lat:10.3403, lng:123.9416},
            map: map,
            draggable: true
          });
          
        /*addMarker({lat:10.3403, lng:123.9416});

        function addMarker(coords){
            var marker = new google.maps.Marker({
                position: coords,
                map: map
            });
        }*/
        
        var searchBox = new google.maps.places.SearchBox(document.getElementById('destination'));

        google.maps.event.addListener(searchBox, 'places_changed', function(){
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, places;

            for(i=0; places=places[i]; i++){
                bounds.extend(places.geometry.location);
                marker.setPosition(places.geometry.location);
            }

            map.fitBound(bounds);
            map.setZoom(12)
        });

        google.maps.event.addListener(marker, 'position_changed', function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);
        });
    }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTJOuFQhHjI4jec4gTSD4_x0Ke7cI3bRg&callback=initMap&libraries=places">
    </script>
    <script type="text/javascript" src="{{ asset('js_user/jquery-1.11.3.min.js') }}"></script>
  </body>
</html>

///////////////////////////////////////////
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

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker[idx]);
          document.getElementById('latitude"'+idx+'"').value = lat;
            document.getElementById('longitude"'+idx+'"').value = lng;
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

//////////////////////////////

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" media="screen">
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <div class="col-lg-6">
        <h3>My Google Maps</h3>
        
        <form action="{{ route('add') }}" method="post" id="form">
                {{ csrf_field() }}
                <div class="container" >
                    <center><h2>Google Map Multiple Address - Web Source Buddy</h2></center>
                    <!--<div class="row" id="address_markers"></div>-->
                    <div class="row" id="">
                        <div class="panel panel-info">
                            <div class="panel-heading">Addresses</div>
                            <div class="panel-body" id="address_markers"></div>
                        </div>
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="control-label hidden-xs col-sm-2" for=""></label>
                    <div class="col-xs-12 col-sm-10">
                        <div class="input-group">
                            <!--<span class="input-group-addon"><i class="fa fa-globe"></i></span>-->
                            <input class="form-control" type="hidden" id="locationname" name="locationname" placeholder="Name of Location...">
                        </div>
                    </div>
                </div>
                <div id="latlongcontainer">
                    {{--  <div class="form-group">
                        <div class="col-sm-push-2 col-md-push-2 col-xs-6 col-sm-5 col-md-4">
                            <label class="sr-only" for="userlat"></label>
                            <input class="form-control" type="hidden" id="userlat" name="userlat" placeholder="Latitude...">
                        </div>
                        <div class="col-sm-push-1 col-md-push-2 col-xs-6 col-sm-5 col-md-4">
                            <label class="sr-only" for="userlong"></label>
                            <input class="form-control" type="hidden" id="userlong" name="userlong" placeholder="Longitude...">
                        </div>
                    </div>  --}}
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Add"><br>
                    </div>
                </div>
            </form>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div id="mapContainer">
                            <label class="sr-only" for="target"></label>
                            <input id="target" type="text" placeholder="Type Address" class="form-control">
                            <div id="map_canvas"></div>
                        </div>
                    </div>
                </div>
    </div>

    <script type="text/javascript">
        
      function initMap() {
        var markers = [];
        var infowindow = new google.maps.InfoWindow();
        var bounds = new google.maps.LatLngBounds();

        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            center: new google.maps.LatLng(53.4, -7.778),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoom: 6,
            panControl: false,
            streetViewControl: true,
            streetViewOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.LEFT_CENTER
            }
        });
        var input = (document.getElementById('target'));
        var searchBox = new google.maps.places.SearchBox(input);
        var marker;
     
        google.maps.event.addListener(searchBox, 'places_changed', function () {
            var places = searchBox.getPlaces();
            placeMarker(places[0].geometry.location);
            map.setZoom(16);
            map.setCenter(marker.getPosition());
        });
     
     
        function placeMarker(location)
        {
            marker = new google.maps.Marker({
                position: location,
                map: map
            });
     
            markers.push(marker);
            var mid = markers.length - 1;
            updateLocation(location, mid);
            bounds.extend(marker.position);
            map.fitBounds(bounds);
     
            var locName = $('#target').val();
            google.maps.event.addListener(marker, 'click', function () {
                infowindow.setContent('<div><strong>' + locName + '</strong><br>' +
                        'Lat: ' + location.lat().toFixed(5) + '<br>' +
                        'Lng' + location.lat().toFixed(6) + '</div>');
                infowindow.open(map, this);
            });
     
            $('#target').html('');
        }
     
        function updateLocation(event, mid)
        {
            $('#userlat').val(event.lat().toFixed(5));
            $('#userlong').val(event.lng().toFixed(6));
     
            $('#address_markers').append("<section id='" + mid + "' class='well'>");
            $('section#' + mid).append("<p><label>Location Name :</label> " + $('#target').val() + "</p>");
            $('section#' + mid).append("<p><label>Lat :</label> " + event.lat().toFixed(5) + "</p>");
            $('section#' + mid).append("<p><label>Lng : </label>" + event.lng().toFixed(6) + "<span><button value='" + mid + "' id='removemarker' class='btn btn-info pull-right' onclick='clearSingleMarker(this.value)' type='button'><i class='fa fa-trash-o'></i></button></span></p>");
            $('#address_markers').append("</section>");
     
     
        }
     
        google.maps.event.addListener(map, 'click', function (event) {
            //placeMarker(event.latLng);
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                "latLng": event.latLng
            }, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    //var lat = results[0].geometry.location.lat(),
                    //lng = results[0].geometry.location.lng();
                    $("#locationname").val(results[0].formatted_address);
                }
            });
        });
    }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTJOuFQhHjI4jec4gTSD4_x0Ke7cI3bRg&callback=initMap&libraries=places">
    </script>
    <script type="text/javascript" src="{{ asset('js_user/jquery-1.11.3.min.js') }}"></script>
  </body>
</html>
var searchBox = document.getElementsByClassName('destination');
       
        for (var x = 0; x < searchBox.length; x++) {
            var autocomplete = new google.maps.places.SearchBox(searchBox[x], marker);
        
        }