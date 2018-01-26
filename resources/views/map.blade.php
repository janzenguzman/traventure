{{--  <html>
    <head>
        <script type='text/javascript'>
            var centreGot = false;
        </script>

        
        {!! $map['js'] !!}
    </head>
<body>
    <div class="container">
        <div class="content">
                {!! $map['html'] !!}
        </div>
    </div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTJOuFQhHjI4jec4gTSD4_x0Ke7cI3bRg&libraries=places&sensor=false"
        type="text/javascript"></script>
    </scipt>
</body>

</html>  --}}
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
