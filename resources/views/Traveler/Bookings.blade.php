@extends('layouts.user.headlayout')
@section('content')
<body class="transparent-header">
	<div id="introLoader" class="introLoading"></div>
	<div class="container-wrapper">
		<header id="header">
			@extends('layouts.traveler-navbar')
		</header>
		
		<div class="main-wrapper scrollspy-container">
			<div class="breadcrumb-image-bg" style="background-image:url({{asset('/uploads/files/osmena.jpg')}});">
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
									<div class="col-lg-6 col-md-5 col-xs-12">
										<div class="input-group">
											<input type="text" name="search_pname" class="form-control"  placeholder="Search package name" required>
											<span class="input-group-btn">
												<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
											</span>
										</div><br>
									</div>
							</form>
							<div class="col-md-2 col-xs-12">
								<form>
									<a href="{{ route('Traveler.Bookings') }}" class="btn btn-sm btn-default col-xs-12">Show All</a>
								</form>
							</div>
							<div class="col-md-2 col-xs-12">
								<form method="post" action="{{ route('Traveler.Bookings')}}">
									{{ csrf_field() }}	
									<input type="hidden" name="accepted" class="form-control" value="Accepted">
									<button type="submit" class="btn btn-sm btn-default col-xs-12">Booked</button>
								</form>
							</div>
							<div class="col-md-2 col-xs-12">
								<form method="post" action="{{ route('Traveler.Bookings')}}">
									{{ csrf_field() }}	
									<input type="hidden" name="requested" class="form-control" value="Confirmed">
									<button type="submit" class="btn btn-sm btn-default col-xs-12">Requested</button>
								</form>
							</div>
						</div>
                            @if(count($bookings) > 0)
								@foreach($bookings as $booking)
									@if($booking->expired == 0)
										<div class="trip-list-wrapper col-lg-12 col-xs-12"><br>
											<div class="trip-list-item"><br>
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
																	Booking ID: {{ $booking->booking_id}}<br><br>
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
																	<a href="/Traveler/Bookings/{{$booking->package_id}}/{{$booking->booking_id}}" class="btn btn-info btn-sm">View</a>
																		@if($booking->status == 'Confirmed')
																			<a href="/Traveler/Cancel/{{$booking->booking_id}}" class="btn btn-danger btn-sm">Cancel</a>
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
									</div>
								</div>
								@else
									<h2 class="text-danger">No records found.</h2>
								@endif
								
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
							
			</div>
		</div>
	</div>
		
	<div class="footer-wrapper scrollspy-footer">
		<footer class="main-footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<h5 class="footer-title">Mission Statement</h5>
						<p class="font16">To be one of the leading travel accommodation sites in the Philippines and maintain luxurious travel services through leadership and commitment.</p>
					</div>
					<div class="col-sm-12 col-md-6">
						<h5 class="footer-title">Vision Statement</h5>
						<p class="font16">Deliver excellent satisfaction to travel agents and travelers <br>
							and at the same time, help people travel smart and achieve more.</p>
					</div>
				</div>
			</div>
		</footer>
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
	
<!-- start Back To Top -->
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>
<!-- end Back To Top -->

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
                    }else{
                        $t.text('Favorite');
                    }
                },
                error: function (jqXHR, exception) {
                    alert("ERROR ERROR");
                }
            })
        });
	}(jQuery));
	
	$(document).on("click",'#cancelButton',(function(){
		$('#booking_id').val($(this).data('id'));
		$('#cancelModal').modal('show');
	})); 
</script>
@endsection
