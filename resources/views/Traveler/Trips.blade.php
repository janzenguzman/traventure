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
		
			<!-- start breadcrumb -->
			
			<div class="breadcrumb-image-bg" style="background-image:url({{ asset('images/breadcrumb-bg.jpg') }});">
				<div class="container">
                                                                                           
					<div class="page-title">
					
						<div class="row">
						
							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
								<h2>Trips</h2>
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
									<div class="col-lg-6">
										<div class="input-group">
											<input type="text" name="search_pname" class="form-control"  placeholder="Search package name" >
											<span class="input-group-btn">
												<button class="btn btn-default" type="submit">Search</button>
											</span>
										</div><br>
									</div>
							</form>
							<div class="col-lg-1" style="margin-right:3.5%">
								<form>
									<a href="{{ route('Traveler.Trips') }}" class="btn btn-sm btn-info">All Trips</a>
								</form>
							</div>
							@if(count($trips) > 0)
								@foreach($trips as $trip)
									@if($trip->expired == 1)
										
										<div class="trip-list-wrapper col-lg-12">
										
											<div class="trip-list-item">
												<div class="image-absolute">
													<div class="image image-object-fit image-object-fit-cover">
														<img src="{{ asset('images/trip/01.jpg')}}" alt="image" >
													</div>
												</div>
												<div class="content">
												
													<div class="GridLex-gap-20 mb-5">
								
														<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
														
															<div class="GridLex-col-6_sm-12_xs-12_xss-12">
																
																<div class="GridLex-inner">
																	<h6>{{$trip->package_name}}</h6>
																	<span class="font14">Travel Date: {{ Carbon\Carbon::parse($trip->date_from)->toFormattedDateString() }}-
																		{{ Carbon\Carbon::parse($trip->date_to)->toFormattedDateString() }}</span>
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
																	{{--  <form method="post" action="{{ route('Traveler.Voucher', $trip->booking_id)}}">
																		{{ csrf_field() }}
																		<input type="hidden" name="package_id" value="{{ $trip->package_id }}">
																		<input type="submit" class="btn btn-info btn-sm" value="View">
																	</form>  --}}
																	<a href="/Traveler/Trips/{{$trip->package_id}}/{{$trip->booking_id}}" class="btn btn-info btn-sm">View</a>
																</div>
															</div>  
															
														</div>
														
													</div>
													
												</div>
											</div>
										
										</div>
									@endif
								@endforeach
								
								<div class="pager-wrappper text-left clearfix bt mt-0 pt-20 col-lg-12">
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
							<h2>No records found.</h2>
							@endif
							
						</div>
					</div>

				</div>
			
			</div>

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
		
		<!-- end Main Wrapper -->
	</div>
	
	<!-- end Container Wrapper -->
 
 
<!-- start Back To Top -->

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- end Back To Top -->
</div>
<!-- end Forget Password Modal -->
@endsection
@extends('layouts.user.javascriptlayout')