@extends('layouts.user.headlayout')
{{--  <style>
    #map_canvas {
        height: 400px;
        width: 100%;
    }
</style>  --}}
@section('content')
<body class="transparent-header">
    <!-- start Container Wrapper -->
    <div class="container-wrapper">
        <!-- start Header -->
        <header id="header">
            <!-- start Navbar (Header) -->
            @extends('layouts.agent-navbar')
            <!-- end Navbar (Header) -->
        </header>
        <!-- end Header -->
        <!-- start Main Wrapper -->
		
		<div class="main-wrapper scrollspy-container">
		
			<!-- start breadcrumb -->
			
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
			
			<!-- end breadcrumb -->
			
			<div class="bg-light">
			
				<div class="create-tour-wrapper">

					<div class="container">
					
						<div class="row">
						
							<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
							
								<div class="form">
								
									<div class="create-tour-inner">
										
										<div class="mb-40"></div>
										
										<h4 class="section-title">Itinerary</h4>
                                        
                                        {!!Form::open(['action' => ['AgentsController@storeItinerary', 'day='. $day], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                        {{--  <form method="POST">  --}}
                                            {{ csrf_field() }}
                                            <div class="itinerary-form-wrapper" id="main">
                                                    
                                                @if(count($packages) > 0)
                                                    {{--  @for($count = 1; $count <= $packages->days; ++$count)  --}}
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
                                                                    
                                                                        <div class="row gap-20 sample" id="button">
                                                                            
                                                                            <div class="col-xs-12 col-sm-6">
                                                                                
                                                                                <div class="form-group">
                                                                                    <label>Start Time:</label>
                                                                                    <input type="time" class="oh-timepicker form-control starttime" placeholder="Time">
                                                                                </div>
                                                                            
                                                                            </div>

                                                                            <div class="col-xs-12 col-sm-6">

                                                                                <div class="form-group">
                                                                                    <label>End Time:</label>
                                                                                    <input type="time" class="oh-timepicker form-control endtime" placeholder="Time">
                                                                                </div>
                                                                                
                                                                            </div>

                                                                            <div class="col-xs-12 col-sm-12">
                                                                            
                                                                                <div class="form-group">
                                                                                    <label>Destination:</label>
                                                                                    <input type="text" class="form-control" id="target" placeholder="Destination">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xs-12 col-sm-12">
                                                                                <a class="add_des" type="submit"><i class="ion-android-add-circle"></i></a>
                                                                                <span>Add Destination</span>
                                                                            </div>

                                                                            <div class="col-xs-12 col-sm-12">
                                                                                <div class="form-group">
                                                                                    {{Form::file('day1_photo[]', ['required' => 'required'])}}
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
                                                                            
                                                                        </div>
                                                                        
                                                                    </div>

                                                                        
                             
                                                                        <div class="col-xs-12 col-sm-12">
                                                                    
                                                                        {{--  <input type="hidden" value="{{ $packages->days }}" name="daysCount">  --}}
                                                                        
                                                                        <input type='hidden' value="{{ $day }}" class="form-control" name="day">
                                                                        <input type="hidden" value="{{ $packages->days }}" class="form-control" name="no_day">
                                                                        <div>
                                                                            <input type="hidden" name="package_id"  class="form-control" value="{{ $packages->package_id }}">
                                                                        </div>
                                                                        
                                                                    </div>
                                                                
                                                                </div>

                                                            </div>
                                                        
                                                        </div>
                                                    {{--  @endfor  --}}
                                                    
                                                @endif
                                            </div>
                                                    {{--  <div class="add-more-form mt-15">
                                                        <span>Add Day</span>
                                                        <a id="add_day"><i class="ion-android-add-circle"></i></a>
                                                    </div><br>  --}}
                                                    <br>
                                                    @if($packages->days == 1)
                                                        <input type="SUBMIT" name="submit" class="btn btn-wide btn-info btn-sm pull-right" value="submit"/>
                                                    @else
                                                        @if($day == $packages->days)
                                                            <input type="SUBMIT" name="submit" class="btn btn-wide btn-info btn-sm pull-right" value="submit"/>
                                                        @else
                                                            <input type="SUBMIT" name="submit" class="btn btn-wide btn-info btn-sm pull-right" value="next"/>
                                                        @endif
                                                    @endif
                                        {!!Form::close() !!}
                                        {{--  <a href="/Agent/Packages/{{$packages->package_id}}" class="btn btn-wide btn-danger btn-sm pull-left">Back</a><br>  --}}
                                    </div>
                                    
                                    <div class="mb-50">

								</div>
								
							</div>
						
						</div>
						
					</div>
					
				</div>
			
			</div>

		</div>
		
        <!-- end Main Wrapper -->
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
    
    <!-- end Container Wrapper -->
    
    
    <!-- start Back To Top -->
    
    <div id="back-to-top">
        <a href="#"><i class="ion-ios-arrow-up"></i></a>
    </div>
    
    <!-- end Back To Top -->
@endsection
@extends('layouts.user.javascriptlayout')
@section('script')
<script type="text/javascript">
    (function($) {
        $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
			}
		});
        //Variables
        var addDes = `<div class="row gap-20 sample" id="x">
                            <div class="col-xs-12 col-sm-6">
                            
                                <div class="form-group">
                                    <label>Start Time:</label>
                                    <input type="time" name="starttime[]" class="oh-timepicker form-control" placeholder="Time">
                                </div>
                            
                            </div>

                            <div class="col-xs-12 col-sm-6">

                                <div class="form-group">
                                    <label>End Time:</label>
                                    <input type="time" name="endtime[]" class="oh-timepicker form-control" placeholder="Time">
                                </div>
                                
                            </div>
                            
                            <div class="col-xs-12 col-sm-12">
                            
                                <div class="form-group">
                                    <label>Destinations:</label>
                                    <input type="text" name="destination[]" class="form-control destination" placeholder="Destination">
                                </div>
                                
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="add-more-form">
                                    <a id="remove_des"><i class="ion-android-remove-circle"></i></a>
                                    <span>Remove Destination</span>
                                </div>
                            </div><br>
    
                        
                        </div>`;

        //Add
        $(".add_des").click(function() {
            console.log("DESTINATION ADDED");
            $(this).offsetParent().append(addDes);
            //$("#button").append(addDes);
            //$(this).offappend('<span class="text-primary block number spacing-1">Hello, Janzen</span>');
            //$("#button").append('<p>'+count+'</p>');
        });

        //Remove
        $("#main").on("click", "#remove_des", function(e){
            $(this).offsetParent().parent().remove();
            console.log("DESTINATION REMOVED");
        });

        //Populate

    }(jQuery));
    $('body').on('focus',".oh-timepicker", function(){
        $(this).timepicker();
    });;
    
    var autocompleteOptions = {
            componentRestrictions: {country: "PH"}
    };
    function initMap() {
        
        
        var markers = [];
        var infowindow = new google.maps.InfoWindow();
        var bounds = new google.maps.LatLngBounds();
        var destination = {
            zoom:12,
            center:{lat: 10.3157, lng: 123.8854}
        }

        var map = new google.maps.Map(document.getElementById('map_canvas'), destination);
        //var input = (document.getElementById('target'));
        //var searchBox = new google.maps.places.SearchBox(input);

        var input = document.getElementById('target');
        var searchBox = new google.maps.places.SearchBox(input);

        
        var marker;
        var places;
        google.maps.event.addListener(searchBox, 'places_changed', function () {
            places = searchBox.getPlaces();
            placeMarker(places[0].geometry.location);
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
            var locName = $('#target').val();
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
                $('section.' + mid).append("<label>Destination:</label><p>"+ $('#target').val() +"</p><textarea name='destination[]' class='form-control hidden' readonly>" + $('#target').val() + "</textarea><span><button value='" + mid + "' id='removemarker' class='btn btn-danger pull-right' onclick='clearSingleMarker(this.value)' type='button'><i class='fa fa-trash'></i></button></span>");
                $('section.' + mid).append("<input type='hidden' name='lat[]' class='form-control' value="+ event.lat().toFixed(5) + ">");
                $('section.' + mid).append("<input type='hidden' name='lng[]' class='form-control' value="+ event.lng().toFixed(6) + "><br>");
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