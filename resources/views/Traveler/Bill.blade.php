@extends('layouts.user.headlayout')

@section('content')
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
		
			<!-- start Breadcrumb -->
			
			<div class="breadcrumb-wrapper">
				<div class="container">
					<ol class="breadcrumb">
						<li><a>Explore</a></li>
						<li><a>{{ $bookingRequest->package_name }}</a></li>
						<li class="active">Bill</li>
					</ol>
				</div>
			</div>
			
			<!-- end Breadcrumb -->

			<div class="user-profile-wrapper">

				<div class="payment-header">
					
					<div class="container">
					
						<div class="content">
							
							<div class="trip-list-item no-border">
								<div class="image-absolute">
									<div class="image image-object-fit image-object-fit-cover">
										<img src="images/trip/01.jpg" alt="image" >
									</div>
								</div>
								<div class="content">
								
									<div class="GridLex-gap-20 mb-5">
				
										<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
										
											<div class="GridLex-col-6_sm-12_xs-12_xss-12">
												
												<div class="GridLex-inner">
													<h6>{{ $bookingRequest->package_name}}</h6>
													<span class="font-italic font14">5 days 4 nights</span>
												</div>
												
											</div>
											
											<div class="GridLex-col-3_sm-6_xs-7_xss-12 pull-right">
												
											</div>
											
											<div class="GridLex-col-3_sm-6_xs-5_xss-12">
												<div class="GridLex-inner line-1 font14 text-center text-left-sm text-muted spacing-1">
													<div class="rating-item rating-item-lg  mt-10-xs">
														<input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
														<div class="rating-text">Based on <a href="#">32 reviews</a></div>
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
				
			</div>

			<div class="pt-30 pb-50">
			
				<div class="container">

					<div class="row">
						
						<div class="col-xs-12 col-sm-8 col-md-8 mt-20">
						
							<form method="POST" action="{{ route('Traveler.ConfirmRequest') }}">
								<h4 class="section-title">Client Details</h4>

								<div class="payment-content">
											
									<div class="payment-traveller">
                                        <div class="form-horizontal">
                                            <div class="form-group select2-input-hide">
												{{ csrf_field() }}
                                                <label class="col-sm-3 col-md-2 control-label">Travel Date:</label>
                                                <div class="col-sm-8 col-md-5">
                                                    
                                                    <div class="row gap-5">
                                                        <div class="col-xs-5 col-sm-5">
															<input type="hidden" name="booking_id" class="form-control" value="{{ $bookingRequest->booking_id }}">
                                                            <input type="text" name="date_from" class="form-control" value="{{ Carbon\Carbon::parse($bookingRequest->date_from)->toFormattedDateString() }}" readonly>
                                                        </div>
                                                        <div class="col-xs-2 col-sm-2">
                                                            <div>To</div>
                                                        </div>
                                                        <div class="col-xs-5 col-sm-5">
                                                            <input type="text" name="date_to" class="form-control" value="{{ Carbon\Carbon::parse($bookingRequest->date_to)->toFormattedDateString() }}" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
											
										<div class="form-horizontal">
											<div class="form-group">
												<label class="col-sm-3 col-md-2 control-label">First Name:</label>
												<div class="col-sm-5 col-md-5">
													<input type="text" name="client_fname" class="form-control" value="{{ $bookingRequest->client_fname }}" readonly>
												</div>
											</div>
										</div>
										
										<div class="form-horizontal">
											<div class="form-group">
												<label class="col-sm-3 col-md-2 control-label">Last Name:</label>
												<div class="col-sm-5 col-md-5">
													<input type="text" name"client_lname" class="form-control" value="{{ $bookingRequest->client_lname }}" readonly>
												</div>
											</div>
                                        </div>
                                        
										<div class="form-horizontal">
											<div class="form-group">
												<label class="col-sm-3 col-md-2 control-label">Email:</label>
												<div class="col-sm-5 col-md-5">
													<input type="email" name="client_email" class="form-control" value="{{ $bookingRequest->client_email }}" readonly>
												</div>
											</div>
										</div>
										
										<div class="form-horizontal">
											<div class="form-group">
												<label class="col-sm-3 col-md-2 control-label">Phone:</label>
												<div class="col-sm-5 col-md-5">
													<input type="email" name="contact_num" class="form-control" value="{{ $bookingRequest->contact_num }}" readonly>
												</div>
											</div>
                                        </div>
                                        
                                        
                                        <div class="form-horizontal">
                                            <div class="form-group select2-input-hide">
                                                <label class="col-sm-3 col-md-2 control-label">Service:</label>
                                                <div class="col-sm-8 col-md-5">
                                                    
                                                    <div class="row gap-5">
                                                        <div class="col-xs-5 col-sm-5">
                                                            <input type="text" name="service" class="form-control" value="{{ $bookingRequest->service }}" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-horizontal">
                                                <div class="form-group select2-input-hide">
                                                    <label class="col-sm-3 col-md-2 control-label">Adult:</label>
                                                    <div class="col-sm-8 col-md-5">
                                                        
                                                        <div class="row gap-5">
                                                            <div class="col-xs-3 col-sm-3">
                                                                <input type="text" name="adult" class="form-control" value="{{ $bookingRequest->adult }}" readonly>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="form-horizontal">
                                            <div class="form-group select2-input-hide">
                                                <label class="col-sm-3 col-md-2 control-label">Child:</label>
                                                <div class="col-sm-8 col-md-5">
                                                    
                                                    <div class="row gap-5">
                                                        <div class="col-xs-3 col-sm-3">
                                                            <input type="text" name="child" class="form-control" value="{{ $bookingRequest->child }}" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-horizontal">
                                            <div class="form-group select2-input-hide">
                                                <label class="col-sm-3 col-md-2 control-label">Infant:</label>
                                                <div class="col-sm-8 col-md-5">
                                                    
                                                    <div class="row gap-5">
                                                        <div class="col-xs-3 col-sm-3">
                                                            <input type="text" name="infant" class="form-control" value="{{ $bookingRequest->infant }}" readonly>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="total_payment" class="form-control" value="{{ ($bookingRequest->total_payment) * ($bookingRequest->adult + $bookingRequest->child + $bookingRequest->infant) }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-10 text-center">
                                            <p class="font-md text-muted font500 spacing-2">You won't be charged on this booking. Payments will be made physically.</p>
                                        </div>
									</div>
								</div>
								
								<div class="bb mt-20 mb-20"></div>
							
								<button type="submit" class="btn btn-info mt-25 pull-right">Book Now</button>
							</form>

							<form method="post" action="{{ route('Traveler.CancelRequest') }}">
								{{ csrf_field() }}
								<input type="hidden" name="booking_id" class="form-control" value="{{ $bookingRequest->booking_id }}">
								<button type="submit" class="btn btn-danger mt-25 pull-right" style="margin-right:2%">Cancel Request</a>
							</form>
						</div>
						
						<div id="sidebar-sticky" class="col-xs-12 col-sm-4 col-md-4 mt-20 sticky-mt-30 mt-50-sm">
						
							<aside class="sidebar-wrapper with-box-shadow">
							
								<div class="sidebar-booking-box">
							
									<div class="sidebar-booking-header pt-20 pb-15 clearfix">
									
										<h3 class="text-white text-uppercase spacing-3 mb-0 line-1">Trip Summary</h3>
									
									</div>
									
									<div class="sidebar-booking-inner">
									
										<ul class="price-summary-list">
								
											<li>
												<h6>Meeting point</h6>
												<p class="text-muted">Bangkok in't airport</p>
											</li>
											
											<li>
												<h6>Meeting time</h6>
												<p class="text-muted">09:00 am</p>
											</li>
											
											<li>
												<h6>Travellers</h6>
                                                <p class="text-muted"> {{ $bookingRequest->adult }} Adult/s</p>
                                                @if($bookingRequest->child == 1)
                                                    <p class="text-muted"> {{ $bookingRequest->child }} Child</p>
                                                @else
                                                    <p class="text-muted"> {{ $bookingRequest->child }} Children</p>
                                                @endif
                                                <p class="text-muted"> {{ $bookingRequest->infant }} Infant/s</p>
											</li>
											
											<li class="divider"></li>
											
											<li>
												<h6 class="heading mt-20 mb-5 text-primary uppercase">Price per person</h6>
												<div class="row gap-10 mt-10">
													<div class="col-xs-7 col-sm-7">
														Tour Package Price
													</div>
													<div class="col-xs-5 col-sm-5 text-right">
														PHP {{ $bookingRequest->total_payment }}
													</div>
												</div>
											</li>
											
											<li class="divider"></li>
											
											<li>
												<div class="row gap-10 mt-10">
													<div class="col-xs-7 col-sm-7">
														<span class="font600">Total </span>
													</div>
													<div class="col-xs-5 col-sm-5 text-right">
                                                            PHP {{ $bookingRequest->total_payment }} x {{ $bookingRequest->adult + $bookingRequest->child + $bookingRequest->infant }}
														<h4 class="font600 font24 block text-primary mt-5">
                                                            PHP {{ ($bookingRequest->total_payment) * ($bookingRequest->adult + $bookingRequest->child + $bookingRequest->infant) }}</h4>
													</div>
												</div>
											</li>
											
										</ul>
										
									</div>
								
								</div>
								
							</aside>
						
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
</div>
@endsection
@extends('layouts.user.javascriptlayout')