@extends('layouts.user.headlayout')
@section('content')
<body class="transparent-header">
    <div class="container-wrapper">
        <header id="header">
            @extends('layouts.agent-navbar')
        </header>
		
		<div class="main-wrapper scrollspy-container">
			<div class="breadcrumb-image-bg pb-100 no-bg" style="background-image:url({{asset('/uploads/files/osmena.jpg')}});">
				<div class="container">
					<div class="page-title">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
								<h2>Create Itinerary</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="bg-light">
				<div class="create-tour-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
								<div class="form">
									<div class="create-tour-inner">
										<div class="mb-40"></div>
                                        <h4 class="section-title">Itinerary</h4>
                                        <div class="itinerary-form-wrapper">
                                            <div class="itinerary-form-item">
                                                <div class="content clearfix">
                                                    <div class="row gap-20">
                                                        <?php $des = 0?>
                                                        @foreach($packages as $package)
                                                            <?php $des++?>
                                                            <div class="col-xss-12 col-xs-10 col-sm-10 col-md-6">
                                                                <div class="day">
                                                                    <span class="text-primary block number spacing-1">Destination {{ $des }}</span>
                                                                </div>
                                                                <div class="form-group">
                                                                    {{--  <label>Time:</label>  --}}
                                                                    <p>({{ date("g:i A", strtotime($package->starttime)) }} - {{ date("g:i A", strtotime($package->endtime)) }})<br><b>{{$package->destination}}</b></p>
                                                                    
                                                                </div>
                                                                <div class="mb-25"></div>
                                                                <div class="bb"></div>
                                                                <div class="mb-25"></div>
                                                            </div>
                                                         @endforeach 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="itinerary-form-wrapper">
                                                {!!Form::open(['action' => ['AgentsController@updateItineraries', 'package_id='. $package_id ,'day='. $day], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                {{ csrf_field() }}
                                                @if(count($packages) > 0)
                                                    <div class="itinerary-form-item">
                                                        <div class="content clearfix">
                                                            <div class="row gap-20">
                                                                <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                    <div class="day">
                                                                        <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                        <span class="text-primary block number spacing-1">0{{ $day }}</span>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    <div class="row gap-20">
                                                                        <div class="col-xs-12 col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" class="oh-timepicker form-control starttime">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" class="oh-timepicker form-control endtime">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" class="form-control" id="target" placeholder="Destination">
                                                                            </div>
                                                                        </div>

                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div id="map_canvas"></div>
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="panel panel-info">
                                                                                <div class="panel-body address_markers"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                {{Form::file('day1_photo[]', ['required' => 'required'])}}
                                                                            </div>
                                                                        </div>
                                                                        <?php $temp = 0 ?>
                                                                            @foreach($packages as $package)
                                                                                @for($x=0; $x<count($package->days); ++$x)
                                                                                    @if($temp != $package->day)
                                                                                        @if($package->days == 1)
                                                                                            <div class="mb-50 pull-right">
                                                                                                <div class="mb-25"></div>
                                                                                                <a href="{{ route('Agent.Packages') }}" class="btn btn-danger btn-wide btn-border">Cancel</a>
                                                                                                <input type="SUBMIT" name="submit" class="btn btn-wide btn-info" value="submit"/>
                                                                                            </div>
                                                                                            
                                                                                        @else
                                                                                            @if($day == $package->days)
                                                                                                <div class="mb-50 pull-right">
                                                                                                    <div class="mb-25"></div>
                                                                                                    <a href="{{ route('Agent.Packages') }}" class="btn btn-danger btn-wide btn-border">Cancel</a>
                                                                                                    <input type="SUBMIT" name="submit" class="btn btn-wide btn-info" value="submit"/> 
                                                                                                </div>
                                                                                            @else
                                                                                                <div class="mb-50 pull-right">
                                                                                                    <div class="mb-25"></div>
                                                                                                    <a href="{{ route('Agent.Packages') }}" class="btn btn-danger btn-wide btn-border">Cancel</a>
                                                                                                    <input type="SUBMIT" name="submit" class="btn btn-wide btn-info" value="next"/> 
                                                                                                </div>
                                                                                            @endif
                                                                                        @endif
                                                                                        <input type="hidden" value="{{ $day }}" class="form-control" name="day">
                                                                                        <input type="hidden" value="{{ $package->days }}" class="form-control" name="no_day">
                                                                                        <div>
                                                                                            <input type="hidden" name="package_id"  class="form-control" value="{{ $package->package_id }}">
                                                                                        </div>
                                                                                        <?php $temp = $package->day ?> 
                                                                                    @endif
                                                                                @endfor
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-25"></div>
                                    {!!Form::close() !!}
                                    <div class="mb-25"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
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
    
<!-- start Back To Top -->
<div id="back-to-top">
    <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- end Back To Top -->

<script type="text/javascript">
    
    function initMap() {

        var markers = [];
        var infowindow = new google.maps.InfoWindow();
        var bounds = new google.maps.LatLngBounds();
        var destination = {
            zoom:12,
            center:{lat: 10.3157, lng: 123.8854}
        }

        var map = new google.maps.Map(document.getElementById('map_canvas'), destination);
        var autocompleteOptions = {
            componentRestrictions: {country: "PH"}
        };
        var input = document.getElementById('target');
        var searchBox = new google.maps.places.Autocomplete(input, autocompleteOptions);
        var marker;
        var place;
        google.maps.event.addListener(searchBox, 'place_changed', function () {
            place = searchBox.getPlace();
            placeMarker(place.geometry.location);
            map.setZoom(16);
            map.setCenter(marker.getPosition());
        });

        
        function placeMarker(location)
        {   
            marker = new google.maps.Marker({
                position: location,
                map: map,
                draggable: true
            });

            markers.push(marker);
            var mid = markers.length - 1;
            updateLocation(location, mid);

            bounds.extend(marker.position);
            map.fitBounds(bounds);
            
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
            console.log(place.name);
            google.maps.event.addListener(marker[x], 'click', function () {
                infowindow.setContent('<div><strong>' + locName + '</strong>');
                infowindow.open(map, this);
            });


            $('#target').html('');
        }
    
        function updateLocation(event, mid)
        {
            $('.address_markers').append("<section class='" + mid + " well'>");
            $('section.' + mid).append("<label>Start Time:</label><p></p> <input type='time' name='starttime[]' class='form-control' value="+ $('.starttime').val() +" readonly>");
            $('section.' + mid).append("<label>End Time:</label><input type='time' name='endtime[]' class='form-control' value="+ $('.endtime').val() +" readonly>");
            $('section.' + mid).append("<label>Destination:</label><p>"+ place.name +"</p><textarea name='destination[]' class='form-control hidden' readonly>" + place.name + "</textarea><span><button value='" + mid + "' id='removemarker' class='btn btn-danger pull-right' onclick='clearSingleMarker(this.value)' type='button'><i class='fa fa-trash'></i></button></span>");
            $('section.' + mid).append("<input type='hidden' name='lat[]' class='form-control' value="+ event.lat() + ">");
            $('section.' + mid).append("<input type='hidden' name='lng[]' class='form-control' value="+ event.lng() + "><br>");
            $('.address_markers').append("</section>");
        }
    
        
        google.maps.event.addListener(map, 'click', function (event) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                "latLng": event.latLng
            }, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    $("#target").val(results[0].formatted_address);
                }
            });
        });
}
    function clearSingleMarker(id) {
        var markers = [];
        map = null;
        console.log(id);
        for (var i = 0; i < markers.length; i++) {
            if (id == i) {
                markers[i].setMap(map);
            }
        }
        $('.address_markers').find("section." + id).remove();
    }

</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTJOuFQhHjI4jec4gTSD4_x0Ke7cI3bRg&callback=initMap&libraries=places">
</script>
@endsection
@extends('layouts.user.javascriptlayout')

