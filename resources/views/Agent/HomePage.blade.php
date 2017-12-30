
@extends('layouts.agent-navbar')

@section('content')
<div class="container-wrapper">

		<!-- start Header -->
		
		<header id="header">

                @extends('layouts.user.headlayout')

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
								<h2>Packages</h2>
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
						<li class="active">Inbox</li>
					</ol>
				</div>
			</div>
			
			
			<!-- end Breadcrumb -->
		
            <div class="pt-30 pb-50">
			
				<div class="container">
					
					<div class="trip-guide-wrapper">
					
						@include('layouts.user.alerts')
						
						<div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
							<div class="GridLex-grid-noGutter-equalHeight GridLex-grid">
							<div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
									
									<div class="trip-guide-item bg-light-primary">

										<div class="trip-guide-image">
											<img src="{{ asset('images/itinerary/01.jpg') }}" alt="images" />
										</div>
										
										<div class="trip-guide-content bg-white">
											<h3>SAmple package name</h3>
										</div>

										<div class="trip-guide-bottom">
										
											<div class="trip-guide-person bg-white clearfix">
												<div class="image">
													<img src="{{ asset('images/testimonial/01.jpg')}}" class="img-circle" alt="images" />
												</div>
												<p class="name">By: <a href="#">Robert Kalvin</a></p>
												<p>Posted on Dec. 12, 2017</p>
			
											</div>
											
											<div class="trip-guide-meta row gap-10">
												<div class="col-xs-6 col-sm-6">
													<div class="rating-item">
														<input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
													</div>
												</div>
												<div class="col-xs-6 col-sm-6 text-right">
													5 days 4 nights
												</div>
											</div>
											
											<div class="row gap-10">
												<div class="col-xs-12 col-sm-6">
													<div class="trip-guide-price">
														Starting at
														<span class="number">PHP 1500</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 text-right">
														<a href="" class="btn btn-info">Details</a>
												</div>
											</div>

										
										</div>
									
									</div>
								
								</div>
									
							</div> 
						
						</div> 

						<div class="pager-wrappper clearfix">
			
								<div class="pager-innner">
										
										<div class="pager-wrappper clearfix">
			
											<div class="pager-innner">
														
												<div class="clearfix">
													<nav class="pager-center">
														<ul class="pagination">
																
														</ul>
													</nav>
												</div>
											</div>
												
										</div>
									
								</div>
						
					</div>

					{{--  @else
						<center><h2>No Packages Yet.</h2></center>
					@endif  --}}

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