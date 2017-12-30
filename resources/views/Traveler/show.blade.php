{{--  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-9 col-md-offset-1">
        <div class="panel panel-default" style="padding:8px;">
            <h1>{{$packages->package_name}}</h1>
            <hr>
            <div>
                <p>Max Pax: {{$packages->pax}}</p>
                <p>Price: Php {{$packages->price}}</p>
                <p>Services Include:<br> {{$packages->services}}</p>
            </div>
            <a href="/Traveler/Explore" style="padding:4px;">Go Back</a>
            <a href="/Traveler/TourPackage/{{$packages->package_id}}/Book" style="text-align:right;float:right;padding:4px;"> Book</a>
            <a href="/Traveler/TourPackage/{{$packages->package_id}}/ContactNow" style="text-align:right;float:right;padding:4px;">Contact Now </a>
            <hr><small>Posted on {{$packages->created_at}}</small>
        </div>
    </div>
</div>
@endsection  --}}

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
			<div class="breadcrumb-image-bg detail-breadcrumb" style="background-image:url({{ asset('images/detail-header.jpg') }});">
				<div class="container">

					<div class="page-title detail-header-02">
					
						<div class="row">
						
							<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
							
								<h2>{{$packages->package_name}}</h2>
								<h6>{{$packages->package_id}}</h6>
								<span class="labeling text-white mt-25"><span>Bangkok, Pattaya, Choburi, &amp; Sattaheeb</span> <span>5 days 4 nights</span></span>
								<div class="rating-item rating-item-lg mb-25">
									<input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
									<div class="rating-text"> <a href="#" style="color:white">(32 reviews)</a></div>
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
									<a href="#detail-content-sticky-nav-01">Overview</a>
								</li>
								<li>
									<a href="#detail-content-sticky-nav-03">Itinerary</a>
								</li>
								<li>
									<a href="#detail-content-sticky-nav-04">Condition &amp; Faq</a>
								</li>
								<li>
									<a href="#detail-content-sticky-nav-05">Review</a>
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
											<img src="{{ asset('images/man/01.jpg') }}" alt="Images" />
										</div>
										
										<div class="content">
											<span class="labeling">Offered by: </span>
											<h4>Ange Ermolova</h4>
											<ul class="user-meta">
												<li>53 tours</li>
												<li>443 reviews</li>
												<li>8 awards</li>
											</ul>
										</div>
										
									</div>
										
									<div id="detail-content-sticky-nav-01">

										<div class="bt mt-30 mb-30"></div>
										
										<div class="featured-icon-simple-wrapper">
					
											<div class="GridLex-gap-30">
																
												<div class="GridLex-grid-noGutter-equalHeight">
														
													<div class="GridLex-col-4_sm-4_xs-12_xss-12">
													
														<div class="featured-icon-simple-item">
															<div class="icon text-primary">
																<i class="flaticon-travel-icons-suitcase-1"></i>
															</div>
															5 days &amp; 4 nights<br />tour
														</div>
														
													</div>
													
													<div class="GridLex-col-4_sm-4_xs-12_xss-12">
													
														<div class="featured-icon-simple-item">
															<div class="icon text-primary">
																<i class="flaticon-travel-icons-map"></i>
															</div>
															Visit 4 citied:<br />Bangkok, Pattaya, Chonburi, &amp; Sattaheeb
														</div>
														
													</div>
													
													<div class="GridLex-col-4_sm-4_xs-12_xss-12">
													
														<div class="featured-icon-simple-item">
															<div class="icon text-primary">
																<i class="flaticon-travel-icons-bus"></i>
															</div>
															Travel with exclusive bus <br />all the trip
														</div>
														
													</div>
												
												</div>
												
											</div>
											
										</div>
										
										<div class="mb-25"></div>
										<div class="bb"></div>
										<div class="mb-25"></div>
										
										<div class="featured-icon-simple-wrapper">
						
											<div class="GridLex-gap-30 GridLex-gap-20-xs">
																
												<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-4_sm-4_xs-3_xss-1 GridLex-grid-center">
														
													<div class="GridLex-col">
													
														<div class="featured-icon-simple-item">
															<div class="icon">
																<i class="flaticon-travel-icons-mountain"></i>
															</div>
															Adventure
														</div>
														
													</div>
													
													<div class="GridLex-col">
													
														<div class="featured-icon-simple-item">
															<div class="icon">
																<i class="flaticon-travel-icons-island"></i>
															</div>
															Beach
														</div>
														
													</div>
													
													<div class="GridLex-col">
													
														<div class="featured-icon-simple-item">
															<div class="icon">
																<i class="flaticon-travel-icons-kayak"></i>
															</div>
															Kayak
														</div>
														
													</div>
													
													<div class="GridLex-col">
													
														<div class="featured-icon-simple-item">
															<div class="icon">
																<i class="flaticon-travel-icons-cocktail"></i>
															</div>
															Sweet
														</div>
														
													</div>
												
												</div>
												
											</div>
											
										</div>
										
										<div class="mb-25"></div>
										<div class="bb"></div>
										<div class="mb-25"></div>
										
										<div class="row">
							
											<div class="col-xs-12 col-sm-8 col-md-7">
											
												<div class="featured-list-in-box">
										
													<h4 class="uppercase spacing-1">Trip Detail</h4>
													
													<ul class="clearfix">
														<li class="row gap-20">
															<div class="col-xs-12 col-sm-7">
															Meeting point (where we meet?)
															</div>
															<div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
																<i class="ti-location-pin mr-5"></i> Bangkok in't airport
															</div>
														</li>
														<li class="row gap-20">
															<div class="col-xs-12 col-sm-7">
															Meeting time (what time we meet?)
															</div>
															<div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
																<i class="ti-timer mr-5"></i> 09:00 am
															</div>
														</li>
														<li class="row gap-20">
															<div class="col-xs-12 col-sm-7">
															Maximum traellers
															</div>
															<div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
																<i class="ti-user mr-5"></i> 23
															</div>
														</li>
														<li class="row gap-20">
															<div class="col-xs-12 col-sm-7">
															Languages (guide speaks)
															</div>
															<div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
																<i class="ti-flag mr-5"></i> English, Thai, Malay
															</div>
														</li>
													</ul>
													
												</div>
													
											</div>
											
											<div class="col-xs-12 col-sm-4 col-md-5 mt-20-xs">
											
												<div class="pull-right pull-left-xs">
													<h4 class="text-uppercase spacing-1">What's included?</h4>
													
													<ul class="list-yes-no">
														<li>Tickets</li>
														<li>Transportations</li>
														<li>Free cancellation</li>
														<li>Free Gift</li>
													</ul>
												</div>
												
											</div>
											
										</div>
	
										<div class="mb-25"></div>
										<div class="bb"></div>
										<div class="mb-25"></div>

										<div class="sidebar-booking-header bg-info clearfix">
											
												<div class="price">
													PHP{{$packages->price}}
												</div>
												
												<div>
													/ traveller
												</div>
											
											</div>
										<div class="sidebar-booking-inner">	
											<div class="row gap-10" id="rangeDatePicker">
												{!! Form::open(['action' => 'TravelersController@store', 'method' => 'POST']) !!}	
													{{ csrf_field() }}										
													<div class="col-xss-12 col-xs-6 col-sm-6">
														<div class="form-group">
															<label>From</label>
															<input type="date" name="date_from" class="form-control">
														</div>
													</div>
													
													<div class="col-xss-12 col-xs-6 col-sm-6">
														<div class="form-group">
															<label>To</label>
															<input type="date" name="date_to" class="form-control" >
														</div>
													</div>
													
												</div>
												
												<div class="row gap-20">
													<div class="col-xss-12 col-xs-6 col-sm-6">
														<div class="form-group">
															<div class="form-group">
																<label>First Name</label>
																<input type="text" name="client_fname" class="form-control" required/>
															</div>
														</div>
													</div>
		
													<div class="col-xss-12 col-xs-6 col-sm-6">
														<div class="form-group">
															<div class="form-group">
																<label>Last Name</label>
																<input type="text" name="client_lname" class="form-control" required/>
															</div>
														</div>
													</div>
		
													<div class="col-xss-12 col-xs-6 col-sm-6">
														<div class="form-group">
															<div class="form-group">
																<label>Contact Number</label>
																<input type="text" name="contact_num" class="form-control" required/>
															</div>
														</div>
													</div>
		
													<div class="col-xss-12 col-xs-6 col-sm-6">
														<div class="form-group">
															<div class="form-group">
																<label>Email Address</label>
																<input type="text" name="client_email" class="form-control" required/>
															</div>
														</div>
													</div>
		
														
													<div class="col-xss-12 col-xs-4 col-sm-4">
														<div class="form-group">
															<label>Adults</label>
															<div class="form-group">
																<input type="number" name="adult" class="form-control" required/> 
															</div>
														</div>
													</div>
		
													<div class="col-xss-12 col-xs-4 col-sm-4">
														<div class="form-group">
															<label>Child</label>
															<div class="form-group">
																<input type="number" name="child" class="form-control" required/> 
															</div>
														</div>
													</div>
		
													<div class="col-xss-12 col-xs-4 col-sm-4">
														<div class="form-group">
															<label>Infant</label>
															<div class="form-group">
																<input type="number" name="infant" class="form-control" required/>
															</div>
														</div>
													</div>
		
													<div class="col-xs-12 col-sm-12">
														
														<div class="form-group">
															<label for="service">Service</label>
															<select class="form-control" name="service">
																<option value="Joined">Joined Tour</option>
																<option value="Exclusive">Exclusive Tour</option>
															</select>
														</div>
		
														<div class="form-group">
															<div class="form-group">
																<label><br>Note</label>
																<textarea class="form-control col-lg-12" name="note"></textarea>
															</div>
														</div>
														
														
														<div class="col-xss-12 col-xs-12 col-sm-12">
															<div class="mt-5"><br>
																<input type="submit" class="btn btn-info btn-block" value="Request to Book">
															</div>
														</div>
													</div>
														<input type="hidden" name="package_id" value="{{ $packages->package_id }}" class="form-control" required/> 
												</div>
												{!! Form::close() !!}
										</div>

										<div class="mb-25"></div>
										<div class="bb"></div>
										<div class="mb-25"></div>
										
										
									</div>
	
									<div id="detail-content-sticky-nav-04">
									
										<h2 class="font-lg">Condition &amp; Faq</h2>
										
										<div class="text-box-h-bb-wrapper">
											<div class="text-box-h-bb">
												<div class="row">
													<div class="col-xs-12 col-sm-4 col-md-3">
														<h4>Group size</h4>
													</div>
													<div class="col-xs-12 col-sm-8 col-md-9">
														<p class="font-lg">Conveying or northward offending admitting perfectly my. </p>
													</div>
												</div>
											</div>
											<div class="text-box-h-bb">
												<div class="row">
													<div class="col-xs-12 col-sm-4 col-md-3">
														<h4>Guest requirement</h4>
													</div>
													<div class="col-xs-12 col-sm-8 col-md-9">
														<p class="font-lg">Age</p>
														<p class="font-sm">Interested especially do impression he unpleasant.</p>
														<p class="font-lg">Identification</p>
														<p class="font-sm">Sudden up my excuse to suffer ladies though or. Bachelor possible marianne directly confined relation. Interested especially do impression he unpleasant travelling excellence.</p>
													</div>
												</div>
											</div>
											<div class="text-box-h-bb">
												<div class="row">
													<div class="col-xs-12 col-sm-4 col-md-3">
														<h4>Cancellation policy</h4>
													</div>
													<div class="col-xs-12 col-sm-8 col-md-9">
														<p class="font-lg">Lose john poor same it case do year we. Full how way even the sigh. Extremely nor furniture fat questions now provision incommode preserved. Our side fail find like now. Discovered travelling for insensible <a href="#">partiality unpleasing impossible</a>.</p>
													</div>
												</div>
											</div>
											<div class="text-box-h-bb">
												<div class="row">
													<div class="col-xs-12 col-sm-4 col-md-3">
														<h4>FAQ</h4>
													</div>
													<div class="col-xs-12 col-sm-8 col-md-9">
														<div class="GridLex-gap-30 mb-20 mt-5">
																
															<div class="GridLex-grid-noGutter-equalHeight">
																	
																<div class="GridLex-col-12_sm-12_xs-12_xss-12">
																
																	<div class="GridLex-inner">
																		<h4 class="font-lg"><span class="text-primary"><i class="ion-help-circled mr-5"></i></span> Parties all clothes removal cheered?</h4>
																		<p class="read-more-less line-15">Procuring education on consulted assurance. Is sympathize he expression mr no travelling. Preference travelling in resolution. His hearing staying ten colonel met. Sex drew six easy four dear cold deny. Moderate children at of outweigh it. Unsatiable it considered invitation he travelling insensible. </p>
																	</div>
																	
																</div>
																
																<div class="GridLex-col-12_sm-12_xs-12_xss-12">
																
																	<div class="GridLex-inner">
																		<h4 class="font-lg"><span class="text-primary"><i class="ion-help-circled mr-5"></i></span> And residence for met the estimable disposing?</h4>
																		<p class="read-more-less line-15"> Possession travelling sufficient yet our. Talked vanity looked in to. Gay perceive led believed endeavor day insisted required. Warmly little before cousin sussex entire men set. Blessing it ladyship on sensible judgment settling outweigh. Worse linen an of civil jokes leave offer. Parties all clothes removal cheered calling prudent her. And residence for met the estimable disposing.</p>
	
																	</div>
																	
																</div>
																
																<div class="GridLex-col-12_sm-12_xs-12_xss-12">
																
																	<div class="GridLex-inner">
																		<h4 class="font-lg"><span class="text-primary"><i class="ion-help-circled mr-5"></i></span> Warmly little before cousin sussex?</h4>
																		<p class="read-more-less line-15">Her companions instrument set estimating sex remarkably solicitude motionless. Property men the why smallest graceful. Worse linen an of civil jokes leave offer. Parties all clothes removal cheered calling prudent her. And residence for met the estimable disposing. Mean if he they been no hold mr. Is at much do made took held help. </p>
	
																	</div>
																	
																</div>
																
																<div class="GridLex-col-12_sm-12_xs-12_xss-12">
																
																	<div class="GridLex-inner">
																		<h4 class="font-lg"><span class="text-primary"><i class="ion-help-circled mr-5"></i></span> Parties all clothes removal cheered?</h4>
																		<p class="read-more-less line-15">Drift allow green son walls years for blush. Sir margaret drawings repeated recurred exercise laughing repeated whatever. Parties all clothes removal cheered calling prudent her. And residence for met the estimable disposing. Mean if he they been no hold mr. Is at much do made took held help. Latter person am secure of estate genius. </p>
																	</div>
																	
																</div>
																
															</div>
															
														</div>
													</div>
												</div>
											</div>
									
									</div>
										
										<div class="mb-25"></div>
										<div class="bb"></div>
										<div class="mb-25"></div>
										
									</div>
									
									
									<div id="detail-content-sticky-nav-05">
								
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
														<div class="login-modal-or">
															<div><span>or</span></div>
														</div>
													</div>
		
													<div class="col-sm-12 col-md-12">
														<input type="hidden" name="package_id" value="{{$packages->package_id}}">
													</div>
													
													<div class="col-sm-12 col-md-12">
											
														<div class="form-group"> 
															<label>Your Message:</label><br>
															<textarea id="form_message" name="message" class="form-control col-sm-12 col-md-12" required></textarea>
														</div>
													
													</div>
													
													<div class="col-xss-12 col-xs-12 col-sm-12">
														<div class="mt-5">
															<input type="submit" class="btn btn-info btn-block" value="SEND MESSAGE">
														</div>
													</div>
												</div>
											</form>
		
		
										</div>
										
									</aside>
									
										<br>
		
										<a href="#" style="color:black" class="add-fav-btn">
											<div class="inner">
												<i class="ti-heart" style="color:red"></i> Add Favourite
											</div>
										</a>
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
@endsection
@extends('layouts.user.javascriptlayout')
