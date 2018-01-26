{{--  @extends('layouts.app')

@section('content')
<div class="container-fluid text-center">
    <div class="panel panel-default">
        <div class="panel-heading"><h1>My Favorites</h1></div>
        @if(count($favorites) > 0)
            <table class="table table-striped">
                <tr>
                    <th>Favorite ID</th>
                    <th>Package ID</th>
                    <th>Package Name</th>
                    <th>Information</th>
                    <th></th>
                </tr>
                @foreach($favorites as $favorite)
                    <tr id="fave{{$favorite->favorite_id}}">
                        <td>{{$favorite->favorite_id}}</td>
                        <td>{{$favorite->package_id}}</td>
                        <td>{{$favorite->package_name}}</td>
                        <td style="text-align:left;">
                            Pax: {{$favorite->pax}} <br>
                            Php {{number_format($favorite->price, 2)}} <br>
                            Services: {{$favorite->services}}
                        </td>
                        <td>
                            <button class="btn btn-danger del" value="{{$favorite->favorite_id}}">Unfavorite</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="panel-body">
                <p>You have no favorite packages yet.</p>
            </div>
        @endif
        {{$favorites->links()}}
    </div>
</div>  --}}

@extends('layouts.user.headlayout')
@section('content')
<div class="container-wrapper">

		<!-- start Header -->
		
		<header id="header">

			@extends('layouts.traveler-navbar')

		</header>
		
		<!-- end Header -->

		<!-- start Main Wrapper -->
		
		<div class="main-wrapper scrollspy-container">
		
			<!-- start Breadcrumb -->
			
			<div class="breadcrumb-image-bg" style="background-image:url({{asset('images/hero-header/osmenapeak.jpg')}});">
				<div class="container">
                                                                                           
					<div class="page-title">
					
						<div class="row">
						
							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
								<h2>Favorites</h2>
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
						<li class="active">Favorites</li>
					</ol>
				</div>
			</div>
			<!-- end Breadcrumb -->

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
													<div class="col-xs-6 col-sm-6 text-right">
														<!-- slots here-->
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
																<span class="number">PHP {{$favorite->adult_price}}</span>
															@else
																<span class="number">PHP {{$favorite->pax1_price}}</span>
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
							<center><h2 id="NoFavorited">No Records Found.</h2></center>
						@endif
	
					</div>
				
				</div>
		</div>
		
		<!-- end Main Wrapper -->
	</div>
	<!-- start Footer Wrapper -->
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

	<!-- end Container Wrapper -->
 
<!-- start Back To Top -->

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- end Back To Top -->
<script>
	var token = '{{ Session::token() }}';
	var urlUnFave = '{{ route('Traveler.unFavorite') }}';
</script>	
</div>
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
		console.log("HELLO WORLD");
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
				.done(function(){
					//alert("DONE");
				});
		});
	}(jQuery));
</script>
@endsection
