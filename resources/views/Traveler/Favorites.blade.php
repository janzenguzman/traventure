@extends('layouts.user.headlayout')
@section('content')
<body class="transparent-header">
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
									<h2>Favorites</h2>
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
							<li><a href="{{ route('Traveler.Explore') }}">Explore</a></li>
							<li class="active">Favorites</li>
						</ol>
					</div>
				</div>

				<div class="filter-full-width-wrapper">
					<div class="favorite-search">
						<div class="container">
							<div class="filter-full-primary-inner">
								<div class="form-holder">
									<div class="row">
										<div>
											<div class="col-lg-8 col-md-5 col-xs-5">
												<form method="post" action="{{ route('Traveler.MyFavorites')}}">
														{{ csrf_field() }}
													<div class="input-group">
														<input type="text" name="search_pname" class="form-control"  placeholder="Search package name" required>
															<span class="input-group-btn">
																<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
															</span>
													</div>
												</form>
											</div>

											<div class="col-lg-1" style="margin-right:3.5%">
												<form>
													<a href="{{ route('Traveler.MyFavorites') }}" class="btn btn-sm btn-default">Show All</a>
												</form>
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
		
										@if(count($favorites) > 0)
											@foreach($favorites as $favorite)
												<div id="fave{{$favorite->favorite_id}}" class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
													<div class="trip-guide-item bg-light-primary">

														<div class="trip-guide-image">
															<img src="/public/uploads/files/{{ $favorite->photo }}" alt="images" />
														</div>
														
														<div class="trip-guide-content bg-white">
															<h3>{{$favorite->package_name}}</h3>
															<span id="fav" class="pull-right">
																<button class="btn btn-danger btn-sm del" value="{{$favorite->favorite_id}}">Unfavorite</button>
															</span>
															<label>{{ $favorite->type }} Tour</label>
														</div>
				
														<div class="trip-guide-bottom">
															<div class="trip-guide-person bg-white clearfix">
																<div class="image">
																	<img src="/public/uploads/files/{{ $favorite->agent_photo }}" class="img-circle" alt="images" />
																</div>
																<p class="name">By: <a>{{$favorite->fname}} {{$favorite->lname}}</a></p>
																<p>Posted on {{ Carbon\Carbon::parse($favorite->created_at)->toFormattedDateString()}}</p>
															</div>
															
															<div class="trip-guide-meta row gap-10">
																<div class="col-xs-6 col-sm-6">
																	<div class="rating-item">
																		<input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-readonly value="{{ $avg }}"/>
																	</div>
																</div>
															</div>
															
															<div class="row gap-10">
																<div class="col-xs-12 col-sm-6">
																	<div class="trip-guide-price">
																		@if($favorite->days == 1)
																			{{$favorite->days}} Day Tour
																		@else
																			{{$favorite->days}} Days
																		@endif
				
																		@if(($nights = $favorite->days - 1) != 0)
																			@if($nights <= 1)
																				{{$nights}} Night 
																			@else
																				{{$nights}} Nights
																			@endif
																		@endif
				
																		@if($favorite->type == 'Joined')
																			<span class="number" style="font-size:18px">PHP {{number_format($favorite->adult_price,2)}}</span>
																		@else
																			<span class="number" style="font-size:18px">PHP {{number_format($favorite->pax1_price,2)}}</span>
																		@endif
																	</div>
																</div>
																<div class="col-xs-12 col-sm-6 text-right">
																	<a href="/Traveler/TourPackage/{{$favorite->package_id}}" class="btn btn-info btn-sm">Details</a>
																</div>
															</div>
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
																{{$favorites->links()}}
															</ul>
														</nav>
													</div>
												</div>
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
</div>
<script>
	var token = '{{ Session::token() }}';
	var urlUnFave = '{{ route('Traveler.unFavorite') }}';
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
		$(".del").on('click', function(){
			var deleteFave = $(this).val();
			console.log(deleteFave);
			var $t = $(this);
			$.ajax({
				type: 'POST',
				url: urlUnFave,
				data: { deleteFave: deleteFave, token: token },
				success: function(data){
					console.log(data,'Success na gud!');
					$('#fave'+ deleteFave).hide();
					$('#NoFavorited').show(); 
				},
				error: function (data) {
					console.log("ERROR!!! ERROR:", data);
				}
			})
		});
	}(jQuery));
</script>
@endsection
