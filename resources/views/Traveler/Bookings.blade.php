@extends('layouts.user.headlayout')

@section('content')
{{--  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1 style="text-align:center;">Bookings</h1></div>
                @if(count($bookings) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Booking ID</th>
                            <th>Package Name</th>
                            <th>Package ID</th>
                            <th>Client</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Expired</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($bookings as $booking)
                            @if($booking->expired == 0)
                                <tr>
                                    <td>{{$booking->booking_id}}</td>
                                    <td>{{$booking->package_name}}</td>
                                    <td>{{$booking->package_id}}</td>
                                    <td>{{$booking->client_fname}} {{$booking->client_lname}}</td>
                                    @if($booking->status == 0)
                                        <td>Pending</td>
                                    @else
                                        <td>Accepted</td>
                                    @endif
                                    <td>{{$booking->date_from = Carbon\Carbon::parse($booking->date_from)->toFormattedDateString()}} - {{$booking->date_to = Carbon\Carbon::parse($booking->date_to)->toFormattedDateString()}}</td>
                                    {{--  <td>Not Expired</td> 
                                    @if($booking->expired == 0)
                                        <td>Not Expired</td>
                                    @else
                                        <td>Expired</td>
                                    @endif
                                    <td>
                                        {!!Form::open(['action' => ['TravelersController@destroyBookings', $booking->booking_id], 'method' => 'POST'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Cancel Booking', ['class' => "btn btn-danger"])}}
                                        {!!Form::close()!!}
                                        <a href="/Traveler/TourPackage/{{$booking->package_id}}/ContactNow">Contact Now</a><br>
                                    </td>
                                    <td>
                                        <span id="fave" data-id="{{ $booking->package_id }}">
                                            <button href="#" class="fave btn btn-danger">
                                                {{	Auth::user()->favorites()->where('package_id', $booking->package_id)->first() ? 
                                                    Auth::user()->favorites()->where('package_id', $booking->package_id)->first()->favorited == 1 ? 
                                                    'Unfavorited' : 'Favorite' : 'Favorite'}}
                                            </button>
                                            {{--  <i class="fa fa-heart-o"></i> --}}
                                            {{--  <a href="#" class="fave">Unfavorite</a>  --}}
                                            {{--  <i class="fa fa-heart"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endif  
                        @endforeach
                    </table>
                    {{--  <hr>{{$bookings->links()}}
                @else
                    <p>You have no Bookings yet!!!!!</p>
                @endif  --}}

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
								<h2>Bookings</h2>
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
						<li class="active">Bookings</li>
					</ol>
				</div>
				</div>
			</div>

            <div class="pt-30 pb-50">
			
				<div class="container">

					<div class="row">
						@include('layouts.user.alerts')	
							<form method="post" action="{{ route('Traveler.Bookings')}}">
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
									<a href="{{ route('Traveler.Bookings') }}" class="btn btn-sm btn-info">All Bookings</a>
								</form>
							</div>
							<div class="col-lg-1">
								<form method="post" action="{{ route('Traveler.Bookings')}}">
									{{ csrf_field() }}	
									<input type="hidden" name="accepted" class="form-control" value="Accepted">
									<button type="submit" class="btn btn-sm btn-success">Booked</button>
								</form>
							</div>
							<div class="col-lg-1">
								<form method="post" action="{{ route('Traveler.Bookings')}}">
									{{ csrf_field() }}	
									<input type="hidden" name="requested" class="form-control" value="Confirmed">
									<button type="submit" class="btn btn-sm btn-warning">Requested</button>
								<form>
							</div>
                            @if(count($bookings) > 0)
								@foreach($bookings as $booking)
									@if($booking->expired == 0)
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
																	<h6>{{$booking->package_name}}</h6>
																	@if($booking->status== 'Confirmed')
																		<span class="label label-warning">Requested</span>
																	@elseif($booking->status=='Accepted')
																		<span class="label label-success">Booked</span>
																	@endif
																	<span class="font-italic font14">5 days 4 nights</span>
																</div>
																
															</div>
															
															<div class="GridLex-col-3_sm-6_xs-7_xss-12">
																<div class="GridLex-inner line-1 font14 text-muted spacing-1">
																	Travel date
																	<span class="block text-primary font16 font700 mt-1">
																		{{ Carbon\Carbon::parse($booking->date_from)->toFormattedDateString() }}-
																		{{ Carbon\Carbon::parse($booking->date_to)->toFormattedDateString() }}</span>
																</div>
																
															</div>
															
															<div class="GridLex-col-3_sm-6_xs-5_xss-12">
																<div class="GridLex-inner text-right text-left-xss dropdown">
																		{{--  <a href="/Traveler/Bookings/{{$booking->booking_id}}" class="btn btn-info btn-sm">View</a>  --}}
																		<a href="/Traveler/Bookings/{{$booking->package_id}}/{{$booking->booking_id}}" class="btn btn-info btn-sm">View</a>
																	@if($booking->status == 'Confirmed')
																		<a href="/Traveler/Bookings/Cancel/{{$booking->booking_id}}" class="btn btn-danger btn-sm">Cancel</a>
																	@endif
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
														{{$bookings->links()}}
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
>>>>>>> develop
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
    //console.log("HELLO WORLD");
        $(".fave").on('click', function(event){
            event.preventDefault();
            packageId = event.target.parentNode.dataset['id'];
            console.log(packageId);
            var $t = $(this);
            $.ajax({
                method: 'POST',
                url: urlFave,
                data: { packageId: packageId, token: token },
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
