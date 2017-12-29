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
						<div class="col-xs-12 col-sm-12 col-md-12 mt-20">
                        

                            <form>
                                <div class="input-group stylish-input-group col-lg-6">
                                    <input type="text" class="form-control"  placeholder="Search" >
                                        <span class="input-group-addon">
                                            <button type="submit">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>  
                                        </span>
                                </div>
                            </form>
							<div class="trip-list-wrapper no-bb-last col-lg-12">
							
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
														<h6></h6>
														<span class="font-italic font14">5 days 4 nights</span>
													</div>
													
												</div>
												
												<div class="GridLex-col-3_sm-6_xs-7_xss-12">
													<div class="GridLex-inner line-1 font14 text-muted spacing-1">
														Travel date
														<span class="block text-primary font16 font700 mt-1">24th-30th, Mar 2017</span>
													</div>
												</div>
												
												<div class="GridLex-col-3_sm-6_xs-5_xss-12">
													<div class="GridLex-inner text-right text-left-xss dropdown">
														<a href="#" class="btn btn-primary btn-sm">View</a>
														<button class="btn btn-info btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Share</button>
														<ul class="dropdown-menu">
															<li><a href="#">Facebook</a></li>
															<li><a href="#">Twitter</a></li>
															<li><a href="#">Google Plus</a></li>
														</ul>
													</div>
												</div>
												
											</div>
											
										</div>
										
									</div>
								</div>
							
							</div>
                                {{--  <h2>You have no Bookings yet!!!!!</h2>  --}}
							
							<div class="pager-wrappper text-left clearfix bt mt-0 pt-20 col-lg-12"
		
								<div class="pager-innner">

										<div class="clearfix">
											Showing reslut 1 to 15 from 248 
										</div>
										
										<div class="clearfix">
											<nav>
												<ul class="pagination">
													<li>
														<a href="#" aria-label="Previous">
															<span aria-hidden="true">&laquo;</span>
														</a>
													</li>
													<li class="active"><a href="#">1</a></li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><span>...</span></li>
													<li><a href="#">11</a></li>
													<li><a href="#">12</a></li>
													<li><a href="#">13</a></li>
													<li>
														<a href="#" aria-label="Next">
															<span aria-hidden="true">&raquo;</span>
														</a>
													</li>
												</ul>
											</nav>
										</div>
									
								</div>
							
							</div>
							
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
{{--  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1 style="text-align:center;">Trips</h1></div>
                @if(count($trips) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Trip ID</th>
                            <th>Package ID</th>
                            <th>Booking ID</th>
                            <th>Package Name</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        @foreach($trips as $trip)
                            @if($trip->expired == 1)
                                <tr>
                                    <td>{{$trip->trip_id}}</td>
                                    <td>{{$trip->package_id}}</td>
                                    <td>{{$trip->booking_id}}</td>
                                    <td>{{$trip->package_name}}</td>
                                    <td>{{$trip->client_fname}} {{$trip->client_lname}}</td>
                                    <td>
                                        {{$trip->date_from = Carbon\Carbon::parse($trip->date_from)->toFormattedDateString()}} - 
                                        {{$trip->date_to = Carbon\Carbon::parse($trip->date_to)->toFormattedDateString()}}
                                    </td>
                                    <td>Expired</td>
                                    <td></td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                @else
                    <p>You have no Trips yet!</p>
                @endif
			</div>
        </div>
    </div>
</div>
@endsection  --}}