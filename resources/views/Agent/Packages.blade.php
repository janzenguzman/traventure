{{--  <html>
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
                <div class="panel-heading">Packages</div>
                    <div class="links">
                        <a href="Packages">Packages</a>
                        <a href="Bookings">Bookings</a>
                        <a href="Messages">Messages</a>
                    </div>
                </div>
                <form action="/Agent/Packages/CreatePackage">
                        <input type="submit" value="Create a package"/>
                </form>
                <div>
                    <div class="panel-heading">
                        <table>
                            <tr>
                                <td>ID</td>
                                <td>Package Name</td>
                                <td>Type</td>
                                <td>Reminders</td>
                                <td>Action</td>
                            </tr>
                                @if(count($packages) > 0)
                                    @foreach($packages as $package)
                            <tr>
                                <td>{{$package->package_id}}</td>
                                <td>{{$package->package_name}}</td>
                                <td>{{$package->type}}</td>
                                <td>{{$package->reminders}}</td>
                                <td><a href="/Agent/Packages/DeletePackage/{{ $package->package_id }}"><button>Delete</button></a>
                                    --  <a href="{{ route('Agent.EditSlots', $packages->package_id) }}"><button>Slots</button></a>  --
                                    <a href="/Agent/Packages/AddSlots/{{ $package->package_id }}"><button>Add Slots</button></a>
                                    <a href="/Agent/Packages/PackageDetails/{{ $package->package_id }}"><button>View More</button></a></td>
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
{{--  Index 10  --}}

@extends('layouts.user.headlayout')

@section('content')
{{--  <body class="home transparent-header">  --}}
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
		<!-- start hero-header -->
		<div class="hero with-horizontal-featured-icon-absolute-bottom img-bg-01">
			<div class="container">
				<h1>Packages</h1>
				{{--  <form>
					<div class="form-group">
						<input type="text" placeholder="eg: Cebu, Bohol, Boracay" class="form-control flexdatalist" data-data="data/countries.json" data-search-in='["name","capital"]' data-visible-properties='["capital","name","continent"]' data-group-by="continent" data-selection-required="true" data-focus-first-result="true" data-min-length="1" data-value-property="iso2" data-text-property="{capital}, {name}" data-search-contain="false" name="countries">
						<button class="btn"><i class="icon-magnifier"></i></button>
					</div>
				</form>  --}}
			</div>
		</div>
		<!-- end hero-header -->
		<div class="bg-white pt-70 pb-60 clearfix">
			<div class="container">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						<div class="section-title">
							<a href="/Agent/Packages/CreatePackage" class="btn btn-success" role="button">
								<i class="ti-plus"></i> Create a Tour Package</a>
							{{--  <form action="/Agent/Packages/CreatePackage" method="POST">
								<button type="submit" class="btn btn-primary">
									<i class="icon-plus"></i> Create a Tour Packages</button>
								{{--  <input type="submit" value="Create a Tour Package"/>  --
							</form>  --}}
						</div>
					</div>
				</div>
				<div class="trip-guide-wrapper mb-30">
					@include('layouts.user.alerts')
					<div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
						<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
							@if(count($packages) > 0)
								@foreach($packages as $package)
									<div class="GridLex-col-4_mdd-3_sm-6_xs-6_xss-12">
										<div class="trip-guide-item">
											<div class="trip-guide-image">
												<img src="/public/uploads/files/{{ $package->photo }}" style="height:250px;width:500;" alt="images" />
											</div>
											<div class="trip-guide-content-agent">
												<p>Package ID: {{$package->package_id}}</p>
												<h3>Package Name: {{$package->package_name}}</h3>
											</div>
											<div class="trip-guide-bottom">
												<div class="trip-guide-person clearfix">
													<div class="image">
														<img src="{{ asset('images/testimonial/01.jpg') }}" class="img-circle" alt="images" />
													</div>
													<p class="name">By: <a href="#">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</a></p>
													<p>{{ Auth::user()->company_name }}</p>
												</div>
												
												<div class="trip-guide-meta row gap-10">
													<div class="col-xs-6 col-sm-6">
														<div class="rating-item">
															<input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
														</div>
													</div>
													<div class="col-xs-6 col-sm-6 text-right">
														{{$package->days}} 
														@if($package->days > 1)
															days
														@else
															day
														@endif
													</div>
												</div>
												
												<div class="row gap-10">
													<div class="col-xs-12 col-sm-6">
														<div class="trip-guide-price">
															Starting at
															<span class="block inline-block-xs">USD 687.00</span>
														</div>
													</div>
												</div>
												<div class="wanted-trip-header">
													{{--  <a href="#" class="btn btn-primary">Details</a>  --}}
													<a href="/Agent/Packages/DeletePackage/{{ $package->package_id }}">
														<button class="btn btn-danger">Delete</button>
													</a>
													{{--  <a href="{{ route('Agent.EditSlots', $packages->package_id) }}"><button>Slots</button></a>  --}}
													<a href="/Agent/Packages/AddSlots/{{ $package->package_id }}">
														<button class="btn btn-color-03">Add Slots</button>
													</a>
													<a href="/Agent/Packages/PackageDetails/{{ $package->package_id }}">
														<button class="btn btn-primary">View More</button>
													</a>
												</div>
											</div>
										</div>
									</div>
								@endforeach
							@else
								<h3>No packages found</h3>
							@endif
						</div>
					</div>
				</div>
			</div>				
		</div>
		
		<div class="clearfix">
		
			<div class="container pt-70 pb-80">

				<div class="row">
				
					<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
					
						<div class="section-title">
						
							<h2>How It Works</h2>
							<p class="lead">The trips that travellers are looking for local guides or experts for them</p>
						</div>
					
					</div>
				
				</div>
				
				<div class="GridLex-gap-30 GridLex-gap-20-mdd GridLex-gap-10-xs alt-number-color ">
				
					<div class="GridLex-grid-noGutter-equalHeight">
						
						<div class="GridLex-col-4_sm-4_xs-12">
						
							<div class="how-it-work-item clearfix">
								<div class="icon">
									<i class="icon-note"></i>
								</div>
								<div class="content">
									<span class="number">01.</span>
									<h3>Create a Trip Program</h3>
									<p class="line-1-45">Denote simple fat denied add worthy little use. Instantly gentleman contained belonging exquisite.</p>
								</div>
							</div>
							
						</div>
						
						<div class="GridLex-col-4_sm-4_xs-12">
						
							<div class="how-it-work-item clearfix">
								<div class="icon">
									<i class="icon-cloud-upload"></i>
								</div>
								<div class="content">
									<span class="number">02.</span>
									<h3>Publish Your Trip Program</h3>
									<p class="line-1-45">With my them if up many. Extremity so attending objection as engrossed gentleman something.</p>
								</div>
							</div>
							
						</div>
						
						<div class="GridLex-col-4_sm-4_xs-12">
						
							<div class="how-it-work-item clearfix">
								<div class="icon">
									<i class="icon-speech"></i>
								</div>
								<div class="content">
									<span class="number">03.</span>
									<h3>Traveller Contact With You</h3>
									<p class="line-1-45">Old education him departure any arranging one prevailed. Behaved the comfort another fifteen eat.</p>
								</div>
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>

		</div>
		
		<div class="featured-bg pt-80 pb-60 img-bg-02">
		
			<div class="container">
			
				<div class="row">
				
					<div class="col-md-10 col-md-offset-1">
						
						<div class="row gap-0">
						
							<div class="col-xss-6 col-xs-6 col-sm-3">
								<div class="counting-item">
									<div class="icon">
										<i class="icon-directions"></i>
									</div>
									<p class="number">354</p>
									<p>Packages</p>
								</div>
							</div>
							
							<div class="col-xss-6 col-xs-6 col-sm-3">
								<div class="counting-item">
									<div class="icon">
										<i class="icon-user"></i>
									</div>
									<p class="number">241</p>
									<p>Guides</p>
								</div>
							</div>
							
							<div class="col-xss-6 col-xs-6 col-sm-3">
								<div class="counting-item">
									<div class="icon">
										<i class="icon-location-pin"></i>
									</div>
									<p class="number">142</p>
									<p>Destinations</p>
								</div>
							</div>
							
							<div class="col-xss-6 col-xs-6 col-sm-3">
								<div class="counting-item">
									<div class="icon">
										<i class="icon-envelope-letter"></i>
									</div>
									<p class="number">354</p>
									<p>Requests</p>
								</div>
							</div>
							
						</div>
						
					</div>
				
				</div>
				
				<div class="row mt-70">
					
					<div class="col-xs-12 col-sm-8 col-sm-offset-2">
					
						<div class="fearured-join-item mb-0">
							<h2 class="alt-font-size">Create Your Trip?</h2>
							<p class="mb-25 font20">Rooms oh fully taken by worse do. Points afraid but may end law lasted. Was out laughter raptures returned outweigh outward the him existence assurance.</p>
							<a href="#" class="btn btn-primary btn-lg">Join for Guide</a>
						</div>
					
					</div>
				
				</div>
				
			</div>
			
		</div>
		
		<div class="bg-white">
		
			<div class="pt-70 pb-60 max-width-wrapper">
			
				<div class="container">

					<div class="row">
					
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						
							<div class="section-title">
							
								<h2>communities</h2>
							
							</div>
						
						</div>
					
					</div>
					
				</div>
				
				<div class="community-wrapper mb-30">
				
					<div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
				
						<div class="GridLex-grid-noGutter-equalHeight">
						
							<div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">
							
								<a href="#" class="community-item">
									<div class="image-object-fit image-object-fit-cover image">	
										<img src="images/blog/01.jpg" alt="images" />
									</div>
									<div class="community-item-category"><span class="bg-danger">Travel</span></div>
									<div class="community-item-caption">
										<h3>Behaviour we improving at something to</h3>
										<p>Evil true high lady roof men had open. To projection considered it precaution...</p>
										<div class="community-item-meta">
											<div class="row gap-10">
												<div class="col-xs-8 col-sm-8">
													by admin on Jan 12, 2016
												</div>
												<div class="col-xs-4 col-sm-4 text-right">
													read <i class="icon-arrow-right-circle font12"></i>
												</div>
											</div>
										</div>
									</div>
								</a>
								
							</div>
							
							<div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">
							
								<a href="#" class="community-item">
									<div class="image-object-fit image-object-fit-cover image">	
										<img src="images/blog/02.jpg" alt="images" />
									</div>
									<div class="community-item-category"><span class="bg-info">Hotel</span></div>
									<div class="community-item-caption">
										<h3>Wound young you thing worse along being ham</h3>
										<p>Dissimilar of favourable solicitude if sympathize middletons at. Forfeited disposing...</p>
										<div class="community-item-meta">
											<div class="row gap-10">
												<div class="col-xs-8 col-sm-8">
													by admin on Jan 12, 2016
												</div>
												<div class="col-xs-4 col-sm-4 text-right">
													read <i class="icon-arrow-right-circle font12"></i>
												</div>
											</div>
										</div>
									</div>
								</a>
								
							</div>
							
							<div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">
							
								<a href="#" class="community-item">
									<div class="image-object-fit image-object-fit-cover image">	
										<img src="images/blog/03.jpg" alt="images" />
									</div>
									<div class="community-item-category"><span class="bg-success">Flight</span></div>
									<div class="community-item-caption">
										<h3> perfectly in an eagerness perceived necessary</h3>
										<p>Belonging sir curiosity discovery extremity yet forfeited prevailed own off...</p>
										<div class="community-item-meta">
											<div class="row gap-10">
												<div class="col-xs-8 col-sm-8">
													by admin on Jan 12, 2016
												</div>
												<div class="col-xs-4 col-sm-4 text-right">
													read <i class="icon-arrow-right-circle font12"></i>
												</div>
											</div>
										</div>
									</div>
								</a>
								
							</div>
							
							<div class="GridLex-col-3_mdd-6_sm-6_xs-6_xss-12">
							
								<a href="#" class="community-item">
									<div class="image-object-fit image-object-fit-cover image">	
										<img src="images/blog/04.jpg" alt="images" />
									</div>
									<div class="community-item-category"><span class="bg-info">Hotel</span></div>
									<div class="community-item-caption">
										<h3> Travelling by introduced of mr terminated</h3>
										<p>Knew as miss my high hope quit. In curiosity shameless dependent knowledge up...</p>
										<div class="community-item-meta">
											<div class="row gap-10">
												<div class="col-xs-8 col-sm-8">
													by admin on Jan 12, 2016
												</div>
												<div class="col-xs-4 col-sm-4 text-right">
													read <i class="icon-arrow-right-circle font12"></i>
												</div>
											</div>
										</div>
									</div>
								</a>
								
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
	
		<footer class="main-footer">
		
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
								<h5 class="footer-title">quick  links</h5>
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
			
		</footer>
		
		<footer class="bottom-footer">
		
			<div class="container">
			
				<div class="row">
				
					<div class="col-xs-12 col-sm-6 col-md-4">
			
						<p class="copy-right">&#169; 2017 Togoby - tour hosting</p>
						
					</div>
					
					<div class="col-xs-12 col-sm-6 col-md-4">
					
						<ul class="bottom-footer-menu">
							<li><a href="#">Cookies</a></li>
							<li><a href="#">Policies</a></li>
							<li><a href="#">Terms</a></li>
							<li><a href="#">Blogs</a></li>
						</ul>
					
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-4">
						<ul class="bottom-footer-menu for-social">
							<li><a href="#"><i class="icon-social-twitter" data-toggle="tooltip" data-placement="top" title="twitter"></i></a></li>
							<li><a href="#"><i class="icon-social-facebook" data-toggle="tooltip" data-placement="top" title="facebook"></i></a></li>
							<li><a href="#"><i class="icon-social-google" data-toggle="tooltip" data-placement="top" title="google plus"></i></a></li>
							<li><a href="#"><i class="icon-social-instagram" data-toggle="tooltip" data-placement="top" title="instrgram"></i></a></li>
						</ul>
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
