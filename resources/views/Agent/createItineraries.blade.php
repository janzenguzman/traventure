@extends('layouts.user.headlayout')

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
			
			<div class="breadcrumb-image-bg pb-100 no-bg" style="background-image:url({{ asset('images/breadcrumb-bg.jpg')}});">
				<div class="container">

					<div class="page-title">
					
						<div class="row">
						
							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
							
								<h2>Create Your Tour</h2>
								<p>Celebrated no he decisively thoroughly.</p>
						
							</div>
							
						</div>

					</div>
					
					<div class="breadcrumb-wrapper">
					
						<ol class="breadcrumb">
							<li><a href="#">Home</a></li>
							<li class="active"><span>Tour Create</span></li>
						</ol>
					
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
										
                                        
                                        {!!Form::open(['action' => 'AgentsController@storeItinerary', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                        {{--  <form method="POST">  --}}
                                            {{ csrf_field() }}
                                            <div class="itinerary-form-wrapper" id="main">
                                                @if(count($packages) > 0)
                                                    @for($count = 1; $count <= $packages->days; ++$count)
                                                        <div class="itinerary-form-item">
                                                        
                                                            <div class="content clearfix">
                                                            
                                                                <div class="row gap-20">
                                                                    <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                        <div class="day">
                                                                            <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                            <span class="text-primary block number spacing-1">0{{$count}}</span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                        <div class="row gap-20 sample" id="button">
                                                                        
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
                                                                                    <input type="text" name="destination[]" class="form-control" placeholder="Destination">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    {{Form::file('day1_photo[]', ['required' => 'required'])}}
                                                                                </div>
                                                                        </div>
                                         
                                                                        </div>
                                                                        
                                                                        
                                                                        
                                                                        </div>

                                                                        
                             
                                                                        <div class="col-xs-12 col-sm-12">
                                                                            
                                                                        <div class="add-more-form">
                                                                            <span>Add Destination</span> 
                                                                            <a class="add_des" type="submit"><i class="ion-android-add-circle"></i></a>

                                                                        </div>

                                                                        {{--  <input type="hidden" value="{{ $packages->days }}" name="daysCount">  --}}
                                                                        <input type="hidden" value="{{ $count }}" name="day[]">
                                                                        <div>
                                                                            <input type="hidden" name="package_id" value="{{ $packages->package_id }}">
                                                                        </div>
                                                                        
                                                                    </div>
                                                                
                                                                </div>

                                                            </div>
                                                        
                                                        </div>
                                                    @endfor
                                                @endif
                                            </div>
                                                    {{--  <div class="add-more-form mt-15">
                                                        <span>Add Day</span>
                                                        <a id="add_day"><i class="ion-android-add-circle"></i></a>
                                                    </div><br>  --}}
                                                    <br>
                                                    <input type="SUBMIT" name="submit" class="btn btn-wide btn-info btn-sm" value="submit"/>
                                        {{--  </form>  --}}
                                        {!!Form::close() !!}

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
                    
                            <div class="col-xs-12 col-sm-12">
                                <div class="add-more-form">
                                    <a id="remove_des"><i class="ion-android-remove-circle"></i></a>
                                    <span>Remove Destination</span>
                                </div>
                            </div>

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
                                    <input type="text" name="destination[]" class="form-control" placeholder="Destination">
                                </div>
                                
                            </div>
                        
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
    });
</script>
@endsection
