@extends('layouts.user.headlayout')

@section('content')
<body class="transparent-header">
	<div id="introLoader" class="introLoading"></div>
	<div class="container-wrapper">
		<header id="header">
			@extends('layouts.agent-navbar')
		</header>
		
		<div class="main-wrapper scrollspy-container">
			<div class="breadcrumb-image-bg" style="background-image:url({{asset('/uploads/files/osmena.jpg')}});">
				<div class="container">												   
					<div class="page-title">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"><br><br>
								<h2>Packages</h2><br>
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
						<li class="active">Packages</li>
					</ol>
				</div>
			</div>

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
												<span><label><i class="fa fa-map-marker"></i> Destination:</label></span>
												<input type="text" name="pname_search" class="form-control"  placeholder="Search package name">
											</div>
										</div>

										<div class="col-xs-12 col-sm-12 col-md-6">
											<div class="filter-item-wrapper">
												<div class="row">
													<div class="col-xss-12 col-xs-6 col-sm-12 col-md-5">
														<div class="filter-item mmr">
															<br>
															<input type = "submit" class="btn btn-default" value="Search">
														</div>
													</div>
												</div>
											</div>
										</div>
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
			@include('layouts.user.alerts')
		<a href="/Agent/Packages/CreatePackage" class="btn btn-success" role="button">
			<i class="ti-plus"></i> Create a Tour Package</a>
		</div>
	</div>
				
	<div>
		<div class="container">
			<div class="trip-guide-wrapper">
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
										<h5>No. of Bookings<span class="pull-right">{{$package->count_bookings}}</span></h5>
										<div class="progress">
											<div class="progress-bar progress-bar-info" aria-valuenow="{{$package->count_bookings}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$package->count_bookings}}%" role="progressbar"></div>
										</div>
									</div>

									<div class="trip-guide-bottom">
										<div class="trip-guide-person bg-white clearfix">
											<label>{{ $package->type }} Tour</label>
											<label class="text-muted">Posted on {{ Carbon\Carbon::parse($package->created_at)->toFormattedDateString()}}</label>
										</div>

										<div class="trip-guide-meta row gap-10">
											<div class="col-xs-6 col-sm-6">
												<div class="rating-item">
													<input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-readonly value="{{ $package->ratings_average}}"/>
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 text-right">
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
											</div>
											</div>

											<div class="row gap-10">
												<div class="col-xs-12 col-sm-6">
													<div class="trip-guide-price">
														@if($package->type == 'Joined')
														<span class="number" style="font-size:18px">PHP {{number_format($package->adult_price, 2)}}</span>
														@else
															<span class="number" style="font-size:18px">PHP {{number_format($package->pax1_price, 2)}}</span>
														@endif <br>
													</div>
												</div>
											</div>
											<div class="row gap-10">
												<div class="col-xs-12 col-sm-4 col-md-4">
													<a data-toggle="modal"
														data-id="{{ $package->package_id }} " 
														class="btn btn btn-danger btn-sm"
														id="deleteButton" type="submit">Delete</a>
												</div>
												<div class="col-xs-12 col-sm-4 col-md-4">
													<a href="/Agent/Packages/AddSlots/{{ $package->package_id }}" class="btn btn-color-03 btn-sm">
														<i class="fa fa-plus"></i> Slots
													</a>
												</div>
												<div class="col-xs-12 col-sm-4 col-md-4">
													<a href="/Agent/Packages/PackageDetails/{{ $package->package_id }}" class="btn btn btn-info btn-sm">
														Details
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
						@endforeach
							</div> 
					</div>
					@else
						<center><h2>No Packages Yet.</h2></center>
					@endif

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

<!-- delete package-->
<div id="deleteModal" role="dialog" class="modal fade login-box-wrapper">
	<!-- Modal content-->
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>
	<form method="POST" action = "{{ route('Agent.DeletePackage')}}">
		{{ csrf_field() }}
		<div class="modal-body" style="padding:5%; margin-top:2%">
			<h4 class="center">Are you sure you want to delete this tour package?</h4>
			<input type="hidden" name="package_id" class="text-primary" id="package_id">
		</div>
		<div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn btn-success">Close</button>
			<button type="submit" class="btn btn-danger">Delete</button>
		</div>
	</form>
</div>
<!-- end of delete package -->

<script>
	$(document).on("click",'#deleteButton',(function(){
		$('#package_id').val($(this).data('id'));
		$('#deleteModal').modal('show');
	})); 
</script>	

@endsection
@extends('layouts.user.javascriptlayout')