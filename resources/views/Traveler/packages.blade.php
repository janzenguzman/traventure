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
		
			<!-- start hero-header -->
			<div class="hero img-bg-01">
				<div class="container">

					<h1>Where do you want to go?</h1>
					<center><p>Discover and book your unique travel experiences offered by travel agents</p></center>
				</div>
				
			</div>
			<!-- end hero-header -->
			
			<div class="filter-full-width-wrapper">
				<form class="">
					<div class="filter-full-primary">
						<div class="container">
							<div class="filter-full-primary-inner">
								<div class="form-holder">
									<div class="row">
										<form method="POST" method="{{ route('Traveler.Explore') }}">
											{{ csrf_field() }}
											{{--  <div class="col-xs-12 col-sm-12 col-md-3">
												<div class="filter-item bb-sm no-bb-xss">
													<span><label><i class="fa fa-tags"></i> Tags:</label></span>
													<input type="text" value="" name="categories" data-role="tagsinput" id="tags" class="form-control" required>
												</div>
													
											</div>  --}}
											<div class="filter-item col-xs-12 col-sm-12 col-md-3">
												<span><label><i class="fa fa-tags"></i> Tags:</label></span>
												<input type="text" class="form-control" name="categories[]" data-role="tagsinput" required />
											</div>
											<div class="col-xs-12 col-sm-12 col-md-7">
												<div class="filter-item-wrapper">
													<div class="row">
														<div class="col-xss-12 col-xs-6 col-sm-3">
															<div class="filter-item mmr">
																<span><label><i class="fa fa-calendar"></i> Date From:</label></span>
																<input type="date" name="date_search" class="form-control" required>
															</div>
																
														</div>

														<div class="col-xss-12 col-xs-6 col-sm-4">
															<div class="filter-item mmr">
																<span><label><i class="fa fa-map-marker"></i> Destination:</label></span>
																<input type="text" name="destination_search" class="form-control"  placeholder="Search package name" required>	
															</div>
															
														</div>
														
														
														<div class="col-xss-12 col-xs-6 col-sm-2">
															<div class="filter-item mmr">
																<br>
																<input type="submit" class="btn btn-default" value="Search">
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
											

										<div class="col-xss-12 col-xs-6 col-sm-2">
											<div class="filter-item mmr">
												<form  method="POST" method="{{ route('Traveler.Explore') }}">
													{{ csrf_field() }}
													<span><label><i class="fa fa-sort-amount-desc"></i> Sort by:</label></span>
													<div class="input-group">
														<select class="selectpicker form-control block-xs" name="sort">
															<option value="rating"> Rating</option>
															<option value="joined"> Joined Tour</option>
															<option value="exclusive"> Exclusive Tour</option>
														</select>
														<span class="input-group-btn">
																<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
														</span>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				<div class="pt-30 pb-50">
				<div class="container">
					
					<div class="trip-guide-wrapper">
					
						@include('layouts.user.alerts')
						
						<div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
							<div class="GridLex-grid-noGutter-equalHeight GridLex-grid">
							@if(count($packages) > 0)
							@foreach($packages as $package)
								<div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
									
								<div class="trip-guide-item bg-light-primary">

										<div class="trip-guide-image">
											<img src="/public/uploads/files/{{ $package->photo }}" style="height: 200px" alt="images" />
										</div>
										
										<div class="trip-guide-content bg-white">
											<h3>{{$package->package_name}}</h3>
											<span id="fave" data-id="{{ $package->package_id }}">
												<button class="fave btn btn-danger btn-sm pull-right">
													{{	Auth::user()->favorites()->where('package_id', $package->package_id)->first() ? 
														Auth::user()->favorites()->where('package_id', $package->package_id)->first()->favorited == 1 ? 
														'Unfavorite' : 'Favorite' : 'Favorite'}}
												</button>
											</span>
											<label>{{ $package->type }} Tour</label>
										</div>

										<div class="trip-guide-bottom">
										
											<div class="trip-guide-person bg-white clearfix">
												<div class="image">
													<img src="/public/uploads/files/{{$package->agent_photo}}" class="img-circle" alt="images" />
												</div>
												<p class="name">By: <a>{{$package->fname}} {{$package->lname}}</a></p>
												<p>Posted on {{ Carbon\Carbon::parse($package->created_at)->toFormattedDateString()}}</p>
			
											</div>
											<div class="trip-guide-meta row gap-10">
												<div class="col-xs-6 col-sm-6">
													<div class="rating-item">
														<input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-readonly value="{{ $package->ratings_average }}"/>
													</div>
												</div>
												<div class="col-xs-6 col-sm-6 text-right">
													<!-- slots here-->
												</div>
											</div>
											<div class="row gap-10">
												<div class="col-xs-12 col-sm-6">
													<div class="trip-guide-price">
														@if($package->days == 1)
															{{$package->days}} Day Tour
														@else
															{{$package->days}} Days 
															@if($night = $package->days - 1 == 1)
																{{$night}} Night 
															@else
																{{$night}} Nights
															@endif
														@endif

													
														@if($package->type == 'Joined')
															<span class="number" style="font-size:18px">PHP {{number_format($package->adult_price, 2)}}</span>
														@else
															<span class="number" style="font-size:18px">PHP {{number_format($package->pax1_price, 2)}}</span>
														@endif
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 text-right">
													<a href="/Traveler/TourPackage/{{$package->package_id}}" class="btn btn-info btn-sm">Details</a>

												</div>
											</div>
											
										</div>
										{{--  <p>tags here</p>  --}}
									</div>
								
								</div>
							@endforeach
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
															{{$packages->links()}}
														</ul>
													</nav>
												</div>
											</div>
												
										</div>
									
								</div>
							@else
								<center><h2>No Packages Yet.</h2></center>
							@endif
		
					</div>

					
				</div>
			</div>

		</div>
		
		<!-- end Main Wrapper -->

	</div>
	
	<!-- end Container Wrapper -->
	<br>
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
				data: { packageId: packageId, _token: token },
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
<script>
	var categories = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('categories'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		
	});
</script>
@endsection

