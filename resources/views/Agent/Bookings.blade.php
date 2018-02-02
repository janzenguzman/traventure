
@extends('layouts.user.headlayout')

@section('content')
<body class="transparent-header">
<div id="introLoader" class="introLoading"></div>
	<div class="container-wrapper">
		<header id="header">
			@extends('layouts.agent-navbar')
		</header>
		
		<div class="main-wrapper scrollspy-container">
			<div class="breadcrumb-image-bg" style="background-image:url({{asset('/uploads/files/osmena.jpg')}});">
				<div class="container">                                                 
					<div class="page-title">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"><br><br>
								<h2>Bookings</h2><br>
							</div>
						</div>
					</div>
					
					<div class="breadcrumb-wrapper">
						<ol class="breadcrumb"></ol>
					</div>
				</div>
			</div>
			
			<div class="breadcrumb-wrapper">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="/Agent/Packages">Home</a></li>
						<li class="active">Bookings</li>
					</ol>
				</div>
			</div>
			
            <div class="pt-30 pb-50">
				<div class="container">
					<div class="row">
						@include('layouts.user.alerts')
						<div class="col-xs-12 col-sm-8 col-md-12 mt-20">
							<h4 class="section-title">Booking Requests:</h4>
							<form method="post" action="{{ route('Agent.Bookings')}}">
								{{ csrf_field() }}	
								<div class="row">
									<div class="col-lg-6 col-md-5 col-xs-12">
										<div class="input-group">
											<input type="text" name="search_bookingid" class="form-control"  placeholder="Search package name" >
											<span class="input-group-btn">
												<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
											</span>
										</div><br>
									</div>
							</form>
							<div class="col-md-2 col-xs-12">
								<form>
									<a href="{{ route('Agent.Bookings') }}" class="btn btn-sm btn-default col-xs-12">Show All</a>
								</form>
							</div>
							<div class="col-md-2 col-xs-12">
								<form method="post" action="{{ route('Agent.Bookings')}}">
									{{ csrf_field() }}	
									<input type="hidden" name="accepted" class="form-control" value="Accepted">
									<button type="submit" class="btn btn-sm btn-default col-xs-12">Booked</button>
								</form>
							</div>
							<div class="col-md-2 col-xs-12">
								<form method="post" action="{{ route('Agent.Bookings')}}">
									{{ csrf_field() }}	
									<input type="hidden" name="requested" class="form-control" value="Confirmed">
									<button type="submit" class="btn btn-sm btn-default col-xs-12">Requested</button>
								</form>
							</div>
							@if(count($bookings) > 0)
								@foreach($bookings as $booking)
									<div class="trip-list-wrapper col-lg-12 col-xs-12"><br>
										<div class="trip-list-item">
											<div class="image-absolute">
												<div class="image image-object-fit image-object-fit-cover">
													<img src="/public/uploads/files/{{ $booking->photo }}" alt="image" >
												</div>
											</div>
											<div class="content">
												<div class="GridLex-gap-20 mb-5">
													<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
														<div class="GridLex-col-4_sm-12_xs-12_xss-12">
															<div class="GridLex-inner">
																<h6>{{$booking->package_name}}</h6><p class="text-muted font-sm">Client Name: {{$booking->client_fname}} {{$booking->client_lname}}</p>
																@if($booking->status== 'Confirmed')
																	<span class="label label-warning">Requested</span>
																@elseif($booking->status=='Accepted')
																	<span class="label label-success">Booked</span>
																@endif
																<a data-toggle="modal" id="replyButton" data-target="#replyModal(" 
																		data-sender_email="{{ Auth::user()->id }} " 
																		data-receiver_email="{{ $booking->email }} " 
																		data-package_id="{{ $booking->package_id }} " 
																class="btn">Contact Now</a>
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
														
														<div class="GridLex-col-5_sm-6_xs-5_xss-12">
															<div class="GridLex-inner text-right text-left-xss dropdown">
																	<a href="/Agent/Bookings/{{$booking->booking_id}}/{{$booking->package_id}}" class="btn btn-info btn-sm">View</a>
																@if($booking->status == 'Confirmed' && $booking->expired == '0')
																	<a href="/Agent/Packages/Accept/{{ $booking->booking_id }}" class="btn btn-success btn-sm">Accept</a>
																	<a href="/Agent/Packages/Decline/{{ $booking->booking_id }}" class="btn btn-danger btn-sm">Decline</a>
																@elseif($booking->expired == '1')
																<a data-toggle="modal" id="deleteButton" data-target="#deleteModal(" 
																		data-booking_id="{{ $booking->booking_id }} " 
																		class="btn btn-danger btn-sm">Delete</a>
																@endif
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
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
							<h2 class="text-danger">No records found.</h2>
						@endif
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
</div>

<!-- start Back To Top -->
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

	<!--MODAL-->
	<div id="replyModal" class="modal fade login-box-wrapper">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title text-center">Contact Now</h4>
		</div>
		<div class="modal-body">
			<div class="row gap-20">
				<div class="GridLex-col-12_sm-4_xs-12_xss-12">
					<form method="POST" action="{{ route('Agent.SendMessage') }}">
					{{ csrf_field() }}
					
					<div class="content">
						<div class="col-xs-12 col-sm-8 col-md-12 mt-20">
							<label>Send a Message: </label>
							<input type="hidden" class="text-primary" name="receiver_email" id="receiver_email">
							<input type="hidden" class="text-primary" name="package_id" id="package_id">
							<textarea id="form_message" name="message" class="form-control col-sm-12 col-md-12" required></textarea>
							
						</div>
					</div>
						
				</div>
			</div>
		</div>
		<div class="modal-footer text-center">
			<input type="submit" class="btn btn-info btn-sm pull-right" value="Send">
		</div>
		</form>
	</div>

	<div id="deleteModal" role="dialog" class="modal fade login-box-wrapper">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>\
			</div>
			<form method="POST" action = "{{ route('Agent.DeleteBooking')}}">
				{{ csrf_field() }}
				<div class="modal-body" style="padding:5%; margin-top:2%">
					<h4 class="center">Are you sure you want to delete this booking request?</h4>
					<input type="hidden" name="booking_id" class="text-primary" id="booking_id">
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-success">Close</button>
					<button type="submit" class="btn btn-danger">Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).on("click",'#replyButton',(function(){
		$('#receiver_email').val($(this).data('receiver_email'));
		$('#package_id').val($(this).data('package_id'));
		$('#replyModal').modal('show');
	})); 

	$(document).on("click",'#deleteButton',(function(){
        $('#booking_id').val($(this).data('booking_id'));
        $('#deleteModal').modal('show');
    })); 
</script>
@endsection
@extends('layouts.user.javascriptlayout')