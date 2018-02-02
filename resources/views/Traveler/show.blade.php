@extends('layouts.user.headlayout')
@section('content')
<body class="transparent-header with-multiple-sticky">

	<!-- start Container Wrapper -->
	<div class="container-wrapper">

		<!-- start Header -->
		
		<header id="header">

			<!-- start Navbar (Header) -->
			@extends('layouts.traveler-navbar')
			<!-- end Navbar (Header) -->

		</header>
		
		<!-- end Header -->
		<!--start main wrapper-->
		<div class="main-wrapper scrollspy-container">
			@foreach($packages as $package)
			<div class="breadcrumb-image-bg detail-breadcrumb" style="background-image:url({{asset('images/hero-header/06.jpg')}});">
				<div class="container">

					<div class="page-title detail-header-02">
					
						<div class="row">
						
							<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
								<h2>{{$package->package_name}}</h2>
								<span class="labeling text-white mt-25"> 
									<span>
										@if($package->days == 1)
											{{$package->days}} Day Tour
										@else
											{{$package->days}} Days &amp;
										@endif

										@if(($nights = $package->days - 1) != 0)
											@if($nights <= 1)
												{{$nights}} Night Tour
											@else
												{{$nights}} Nights Tour
											@endif
										@endif
									</span>
								</span>
								<div class="rating-item rating-item-lg mb-25">
									<input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="{{ $avg }}"/>
									<div class="rating-text"> <a href="#" style="color:white">
										@if($count > 1)
											({{$count}} Reviews)
										@elseif($count == 1)
											({{$count}} Review)
										@else
											(No Reviews)
										@endif
									</a></div>
								</div>

							</div>
							
						</div>

					</div>
					
					<div class="breadcrumb-wrapper text-left">
					</div>

				</div>
				
			</div>

			<div class="multiple-sticky hidden-sm hidden-xs">
										
				<div class="multiple-sticky-inner">
				
					<div class="multiple-sticky-container container">
					
						<div class="multiple-sticky-item clearfix">
								
							<ul id="multiple-sticky-menu" class="multiple-sticky-menu clearfix">
								<li>
									<a href="#trip-details">Trip Details</a>
								</li>
								<li>
									<a href="#additional-info">Additional Information</a>
								</li>
								<li>
									<a href="#reviews">Review</a>
								</li>
							</ul>

						</div>
						
					</div>
					
				</div>
				
			</div>
			<div class="pt-30 pb-50">
			
					<div class="container">
	
						<div class="row">
						
							<div class="col-xs-12 col-sm-12 col-md-8">
								@include('layouts.user.alerts')
								<div class="content-wrapper">
									
									<div class="user-long-sm-item clearfix">
						
										<div class="image">
											<img src="/public/uploads/files/{{ $package->agent_photo }}" alt="Images" />
										</div>
										
										<div class="content">
											<br>
											<span class="labeling">Offered by: </span>
											<h4>{{$package->fname}} {{$package->lname}}</h4>
											<ul>
												<a><li>{{$package->job_position}} of {{$package->company_name}}</li></a>
											</ul>
										</div>
										
									</div>
										
									<div id="trip-details">

										<div class="bt mt-30 mb-30"></div>
										
										<div class="featured-icon-simple-wrapper">
					
											<div class="GridLex-gap-30">
																
												<div class="GridLex-grid-noGutter-equalHeight">
												
												</div>
												
											</div>
											
										</div>
										
										<div class="featured-icon-simple-wrapper">
						
											<div class="GridLex-gap-30 GridLex-gap-20-xs">
																
												<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-4_sm-4_xs-3_xss-1 GridLex-grid-center">
												
												</div>
												
											</div>
											
										</div>
										
										<div class="mb-25"></div>
										<div class="bb"></div>
										<div class="mb-25"></div>
										<span id="fave" data-id="{{ $package->package_id }}">
											<a class="fave btn btn-danger btn-wide pull-right">
													{{	Auth::user()->favorites()->where('package_id', $package->package_id)->first() ? 
														Auth::user()->favorites()->where('package_id', $package->package_id)->first()->favorited == 1 ? 
														'Unfavorite' : 'Favorite' : 'Favorite'}}
											</a>
											</span>
										<h2 class="font-lg">{{$package->type}} Tour</h2>
										<label class="text-muted">Categories: {{$package->categories}} </label>
										<div class="row">
							
											<div class="col-xs-12 col-sm-8 col-md-12">
											
												<div class="featured-list-in-box"><br>
													<h4 class="uppercase spacing-1">Trip Details</h4>
													<div id="itinerary">
														<div class="itinerary-toggle-wrapper mb-40">
															<div class="panel-group bootstrap-toggle">
																<div class="panel">
					
																	<?php $temp = 0 ?>
																	@if(count($itineraries) > 0)
																			<div class="itinerary-list-item">
																		@foreach($itineraries as $itinerary)
																			<div class="row">
																				<div class="col-xs-12 col-sm-12 col-md-12">
																					<div class="content">
																			@for($x=0; $x<count($itinerary->package_id); ++$x)
																					
																				@if($temp != $itinerary->day)
																					@if($itinerary->day !=1)
																					<div class="mb-25"></div>
																					<div class="bb"></div>
																					<div class="mb-25"></div>
																					@endif
																				<div class="col-xs-12 col-sm-4 col-md-12">
																					<b><span class="labeling" style="font-size: 20px">Day 0{{$itinerary->day}}</span></b>
																					<div class="col-xs-12 col-sm-4 col-md-3">
																						<div class="image">
																							<img src="/public/uploads/files/{{ $itinerary->dayPhoto }}" alt="images" />
																							
																						</div>
																						
																						
																					</div>
																					<div class="col-xs-12 col-sm-4 col-md-9">
																						{{--  <a href="/Agent/Packages/PackageDetails/ViewRoutes/{{$itinerary->package_id}}/{{$itinerary->day}}" class="btn btn-success pull-right">View Routes</a>  --}}
																						</div>
																				</div>
																					<?php $temp = $itinerary->day ?> 
																				@endif
																				<div class="col-xs-12 col-sm-4 col-md-12">
																				<div class="content">
																					<div class="labeling"><br>
																						<i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
																						<span style="color:black">{{ $itinerary->destination}}</span> 
																						{{--  <span>({{ date("g:i A", strtotime($itinerary->starttime)) }} - {{ date("g:i A", strtotime($itinerary->endtime)) }})</span>  --}}
																						
																					</div>
																				</div>
																			</div>
																								
																							
																			@endfor
																			</div>
																	</div>
																</div>
															
																		@endforeach
																	</div>    
																	@else
																	<div class="itinerary-list-item">
																		<h4 class="text-danger">No Itinerary for this package.</p>
																	</div>
																	@endif
					
																</div>
															</div>
														</div>	
														
													</div>
													
												</div>
													
											</div>
											
										</div>
									</div>

									<div>
										<h4 class="uppercase spacing-1">Price Details</h4>
												@if($package->type == 'Exclusive')
													<ul class="clearfix">
														<li class="row gap-20">
															<div class="col-xs-12 col-sm-3">
															For {{ $package->pax1 }} Pax
															</div>
															<div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
																PHP {{ $package->pax1_price }}.00
															</div>
														</li>
														<li class="row gap-20">
															<div class="col-xs-12 col-sm-3">
																For {{ $package->pax2 }} Pax
															</div>
															<div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
																PHP {{ $package->pax2_price }}.00
															</div>
														</li>
														<li class="row gap-20">
															<div class="col-xs-12 col-sm-3">
																For {{ $package->pax3 }} Pax
															</div>
															<div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
																PHP {{ $package->pax3_price }}.00
															</div>
														</li>
														<li class="row gap-20">
															<div class="col-xs-12 col-sm-3">
																Excess Person Price
															</div>
															<div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
																PHP {{ $package->excess_price }}.00
															</div>
														</li>
													</ul>
												@else
													<ul class="clearfix">
														<li class="row gap-20">
															<div class="col-xs-12 col-sm-7">
																Adult Price <b>(11 years. above)</b>
															</div>
															<div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
																PHP {{ $package->adult_price }}.00
															</div>
														</li>
														<li class="row gap-20">
															<div class="col-xs-12 col-sm-7">
																Child Price: <b>(4-10 yesrs.)</b>
															</div>
															<div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
																PHP {{ $package->child_price }}.00
															</div>
														</li>
														<li class="row gap-20">
															<div class="col-xs-12 col-sm-7">
																Infant Price <b>(3 years. below)</b>
															</div>
															<div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
																PHP {{ $package->infant_price }}.00
															</div>
														</li>
													</ul>

												@endif
											
											<div class="mb-25"></div>
											<div class="bb"></div>
											<div class="mb-25"></div>
											
										</div>
	
									<div>
										<h4 class="uppercase spacing-1">Available Slots</h4>
										<p>Here are the available slots for this package.</p>
										<div class="text-box-h-bb-wrapper">
											<div class="text-box-h-bb">
												@if(count($slots))
													@foreach($slots as $slot)
														@if($slot->slots != 0)	
															
															<br>
															<div class="row">
																<div class="col-lg-7 col-md-7">
																	@if($package->days == 1)
																		<h5>
																			{{ Carbon\Carbon::parse($slot->date_from)->toFormattedDateString() }}
																		</h5>
																	@else
																		<h5>
																			{{ Carbon\Carbon::parse($slot->date_from)->toFormattedDateString() }} -
																			{{ Carbon\Carbon::parse($slot->date_to)->toFormattedDateString() }}
																		</h5>
																	@endif
																</div>
																<div class="col-lg-3 col-md-3">
																	@if($package->type == 'Joined')
																		<p class="font-sm text-danger"><b>{{ $slot->slots }}</b> slots left</p>
																	@else
																		<p class="font-sm text-danger"><b>{{ $slot->slots }}</b> pax</p>
																	@endif
																</div>
																<div class="col-lg-2 col-md-2">
																	<a data-toggle="modal" 
																		data-slot_id="{{ $slot->id }}"	
																		data-slots="{{ $slot->slots }}"
																		data-package_id="{{ $package->package_id }}"
																		data-date_from="{{ $slot->date_from }}"
																		data-date_to="{{ $slot->date_to }}"
																		data-service="{{ $package->type }}"
																		data-excess_price="{{ $package->excess_price }}"
																		class="booking_modal btn btn-info btn-sm col-md-12"
																	>Book</a>
																</div>
															</div>
														@endif
													@endforeach
													@else
														<h4 class="text-danger">No slots available for this package yet.</p>
												@endif
											</div>
										</div>
										
										<div class="mb-25"></div>
										<div class="bb"></div>
										<div class="mb-25"></div>
										
									</div>
									
									<div id="additional-info">
									
											<h2 class="font-lg">Additional Information</h2>
											
											<div class="text-box-h-bb-wrapper">
												<div class="text-box-h-bb">
													<div class="row">
														<div class="col-xs-12 col-sm-12 col-md-12">
															<p class="font-md">{{ $package->add_info }} </p>
														</div>
													</div>
												</div>
												<div class="text-box-h-bb">
													<div class="row">
														<div class="col-xs-12 col-sm-4 col-md-3">
															<h4>Inclusions</h4>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-12">
															<p class="font-md">{{ $package->inclusions }} </p>
														</div>
													</div>
												</div>
												<div class="text-box-h-bb">
													<div class="row">
														<div class="col-xs-12 col-sm-4 col-md-3">
															<h4>Reminders</h4>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-12">
															<p class="font-md">{{ $package->reminders }} </p>
														</div>
													</div>
												</div>
										</div>
											
											<div class="mb-25"></div>
											<div class="bb"></div>
											<div class="mb-25"></div>
											
									</div>
									
									
									<div id="reviews">
								
											<h2 class="font-lg">Review</h2>
											
											<div class="review-wrapper">
												@if($avg != 0)
													<div class="review-header">
													
														<div class="GridLex-gap-30">
																			
															<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
																	
																<div class="GridLex-col-9_sm-8_xs-12_xss-12">
																
																	<div class="review-rating">
																		<div class="number"> {{number_format($avg, 1)}}</div>
																		<div class="rating-wrapper">
																			<div class="rating-item rating-item-lg">
																				<input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-readonly value="{{ $avg }}"/>
																			</div>
																			@if($count > 1)
																				{{$count}} Reviews
																			@else
																				{{$count}} Review
																			@endif
																		</div>
																	</div>
																	
																</div>
																
															</div>
															
														</div>
														
													</div>
												@endif
												
												@if(count($comments) > 0)
													@foreach($comments as $comment)
														<div class="review-content" id="comments">
												
															<ul class="review-list comment{{$comment->id}}">
															
																<li class="clearfix">
																
																	<div class="row">
																	
																		<div class="col-xs-12 col-sm-4 col-md-3">
																			<div class="review-header">
																				<h6>{{ $comment->traveler_fname }} {{ $comment->traveler_lname }}</h6>
																				<span class="review-date">{{ Carbon\Carbon::parse($comment->created_at)->toDateString() }}</span>
																				
																				<div class="rating-item"><br>
																					@if($comment->rating <= 1)
																						<span class="label label-warning">{{ ($comment->rating) }} Star</span>
																					@else
																						<span class="label label-warning">{{ ($comment->rating) }} Stars</span>
																					@endif
																				</div>
																				
																			</div>
																		</div>
																		
																		<div class="col-xs-12 col-sm-8 col-md-9">
																			
																			<div class="review-replied">
				
																				<div class="review-replied-content">
																					<p>{{ $comment->comment}}</p>
																				</div>
																				
																			</div>
																		
																		</div>
																	</div>
																</li>
															</ul>
														</div>
                                                    @endforeach
                                                @else
                                                    <h2>No reviews for this package yet</h2>
                                                @endif
											</div>
											
										</div>
									
								</div>
								
							</div>
	
							<div id="sidebar-sticky" class="col-xs-12 col-sm-12 col-md-4 sticky-mt-70 sticky-mb-0">
									<aside class="sidebar-wrapper with-box-shadow">
									
										<div class="sidebar-booking-box">
									
											<div class="sidebar-booking-header bg-info clearfix">
												
													<div class="price">
														Contact Now
													</div>
											</div>
											
										</div>
										
										<div class="list-yes-no-box">
		
											<form role="form" method="POST" action="{{ route('Traveler.SendMessage') }}">
												<div class="row gap-20">
													{{ csrf_field() }}
													<div class="col-md-12">
														<label>Contact Me:</label> {{$package->contact_no}}
														<br>
														<label>Email Me:</label> {{$package->email}}
														<div class="login-modal-or">
															<div><span>or</span></div>
														</div>
													</div>
		
													<div class="col-sm-12 col-md-12">
														<input type="hidden" name="package_id" value="{{$package->package_id}}">
														<input type="hidden" name="receiver_email" value="{{$package->email}}">
													</div>
													
													<div class="col-sm-12 col-md-12">
											
														<div class="form-group"> 
															<label>SEND A MESSAGE:</label><br>
															<textarea id="form_message" name="message" class="form-control col-sm-12 col-md-12" required></textarea>
														</div>
													
													</div>
													
													<div class="col-xss-12 col-xs-12 col-sm-12">
														<div class="mt-5">
															<input type="submit" class="btn btn-info btn-block" value="SEND">
														</div>
													</div>
												</div>
											</form>
		
		
										</div>
									
									</aside>
									
										<br>
								</div>
								
							
						</div>
						
					</div>
	
				</div>
				
				
			
			<!-- end Main Wrapper -->



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


<!--booking modal-->

<div id="book_modal" class="modal fade login-box-wrapper">

		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title text-center">Booking Information</h4>
		</div>
		<div class="modal-body">
			<div class="row gap-20">
				<div class="user-item-wrapper-01">
					<div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
						<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
							<div class="GridLex-col-12_sm-4_xs-12_xss-12">
								<div class="user-long-sm-item clearfix">
										{!! Form::open(['action' => 'TravelersController@store', 'method' => 'POST']) !!}	
											{{ csrf_field() }}
											<input type="hidden" name="slot_id" class="slot_id">
											<input type="hidden" name="slots" class="slots">
											<input type="hidden" name="service" class="service">
											<input type="hidden" name="package_id" class="package_id">

											@if($package->days == '1')
												<div class="col-sm-6 col-md-12">
													<span class="labeling" style="color:black">Date: </span>
													<div class="form-group form-group-sm">
														<input type="text" name="date_from" class="date_from form-control" readonly>
													</div>
												</div>
											@else
												<div class="col-sm-6 col-md-6">
													<span class="labeling" style="color:black">From: </span>
													<div class="form-group form-group-sm">
														<input type="text" name="date_from" class="date_from form-control" readonly>
													</div>
												</div>
	
												<div class="col-sm-6 col-md-6">
													<span class="labeling" style="color:black">To: </span>
													<div class="form-group form-group-sm">
														<input type="text" name="date_to" class="date_to form-control" readonly>
													</div>
												</div>
											@endif
												<div class="col-sm-6 col-md-6">
													 <div class="form-group"> 
														<span class="labeling" style="color:black">First Name: </span>
														<div class="form-group form-group-sm">
															<input type="text" name="client_fname" class="form-control" required/>
														</div>
													</div>
												</div>
	
												<div class="col-sm-6 col-md-6">
													<div class="form-group"> 
														<span class="labeling" style="color:black">Last Name: </span>
														<div class="form-group form-group-sm">
															<input type="text" name="client_lname" class="form-control" required/>
														</div>
													</div>
												</div>
												
	
												<div class="col-sm-6 col-md-6">
													<div class="form-group"> 
														<span class="labeling" style="color:black">Contact Number: </span>
														<div class="form-group form-group-sm">
															<input type="text" name="contact_num" class="form-control" required/>
														</div>
													</div>
												</div>

												<div class="col-sm-6 col-md-6">
													<div class="form-group"> 
														<span class="labeling" style="color:black">Email Address: </span>
														<div class="form-group form-group-sm">
															<input type="email" name="client_email" class="form-control" required/>
														</div>
													</div>
												</div>
												
												@if($package->type == "Joined")
													<div class="col-sm-4 col-md-4">
														<div class="form-group form-spin-group"> 
															<span class="labeling" style="color:black">Adult: (11 years. above)</span>
															<div class="form-group form-group-sm">
																<input type="text" name="adult" min="0" class="form-control form-spin" value="0" required/>
															</div>
														</div>
													</div>
													<div class="col-sm-4 col-md-4">
														<div class="form-group form-spin-group"> 
															<span class="labeling" style="color:black">Child: (4-10 years.)</span>
															<div class="form-group form-group-sm">
																<input type="text" name="child" min="0" class="form-control form-spin" value="0" required/>
															</div>
														</div>
													</div>

													
													<div class="col-sm-4 col-md-4">
														<div class="form-group form-spin-group"> 
															<span class="labeling" style="color:black">Infant: (3 years below)</span>
															<div class="form-group form-group-sm">
																<input type="text" name="infant" min="0" class="form-control form-spin" value="0" required/>
															</div>
														</div>
													</div>
												@else
													<div class="col-sm-6 col-md-6">
														<div class="form-group"> 
															<input type="hidden" name="no_of_exclusive_traveler" class="slots">
															<span class="labeling" style="color:black">Excess Person Price: </span>
															<div class="input-group form-group-sm">
																<span class="input-group-addon">PHP</span>
																<input type="text" name="excess_price" class="excess_price form-control" readonly/>
																
															</div>
														</div>
													</div>
													
													<div class="col-sm-6 col-md-6">
														<div class="form-group form-spin-group"> 
															<span class="labeling" style="color:black">Number of Excess Person: </span>
															<div class="form-group form-group-sm">
																<input type="text" name="no_of_excess" min="0" value="0" class="form-control form-spin"/>
															</div>
														</div>
													</div>
												@endif

												<div class="col-sm-12 col-md-12">
													<div class="form-group form-group-sm"> 
														<span class="labeling" style="color:black">Note: </span>
														<div class="form-group form-group-sm">
															<textarea class="form-control col-lg-12" name="note"></textarea>
														</div>
													</div>
												</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer text-center">
					<input type="submit" class="btn btn-info btn-sm pull-right" value="Request Booking">
				</div>
				{!! Form::close() !!}
				@endforeach <!--endforeach for $packages-->
	</div>

<script>
	$(document).on('click', '.booking_modal', function() {
		$('.slot_id').val($(this).data('slot_id'));
		$('.slots').val($(this).data('slots'));
		$('.package_id').val($(this).data('package_id'));
		$('.date_from').val($(this).data('date_from'));
		$('.date_to').val($(this).data('date_to'));
		$('.service').val($(this).data('service'));
		$('.excess_price').val($(this).data('excess_price'));
		$('#book_modal').modal('show');
	});
</script>

<script>
	var token = '{{ Session::token() }}';
	var urlFave = '{{ route('Traveler.Favorite') }}';
</script>
@endsection
@extends('layouts.user.javascriptlayout')

@section('js')
<script type="text/javascript">
	(function($) {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
			}
		});
	//console.log("HELLO WORLD");
		$(".fave").on('click', function(event){
			event.preventDefault();
			packageId = event.target.parentNode.dataset['id'];
			console.log(packageId);
			var $t = $(this);
			console.log($t);
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
</script>
@endsection
