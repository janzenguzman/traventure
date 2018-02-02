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
							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"><br><br>
								<h2>Trips</h2><br>
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
						<li class="active">Trips</li>
					</ol>
				</div>
			</div>

            <div class="pt-30 pb-50">
				<div class="container">
					<div class="row">
						@include('layouts.user.alerts')	
							<form method="post" action="{{ route('Traveler.Trips')}}">
								{{ csrf_field() }}	
								<div class="row">
									<div class="col-lg-6 col-md-5 col-xs-5">
										<div class="input-group">
											<input type="text" name="search_pname" class="form-control"  placeholder="Search package name" required>
											<span class="input-group-btn">
												<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
											</span>
										</div><br>
									</div>
							</form>
							<div class="col-lg-1" style="margin-right:3.5%">
								<form>
									<a href="{{ route('Traveler.Trips') }}" class="btn btn-sm btn-default">Show All</a>
								</form>
							</div>
							@if(count($trips) > 0)
								@foreach($trips as $trip)
									@if($trip->expired == 1)
										<div class="col-lg-12">
											<div class="trip-list-wrapper">
											
												<div class="trip-list-item">
													<div class="image-absolute">
														<div class="image image-object-fit image-object-fit-cover">
															<img src="/public/uploads/files/{{ $trip->photo }}" alt="image" >
														</div>
													</div>

													<div class="content">
														<div class="GridLex-gap-20 mb-5">
															<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
																<div class="GridLex-col-6_sm-12_xs-12_xss-12">
																	<div class="GridLex-inner">
																		<h6>{{$trip->package_name}}</h6>
																		<span class="font14">Travel Date: 
																			@if($trip->date_to == NULL)
																				{{ Carbon\Carbon::parse($trip->date_from)->toFormattedDateString() }}
																			@else
																				{{ Carbon\Carbon::parse($trip->date_from)->toFormattedDateString() }} -
																				{{ Carbon\Carbon::parse($trip->date_to)->toFormattedDateString() }} 
																			@endif
																		</span>
																	</div>
																</div>
																
																<div class="GridLex-col-3_sm-6_xs-7_xss-12">
																	<div class="GridLex-inner line-1 font14 text-muted spacing-1">
																		Booking Number:
																		<span class="block text-primary font16 font700 mt-1">
																			{{ $trip->booking_id }}</span>
																	</div>
																</div>

																<div class="GridLex-col-3_sm-6_xs-5_xss-12">
																	<div class="GridLex-inner text-right text-left-xss dropdown">
																		<a href="/Traveler/Trips/{{$trip->package_id}}/{{$trip->booking_id}}" class="btn btn-info btn-sm">View</a>
																	</div>
																</div>  
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									@endif
								@endforeach
								
								<div class="pager-wrappper text-left clearfix col-lg-12">
									<div class="pager-innner">
										<div class="clearfix">
											<nav>
												<ul class="pagination">
													{{$trips->links()}}
												</ul>
											</nav>
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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });
</script>
<script type="text/javascript">
    (function($) {
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
                    }else{
                        $t.text('Favorite');
                    }
                },
                error: function (jqXHR, exception) {
                    alert("ERROR ERROR");
                }
            })
        });
    }(jQuery));
</script>
@endsection
