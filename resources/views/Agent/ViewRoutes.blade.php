@extends('layouts.user.headlayout')
<style>
#map_canvas {
    height: 500px;
    width: 100%;
}
</style>
@section('content')
<body>
<div class="container-wrapper">
    <header id="header">
        @extends('layouts.agent-navbar')
    </header>
    
    <div class="main-wrapper scrollspy-container">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::previous() }}">Package Details</a></li>
                    <li class="active">Routes</li>
                </ol>
            </div>
        </div>
        
        <div class="pt-30 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-6 mt-20">
                        <?php $temp = 0 ?>
                        @foreach($routes as $route)
                            @for($x=0; $x<count($route->package_id); ++$x)
                                @if($temp != $route->day)
                                    <h4 class="section-title"><i class="fa fa-map-marker"></i> Day {{$route->day}} Routes:</h4>
                                    <?php $temp = $route->day ?> 
                                @endif
                            @endfor
                        @endforeach
                        <div id="map_canvas"></div>
                    </div>
                    
                    <div id="sidebar-sticky" class="col-xs-12 col-sm-5 col-md-6 mt-20">
                        <aside class="sidebar-wrapper with-box-shadow">
                            <div class="sidebar-booking-box">
                                <div class="sidebar-booking-header clearfix">
                                    <div class="price">Destinations</div>
                                </div>
                                
                                <div class="sidebar-booking-inner">
                                    <ul class="price-summary-list">
                                        <ul class="price-summary-list">
                                            <li>
                                                <div class="row gap-10 mt-10">
                                                    <div class="col-xs-7 col-sm-7">
                                                        <h6 class="heading mt-20 mb-5 text-primary uppercase">TIME</h6>
                                                    </div>
                                                    <div class="col-xs-5 col-sm-5 text-right">
                                                        <h6 style="font-wight:bold"> 
                                                            <h6 class="heading mt-20 mb-5 text-primary uppercase">Destination</h6>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="divider"></li>

                                            <?php $points = 'A'?>
                                            @foreach($routes as $route)
                                                <li>
                                                    <div class="row gap-10 mt-10">
                                                        <div class="col-xs-7 col-sm-7">
                                                            <h6 style="font-wight:bold"> 
                                                                <span><span class="badge">{{$points++}}</span> {{date("g:i A", strtotime($route->starttime)) }} - {{ date("g:i A", strtotime($route->endtime)) }}</span>
                                                            </h6>
                                                        </div>
                                                        <div class="col-xs-5 col-sm-5 text-right">
                                                            <span>{{$route->destination}}</span>
                                                        </div>
                                                    <div>
                                                </li>
                                                <li class="divider"></li>
                                            @endforeach
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- start Footer Wrapper -->
    <div class="footer-wrapper scrollspy-footer">
            <footer class="bottom-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <center>
                                <p class="copy-right">&#169; 2017 Traventure - Tour and Booking System</p>
                            <center>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    <!-- end Footer Wrapper -->
</div>

<!-- start Back To Top -->
<div id="back-to-top">
<a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>
<!-- end Back To Top -->

@endsection
@extends('layouts.user.javascriptlayout')
<script>
    window.onload = function (){
        var geocoder;
        var map;
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();
        var locations = [
            @foreach($routes as $route)
                {
                    "title": "{{ $route->destination }}",
                    "lat": "{{ $route->lat }}",
                    "lng": "{{ $route->lng }}"
                },
            @endforeach
        ];

        directionsDisplay = new google.maps.DirectionsRenderer();
        var pin = {
            url: 'http://maps.gstatic.com/mapfiles/ms2/micons/pink-pushpin.png',
            size: new google.maps.Size(28, 32),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(0, 32)
        };
        var marker, i;
        var infowindow = new google.maps.InfoWindow();
        
        if(locations.length > 1){
            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 15,
                center: new google.maps.LatLng(10.3157, 123.8854),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var request = {
                travelMode: google.maps.TravelMode.DRIVING
            };

            directionsDisplay.setMap(map);
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
                    icon: pin,
                    map: map
                })
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i].title);
                        infowindow.open(map, marker);
                    }
                })(marker, i));

                if (i == 0) request.origin = marker.getPosition();
                else if (i == locations.length - 1) request.destination = marker.getPosition();
                else {
                    if (!request.waypoints) request.waypoints = [];
                        request.waypoints.push({
                            location: marker.getPosition(),
                            stopover: true
                    });
                }

            }
            directionsService.route(request, function(result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(result);
                }
            });
            
        
        }else{
            for (i = 0; i < locations.length; i++) {
                var map = new google.maps.Map(document.getElementById('map_canvas'), {
                    zoom: 15,
                    center: new google.maps.LatLng(locations[i].lat, locations[i].lng),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
                    icon: pin,
                    map: map
                })
                
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i].title);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
                
                console.log(locations[i].lat);
                console.log(locations[i].lng);
                console.log(locations[i].title);
            }
            
        }

        google.maps.event.addDomListener(window, "load");
    }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTJOuFQhHjI4jec4gTSD4_x0Ke7cI3bRg&libraries=places">
</script>
