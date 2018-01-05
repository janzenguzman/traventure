{{--  //Comment out
<html>
    <style>
    .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
    </style>
</html>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bookings</div>
                    <div class="links">
                        <a href="Packages">Packages</a>
                        <a href="Bookings">Bookings</a>
                        <a href="Messages">Messages</a>
                    </div>
                </div>
                 <form  id="live-search">
                                <div class="input-group" style="width: 35%">
                                        <label>Search</label>
                                        <input class="form-control" placeholder="Booking number" 
                                            type="text" id="search_field">
                                        <br><br><br>
                                        <label>Sort by:</label>
                                        <br>
                                        <button type="button">Booked</button>&nbsp;&nbsp;
                                        <button type="button">Requested</button>&nbsp;&nbsp;
                                        <button type="button">Cancelled</button>
                                </div>
                </form>
                <div>
                    <div class="panel-heading">
                        <table>
                            <tr>
                                <td>Booking No</td>
                                <td>Date From</td>
                                <td>Date To</td>
                                <td>Tour Package</td>
                                <td>Name</td>
                                <td>People</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                                @if(count($bookings) > 0)
                                    @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->booking_id }}</td>
                                <td>{{ $booking->date_from }}</td>
                                <td>{{ $booking->date_to }}</td>
                                <td>{{ $booking->package_name }}</td>
                                <td>{{ $booking->client_fname }} {{ $booking->client_lname  }}</td>
                                <td>{{ $booking->adult + $booking->child + $booking->infant }}</td>
                                <td>{{ $booking->status }}</td>
                                <td><a href="/Agent/Packages/Accept/{{ $booking->booking_id }}"><button>Accept</button>
                                    <a href="/Agent/Packages/Decline/{{ $booking->booking_id }}"><button>Decline</button>
                                    <a href=""><button>Contact Now</button></a>
                                    </td>
                            </tr>
                                    @endforeach
                                 @else
                                    <p>No packages found</p>
                                @endif
                        </table>
                    </div>
            </div>
        </div>
    </div>
    

</div>
@endsection  --}}

@extends('layouts.user.headlayout')

@section('content')
<div class="container-wrapper">

		<!-- start Header -->
		
		<header id="header">

                @extends('layouts.agent-navbar')

		</header>
		
		<!-- end Header -->

		<!-- start Main Wrapper -->
		
		<div class="main-wrapper scrollspy-container">
		
			<!-- start Breadcrumb -->
			
			<div class="breadcrumb-image-bg" style="background-image:url({{ asset('images/breadcrumb-bg.jpg') }});">
				<div class="container">
                                                                                           
					<div class="page-title">
					
						<div class="row">
						
							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
								<h2>Bookings</h2>
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
						<li><a href="/Agent/Packages">Home</a></li>
						<li class="active">Bookings</li>
					</ol>
				</div>
			</div>
			
			
			<!-- end Breadcrumb -->
		
            <div class="pt-30 pb-50">
			
					<div class="container">
	
						<div class="row">
							@include('layouts.user.alerts')
							
							<div class="col-xs-12 col-sm-8 col-md-12 mt-20">
							
								<h4 class="section-title">Booking Requests:</h4>
								<form method="post" action="{{ route('Agent.Bookings')}}">
									{{ csrf_field() }}	
									<div class="row">
										<div class="col-lg-6 col-md-5 col-xs-5">
											<div class="input-group">
												<input type="text" name="search_pname" class="form-control"  placeholder="Search package name" >
												<span class="input-group-btn">
													<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
												</span>
											</div><br>
										</div>
								</form>
								<div class="col-lg-1" style="margin-right:1%">
									<form>
										<a href="{{ route('Agent.Bookings') }}" class="btn btn-sm btn-default">Show All</a>
									</form>
								</div>
								<div class="col-lg-1">
									<form method="post" action="{{ route('Agent.Bookings')}}">
										{{ csrf_field() }}	
										<input type="hidden" name="accepted" class="form-control" value="Accepted">
										<button type="submit" class="btn btn-sm btn-default">Booked</button>
									</form>
								</div>
								<div class="col-lg-1">
									<form method="post" action="{{ route('Agent.Bookings')}}">
										{{ csrf_field() }}	
										<input type="hidden" name="requested" class="form-control" value="Confirmed">
										<button type="submit" class="btn btn-sm btn-default">Requested</button>
									</form>
								</div>
								@if(count($bookings) > 0)
								@foreach($bookings as $booking)
										<div class="trip-list-wrapper col-lg-12">
										
											<div class="trip-list-item">
												
												<div class="image-absolute">
													<div class="image image-object-fit image-object-fit-cover">
														<img src="{{ asset('images/trip/01.jpg')}}" alt="image" >
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
																	Booking ID: {{ $booking->booking_id}}
																	
																	<br>
																	<br>
																	Travel date
																	<span class="block text-primary font16 font700 mt-1">
																		{{ Carbon\Carbon::parse($booking->date_from)->toFormattedDateString() }} -
																		{{ Carbon\Carbon::parse($booking->date_to)->toFormattedDateString() }} 
																	</span>
																</div>
															</div>
															
															<div class="GridLex-col-5_sm-6_xs-5_xss-12">
																<div class="GridLex-inner text-right text-left-xss dropdown">
																		{{--  <a href="/Traveler/Bookings/{{$booking->booking_id}}" class="btn btn-info btn-sm">View</a>  --}}
																	@if($booking->status == 'Confirmed')
																		<a href="/Agent/Packages/Accept/{{ $booking->booking_id }}" class="btn btn-success btn-sm">Accept</a>
																		<a href="/Agent/Packages/Decline/{{ $booking->booking_id }}" class="btn btn-danger btn-sm">Decline</a>
																	@endif
																	<a href="/Agent/Bookings/{{$booking->booking_id}}/{{$booking->package_id}}" class="btn btn-info btn-sm">View</a>
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
							<h2>No records found.</h2>
						@endif
								
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
</div>

<script>
	$(document).on("click",'#replyButton',(function(){
		$('#receiver_email').val($(this).data('receiver_email'));
		$('#package_id').val($(this).data('package_id'));
		$('#replyModal').modal('show');
	})); 
</script>
@endsection
@extends('layouts.user.javascriptlayout')

{{--  //Comment out
<html>
    <style>
    .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
    </style>
</html>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bookings</div>
                    <div class="links">
                        <a href="Packages">Packages</a>
                        <a href="Bookings">Bookings</a>
                        <a href="Messages">Messages</a>
                    </div>
                </div>
                 <form  id="live-search">
                                <div class="input-group" style="width: 35%">
                                        <label>Search</label>
                                        <input class="form-control" placeholder="Booking number" 
                                            type="text" id="search_field">
                                        <br><br><br>
                                        <label>Sort by:</label>
                                        <br>
                                        <button type="button">Booked</button>&nbsp;&nbsp;
                                        <button type="button">Requested</button>&nbsp;&nbsp;
                                        <button type="button">Cancelled</button>
                                </div>
                </form>
                <div>
                    <div class="panel-heading">
                        <table>
                            <tr>
                                <td>Booking No</td>
                                <td>Date From</td>
                                <td>Date To</td>
                                <td>Tour Package</td>
                                <td>Name</td>
                                <td>People</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                                @if(count($bookings) > 0)
                                    @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->booking_id }}</td>
                                <td>{{ $booking->date_from }}</td>
                                <td>{{ $booking->date_to }}</td>
                                <td>{{ $booking->package_name }}</td>
                                <td>{{ $booking->client_fname }} {{ $booking->client_lname  }}</td>
                                <td>{{ $booking->adult + $booking->child + $booking->infant }}</td>
                                <td>{{ $booking->status }}</td>
                                <td><a href="/Agent/Packages/Accept/{{ $booking->booking_id }}"><button>Accept</button>
                                    <a href="/Agent/Packages/Decline/{{ $booking->booking_id }}"><button>Decline</button>
                                    <a href=""><button>Contact Now</button></a>
                                    </td>
                            </tr>
                                    @endforeach
                                 @else
                                    <p>No packages found</p>
                                @endif
                        </table>
                    </div>
            </div>
        </div>
    </div>
    

</div>
@endsection  --}}
