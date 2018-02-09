@extends('layouts.user.headlayout')
<style>
#map {
    height: 200px;
    width: 100%;
}
</style>
@section('content')
<body onload=initMap()>
    <div id="introLoader" class="introLoading"></div>
    <div class="container-wrapper">
        <header id="header">
            @extends('layouts.agent-navbar')
        </header>

        <div class="main-wrapper scrollspy-container">
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('Traveler.Explore') }}">Explore</a></li>
                        <li class="active">Edit Profile</li>
                    </ol>
                </div>
            </div>
            <form method="POST" action="{{ route('Agent.UpdateProfile') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="pt-30 pb-50">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-3 mt-20">
                                <aside class="sidebar-wrapper pr-5 pr-0-xs">
                                    <div class="image">
                                        <img src="/public/uploads/files/{{ Auth::user()->photo }}" class="img-circle" id="profile-img-tag" alt="images" />	
                                    </div>
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input type="file" name="photo" id="profile-img">
                                    </div>
                                </aside>
                            
                            </div>
                            
                            <div class="col-xs-12 col-sm-8 col-md-9 mt-20">
                                <div class="dashboard-wrapper">
                                    @include('layouts.user.alerts')
                                    <h4 class="section-title">Edit profile</h4>
                                    <div class="row gap-20">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input type="text" class="form-control" name="company_name" value="{{Auth::user()->company_name}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Office Address</label>
                                                <input type="text" class="form-control" id="officeAddress" name="office_address" value="{{Auth::user()->office_address}}">
                                                <input type="hidden" class="form-control" id="lat" name="lat" value="{{Auth::user()->lat}}">
                                                <input type="hidden" class="form-control" id="lng" name="lng"  value="{{Auth::user()->lng}}">
                                                <input type="hidden" class="form-control" name="city" id="locality" value="{{Auth::user()->city}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-12">
                                            <div id="map"></div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="fname" value="{{Auth::user()->fname}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="lname" value="{{Auth::user()->lname}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Job Position</label>
                                                <input type="text" class="form-control" name="job_position" value="{{Auth::user()->job_position}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Contact No</label>
                                                <input type="text" class="form-control" name="contact_no" value="{{Auth::user()->contact_no}}">
                                            </div>
                                        </div>
                                        
                                        <div class="clear mb-10"></div>

                                        <div class="col-sm-12">
                                            <input type="submit" class="btn btn-info btn-wide pull-right" value="Save">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
            
            <!-- end Main Wrapper -->
        
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
    </div>
    
    <!-- end Container Wrapper -->
    
    
<!-- start Back To Top -->

<div id="back-to-top">
    <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>
<!-- end Back To Top -->
@endsection
@extends('layouts.user.javascriptlayout')
</body>
</html>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTJOuFQhHjI4jec4gTSD4_x0Ke7cI3bRg&callback=initMap&libraries=places">
</script>
<script type="text/javascript">
    function initMap() {
        var lat = parseFloat(document.getElementById('lat').value);
        var lng = parseFloat(document.getElementById('lng').value);

        var marker;
        var autocompleteOptions = {
            componentRestrictions: {country: "PH"}
        };

        var componentForm ={
            locality: 'long_name'
        };

        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: lat,
                lng: lng
            },
            zoom: 15,
        });

        var marker = new google.maps.Marker({
			position:{
				lat:lat,
				lng:lng
			},
            map:map,
        });
        

        var searchBox = document.getElementById('officeAddress');
        var office_address = new google.maps.places.Autocomplete(searchBox, autocompleteOptions);

        var marker = new google.maps.Marker();
        var place;

        google.maps.event.addListener(office_address, 'place_changed', function () {
            place = office_address.getPlace();
            placeMarker(place.geometry.location);
            map.setZoom(16);
            map.setCenter(marker.getPosition());

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
    });

        function placeMarker(location)
        {   
            var bounds = new google.maps.LatLngBounds();
            var markers = [];
            marker = new google.maps.Marker({
                position: location,
                map: map,
                draggable: true
            });

            markers.push(marker);

            bounds.extend(marker.position);
            map.fitBounds(bounds);

            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);

            google.maps.event.addListener(marker, 'position_changed', function(){
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                $('#lat').val(lat);
                $('#lng').val(lng);
            });
        }
    }
</script>

