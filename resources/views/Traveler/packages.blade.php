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
					
					<div class="filter-full-primary">
					
						<div class="container">
					
							<div class="filter-full-primary-inner">
							
								<div class="form-holder">
								
									<div class="row">
									<form method="POST" method="{{ route('Traveler.Explore') }}">
										{{ csrf_field() }}
										<div class="col-xs-12 col-sm-12 col-md-6">
										
											<div class="filter-item bb-sm no-bb-xss">
											
												<div class="input-group input-group-addon-icon no-border no-br-sm">
													<span class="input-group-addon input-group-addon-icon bg-white"><label><i class="fa fa-map-marker"></i> Destination:</label></span>
													<input type="text" name="destination_search" class="form-control" required/>
												</div>
											
											</div>
											
										</div>

										<div class="col-xs-12 col-sm-12 col-md-6">
										
											<div class="filter-item-wrapper">
											
												<div class="row">
													
													<div class="col-xss-12 col-xs-6 col-sm-5">
											
														<div class="filter-item mmr">
														
															<div class="input-group input-group-addon-icon no-border no-br-xs">
																<span class="input-group-addon input-group-addon-icon bg-white"><label><i class="fa fa-calendar"></i> Date From:</label></span>
																<input type="date" name="date_search" class="form-control" required/>
															</div>
														</div>
													</div>
												</div>
											
											</div>
											
										</div>

									</div>
								</div>
									<div>
										<br><input type="submit" class="btn btn-info btn-wide btn-sm col-md-6 col-sm-6 col-xxs-6" value="Search" >
									</div>
								</form>
								
								<div class="btn-holder">
									<span class="btn btn-toggle btn-refine collapsed" data-toggle="collapse" data-target="#refine-result">Advance Filter</span>
								</div>
							
							</div>

						</div>

					</div>
					
					<div class="filter-full-secondary">
						
						<div id="refine-result" class="collapse">
						
							<div class="container"> 
						
								<div class="collapse-inner clearfix">
								
									<div class="row">
									
										<div class="col-xs-12 col-sm-12 col-md-8">
										
											<div class="row">
												
												<div class="col-xss-12 col-xs-6 col-sm-6">
													<div class="form-group">
														<label>Category:</label>
														<select class="selectpicker show-tick form-control" title="Select placeholder">
															<option value="0">Beach</option>
															<option value="1">Mountain Adventure</option>
															<option value="2">Waterfalls Adventure</option>
															<option value="3">City Tour</option>
														</select>
													</div>
												</div>
												
												<div class="col-xss-12 col-xs-6 col-sm-6">
												
													<div class="form-group">
														<label>Sort By:</label>
														<select class="selectpicker show-tick form-control" title="Select placeholder">
															<option value="0">Price</option>
															<option value="1">Rating</option>
														</select>
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
					
					<div class="trip-guide-wrapper">
					
						@include('layouts.user.alerts')
						
						<div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
							<div class="GridLex-grid-noGutter-equalHeight GridLex-grid">

							@if(count($packages) > 0)
							@foreach($packages as $package)
							<div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
									
								<div class="trip-guide-item bg-light-primary">

									<div class="trip-guide-image">
										<img src="/public/uploads/files/{{ $package->photo }}" alt="images" />{{--style="height:180px;"--}}
									</div>
									
									<div class="trip-guide-content bg-white">
										<h3>{{$package->package_name}}</h3>
										<label>{{ $package->type }} Tour</label>
										<span id="fave" data-id="{{ $package->package_id }}">
											<button href="#" class="fave btn btn-danger btn-sm pull-right">
												{{	Auth::user()->favorites()->where('package_id', $package->package_id)->first() ? 
													Auth::user()->favorites()->where('package_id', $package->package_id)->first()->favorited == 1 ? 
													'Unfavorited' : 'Favorite' : 'Favorite'}}
											</button>
										</span>
									</div>

									<div class="trip-guide-bottom">
									
										<div class="trip-guide-person bg-white clearfix">
											<div class="image">
												<img src="/public/uploads/files/{{ $package->agentPhoto }}" class="img-circle" alt="images" />
											</div>
											<p class="name">By: <a>{{$package->fname}} {{$package->lname}}</a></p>
											<p>Posted on {{ Carbon\Carbon::parse($package->created_at)->toFormattedDateString()}}</p>
		
										</div>
										<div class="trip-guide-meta row gap-10">
											<div class="col-xs-6 col-sm-6">
												<div class="rating-item">
													<input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-readonly value=""/>
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 text-right">
												<!-- slots here-->
											</div>
										</div>
										<div class="row gap-10">
											<div class="col-xs-12 col-sm-7">
												<div class="trip-guide-price">
													@if($package->days == 1)
														{{$package->days}} Day Tour
													@else
														{{$package->days}} Days
													@endif

													@if(($nights = $package->days - 1) != 0)
														@if($nights <= 1)
															{{$nights}} Night 
														@else
															{{$nights}} Nights
														@endif
													@endif

													@if($package->type == 'Joined')
														<span class="number">PHP {{number_format($package->adult_price,2)}}</span>
													@else
														<span class="number">PHP {{number_format($package->pax1_price,2)}}</span>
													@endif

													
												</div>
											</div>
											<div class="col-xs-12 col-sm-5 text-right">
												<a href="/Traveler/TourPackage/{{$package->package_id}}" class="btn btn-info btn-sm">Details</a>
											</div>
											
										</div>
										{{--  <p>tags here</p>  --}}
									</div>
								
								</div>
							
							</div>
							@endforeach
									
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
						
					</div>

					@else
						<center><h2>No Packages Yet.</h2></center>
					@endif

				</div>
			
			</div>

		</div>
		
		<!-- end Main Wrapper -->

	</div>
	
	<!-- end Container Wrapper -->
	<br>
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
@endsection
