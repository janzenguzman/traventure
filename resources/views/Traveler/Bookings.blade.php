@extends('layouts.user.headlayout')

@section('content')
<body class="transparent-header">

	<!-- start Container Wrapper -->
	
	<div class="container-wrapper">

		<!-- start Header -->
		
		<header id="header">

			<!-- start Navbar (Header) -->
			@extends('layouts.traveler-navbar')
			<!-- end Navbar (Header) -->

		</header>
		
		<!-- end Header -->
        <!-- start Main Wrapper -->
		
		<div class="main-wrapper scrollspy-container">
		
			<!-- start breadcrumb -->
			
			<div class="breadcrumb-image-bg" style="background-image:url({{asset('images/hero-header/osmenapeak.jpg')}});">
				<div class="container">
                                                                                           
					<div class="page-title">
					
						<div class="row">
						
							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
								<br><br>
								<h2>Bookings</h2>
								<br>
							</div>
							
						</div>

					</div>
					
					<div class="breadcrumb-wrapper">
					
						<ol class="breadcrumb">
						</ol>
					
					</div>

				</div>
				
			</div>
			<div class="breadcrumb-wrapper">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="{{ route('Traveler.Explore') }}">Explore</a></li>
						<li class="active">Bookings</li>
					</ol>
				</div>
				</div>
			</div>

            <div class="pt-30 pb-50">
			
				<div class="container">

					<div class="row">
						@include('layouts.user.alerts')	
							<form method="post" action="{{ route('Traveler.Bookings')}}">
								{{ csrf_field() }}	
								<div class="row">
									<div class="col-lg-6 col-md-5 col-xs-5">
										<div class="input-group">
											<input type="text" name="search_pname" class="form-control"  placeholder="Search package name" required>
											<span class="input-group-btn">
													<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
											</span>
										</div><br>
									</div>
							</form>
							<div class="col-lg-1" style="margin-right:1%">
								<form>
									<a href="{{ route('Traveler.Bookings') }}" class="btn btn-sm btn-default">Show All</a>
								</form>
							</div>
							<div class="col-lg-1">
								<form method="post" action="{{ route('Traveler.Bookings')}}">
									{{ csrf_field() }}	
									<input type="hidden" name="accepted" class="form-control" value="Accepted">
									<button type="submit" class="btn btn-sm btn-default">Booked</button>
								</form>
							</div>
							<div class="col-lg-1">
								<form method="post" action="{{ route('Traveler.Bookings')}}">
									{{ csrf_field() }}	
									<input type="hidden" name="requested" class="form-control" value="Confirmed">
									<button type="submit" class="btn btn-sm btn-default">Requested</button>
								<form>
							</div>
                            @if(count($bookings) > 0)
								@foreach($bookings as $booking)
									@if($booking->expired == 0)
										<div class="trip-list-wrapper col-lg-12">
										
											<div class="trip-list-item">
												<div class="image-absolute">
													<div class="image image-object-fit image-object-fit-cover">
														<img src="/public/uploads/files/{{ $booking->photo }}" alt="image" >
													</div>
												</div>
												<div class="content">
												
													<div class="GridLex-gap-20 mb-5">
								
														<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
														
															<div class="GridLex-col-6_sm-12_xs-12_xss-12">
																
																<div class="GridLex-inner">
																	<h6>{{$booking->package_name}}</h6><p class="text-muted font-sm">{{$booking->service}} Tour </p>
																	@if($booking->status== 'Confirmed')
																		<span class="label label-warning" style="margin-right: 2px">Requested</span>
																	@elseif($booking->status=='Accepted')
																		<span class="label label-success">Booked</span>
																	@endif
																	<span class="font-italic font14">
																		@if($booking->days == 1)
																			{{$booking->days}} Day Tour
																		@else
																			{{$booking->days}} Days
																		@endif
				
																		@if(($nights = $booking->days - 1) != 0)
																			@if($nights <= 1)
																				{{$nights}} Night 
																			@else
																				{{$nights}} Nights
																			@endif
																		@endif
																	</span>
																</div>
																
															</div>
															
															<div class="GridLex-col-3_sm-6_xs-7_xss-12">
																<div class="GridLex-inner line-1 font14 text-muted spacing-1">
																	Booking ID: {{ $booking->booking_id}}
																	
																	<br>
																	<br>
																	Travel date
																	<span class="block text-primary font16 font700 mt-1">
																	@if($booking->date_to == NULL)
																		{{ Carbon\Carbon::parse($booking->date_from)->toFormattedDateString() }}
																	@else
																		{{ Carbon\Carbon::parse($booking->date_from)->toFormattedDateString() }} -
																		{{ Carbon\Carbon::parse($booking->date_to)->toFormattedDateString() }} 
																	@endif
																	</span>
																</div>
															</div>
															
															<div class="GridLex-col-3_sm-6_xs-5_xss-12">
																<div class="GridLex-inner text-right text-left-xss dropdown">
																		{{--  <a href="/Traveler/Bookings/{{$booking->booking_id}}" class="btn btn-info btn-sm">View</a>  --}}
																		<a href="/Traveler/Bookings/{{$booking->package_id}}/{{$booking->booking_id}}" class="btn btn-info btn-sm">View</a>
																	@if($booking->status == 'Confirmed')
																		<a href="/Traveler/Cancel/{{$booking->booking_id}}" class="btn btn-danger btn-sm">Cancel</a>
																		{{--  <a data-toggle="modal" data-id="{{ $booking->booking_id }}" class="btn btn btn-danger btn-sm" id="cancelButton">Cancel</a>  --}}
																	@endif
																</div>
															</div>
															
														</div>
														
													</div>
													
												</div>
											</div>
										
										</div>
										
									@endif
								@endforeach
								
								<div class="pager-wrappper text-left clearfix col-lg-12">
									<div class="pager-innner">
											
											<div class="clearfix">
												<nav>
													<ul class="pagination">
														{{$bookings->links()}}
													</ul>
												</nav>
											</div>
										
									</div>
								
								</div>
							@else
						</div>
							<h2>No records found.</h2>
							@endif
					</div>

				</div>
			</div>
		
		<!-- end Main Wrapper -->
	</div>
	<div class="footer-wrapper scrollspy-footer">
		{{--  <footer class="main-footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-4">
						<h5 class="footer-title">newsletter</h5>
						
						<p class="font16">Subsribe to get our latest updates and oeffers</p>
							
						<div class="footer-newsletter">
							<div class="form-group">
								<input class="form-control" placeholder="enter your email " />
								<button class="btn btn-primary">subsribe</button>
							</div>
							<p class="font-italic font13">*** Don't worry, we wont spam you!</p>
						</div>
					</div>
						
					<div class="col-sm-12 col-md-8">
						<div class="row">
							<div class="col-xs-12 col-sm-4 col-md-3 col-md-offset-3 mt-25-sm">
								<h5 class="footer-title">footer</h5>
								<ul class="footer-menu">
									<li><a href="#">Support</a></li>
									<li><a href="#">Advertise</a></li>
									<li><a href="#">Media Relations</a></li>
									<li><a href="#">Affiliates</a></li>
									<li><a href="#">Careers</a></li>
								</ul>
							</div>
							
							<div class="col-xs-12 col-sm-4 col-md-3 mt-25-sm">
								<h5 class="footer-title">quick links</h5>
								<ul class="footer-menu">
									<li><a href="#">Media Relations</a></li>
									<li><a href="#">Affiliates</a></li>
									<li><a href="#">Careers</a></li>
									<li><a href="#">Support</a></li>
									<li><a href="#">Advertise</a></li>
								</ul>
							</div>
							
							<div class="col-xs-12 col-sm-4 col-md-3 mt-25-sm">
								<h5 class="footer-title">helps</h5>
								<ul class="footer-menu">
									<li><a href="#">Using a Tour</a></li>
									<li><a href="#">Submitting a Tour</a></li>
									<li><a href="#">Managing My Account</a></li>
									<li><a href="#">Merchant Help</a></li>
									<li><a href="#">White Label Website</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>  --}}
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
	<!-- end Container Wrapper -->
 
 {{--  <!-- cancel booking-->
<div id="cancelModal" role="dialog" class="modal fade login-box-wrapper">
		<!-- Modal content-->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<form method="POST" action="{{ route('Traveler.CancelBooking') }}">
			{{ csrf_field() }}
			<div class="modal-body" style="padding:5%; margin-top:2%">
				<h4 class="center">Are you sure you want to cancel this booking?</h4>
				<input type="hidden" name="booking_id" class="text-primary" id="booking_id">
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-success">Close</button>
				<input type="submit" class="btn btn-danger" value="Cancel">
			</div>
		</form>
</div>
<!-- end of cancel booking -->  --}}
<!-- start Back To Top -->

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>


<!-- end Back To Top -->
</div>


<script>
    var token = '{{ Session::token() }}';
    var urlFave = '{{ route('Traveler.Favorite') }}';
</script>
@endsection
@extends('layouts.user.javascriptlayout')
@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
        });
</script>
<script type="text/javascript">
    (function($) {
    //console.log("HELLO WORLD");
        $(".fave").on('click', function(event){
            event.preventDefault();
            packageId = event.target.parentNode.dataset['id'];
            console.log(packageId);
            var $t = $(this);
            $.ajax({
                method: 'POST',
                url: urlFave,
                data: { packageId: packageId, token: token },
                success: function(data){
                    console.log(data);
                    if (data == 'Favorite') {
                        $t.text('Unfavorite');
                        //$t.append('<button class="btn btn-danger">Unfavorite</button>')
                    }else{
                        $t.text('Favorite');
                    }
                },
                error: function (jqXHR, exception) {
                    alert("ERROR ERROR");
                }
            })
                .done(function(){
                    //alert("HELLO HELLO HELLO");
                });
        });
	}(jQuery));
	
	$(document).on("click",'#cancelButton',(function(){
		$('#booking_id').val($(this).data('id'));
		$('#cancelModal').modal('show');
	})); 
</script>
@endsection
