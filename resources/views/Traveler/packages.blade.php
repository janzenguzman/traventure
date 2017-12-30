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
					<p>Discover and book your unique travel experiences offered by local experts</p>

					<form>
						<div class="form-group">
							<input type="text" placeholder="eg: Cebu, Bohol, Boracay" class="form-control flexdatalist" data-data="data/countries.json" data-search-in='["name","capital"]' data-visible-properties='["capital","name","continent"]' data-group-by="continent" data-selection-required="true" data-focus-first-result="true" data-min-length="1" data-value-property="iso2" data-text-property="{capital}, {name}" data-search-contain="false" name="countries">
							<button class="btn"><i class="icon-magnifier"></i></button>
						</div>
					</form>
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
									
										<div class="col-xs-12 col-sm-12 col-md-6">
										
										
											<div class="filter-item bb-sm no-bb-xss">
											
												<div class="input-group input-group-addon-icon no-border no-br-sm">
													<span class="input-group-addon input-group-addon-icon bg-white"><label><i class="fa fa-map-marker"></i> Tags:</label></span>
													<input type="text" class="form-control" id="autocompleteTagging" value="Beach, Trekking, City" placeholder="" />
												</div>
											
											</div>
											
										</div>

										<div class="col-xs-12 col-sm-12 col-md-6">
										
											<div class="filter-item-wrapper">
											
												<div class="row">
													
													<div class="col-xss-12 col-xs-6 col-sm-5">
											
														<div class="filter-item mmr">
														
															<div class="input-group input-group-addon-icon no-border no-br-xs">
																<span class="input-group-addon input-group-addon-icon bg-white">
																<label class="block-xs"><i class="fa fa-sort-amount-asc"></i> Sort by:</label></span>
																<select class="selectpicker form-control block-xs">
																	<option value="0"> Price</option>
																	<option value="3"> Name</option>
																	<option value="4"> User Rating</option>
																	<option value="7"> Star Rating</option>
																</select>
															</div>
														
														</div>
														
													</div>
											
													<div class="col-xss-12 col-xs-6 col-sm-7">
													
														<div class="filter-item mmr">
														
															<div class="input-group input-group-addon-icon no-border no-br-xs">
																<span class="input-group-addon input-group-addon-icon bg-white"><label><i class="fa fa-sort-amount-asc"></i> Trip Style:</label></span>
																<select class="selectpicker form-control" data-live-search="false" data-selected-text-format="count > 2" data-done-button="true" data-done-button-text="OK" data-none-selected-text="All Types" multiple>
																	<option value="0"> Adventure</option>
																	<option value="1"> Hooneymoon</option>
																	<option value="2"> Shopping</option>
																	<option value="3"> History</option>
																</select>
															</div>
														
														</div>
														
													</div>
												
												</div>
											
											</div>
											
										</div>

									</div>
								
								</div>
								
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
														<label>Input Form</label>
														<input type="text" class="form-control" placeholder="Placeholder">
													</div>
												</div>
												
												<div class="col-xss-12 col-xs-6 col-sm-6">
													<div class="form-group">
														<label>No. of traveller</label>
														<div class="form-group form-spin-group">
															<input type="text" class="form-control form-spin" value="1" /> 
														</div>
													</div>
												</div>
												
												<div class="col-xss-12 col-xs-6 col-sm-6">
													<div class="form-group">
														<label>Select</label>
														<select class="selectpicker show-tick form-control" title="Select placeholder">
															<option value="0">Select Option 1</option>
															<option value="1">Select Option 2</option>
															<option value="2">Select Option 3</option>
															<option value="3">Select Option 4</option>
														</select>
													</div>
												</div>
												
												<div class="col-xss-12 col-xs-6 col-sm-6">
												
													<div class="form-group">
														<label>Select Multiply</label>
														<select id="filter_image_type" class="selectpicker show-tick form-control" title="Select placeholder" data-selected-text-format="count > 3" data-done-button="true" data-done-button-text="OK" multiple>
															<option value="0">Select Option 1</option>
															<option value="1">Select Option 2</option>
															<option value="2">Select Option 3</option>
															<option value="3">Select Option 4</option>
														</select>
													</div>

												</div>
											
											</div>
										
										</div>
										
										<div class="col-xs-12 col-sm-12 col-md-4">
										
											<div class="row">
											
												<div class="col-xss-12 col-xs-6 col-sm-6 col-md-12">
												
													<div class="form-group">
														<label>Range Slider</label>
														<div class="sidebar-module-inner">
															<input id="price_range" />
														</div>
													</div>
													
												</div>
												
												<div class="col-xss-12 col-xs-6 col-sm-6 col-md-12">
												
													<div class="form-group">
														<label>Range Slider</label>
														<div class="sidebar-module-inner">
															<input id="star_range" />
														</div>
													</div>
													
												</div>
												
											</div>
											
										</div>

										<div class="col-xs-12 col-sm-12 mb-10">
										
											<div class="bb mb-20"></div>
											
											<label>Checkbox</label>
											<div class="row checkbox-wrapper">
												<div class="col-xss-12 col-xs-6 col-sm-4 col-md-3">
													<div class="checkbox-block">
														<input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
														<label class="" for="filter_checkbox-1">Checkbox One</label>
													</div>
												</div>
												<div class="col-xss-12 col-xs-6 col-sm-4 col-md-3">
													<div class="checkbox-block">
														<input id="filter_checkbox-2" name="filter_checkbox" type="checkbox" class="checkbox"/>
														<label class="" for="filter_checkbox-2">Checkbox Two</label>
													</div>
												</div>
												<div class="col-xss-12 col-xs-6 col-sm-4 col-md-3">
													<div class="checkbox-block">
														<input id="filter_checkbox-3" name="filter_checkbox" type="checkbox" class="checkbox"/>
														<label class="" for="filter_checkbox-3">Checkbox Three</label>
													</div>
												</div>
												<div class="col-xss-12 col-xs-6 col-sm-4 col-md-3">
													<div class="checkbox-block">
														<input id="filter_checkbox-4" name="filter_checkbox" type="checkbox" class="checkbox"/>
														<label class="" for="filter_checkbox-4">Checkbox Four</label>
													</div>
												</div>
												<div class="col-xss-12 col-xs-6 col-sm-4 col-md-3">
													<div class="checkbox-block">
														<input id="filter_checkbox-5" name="filter_checkbox" type="checkbox" class="checkbox"/>
														<label class="" for="filter_checkbox-5">Checkbox Five</label>
													</div>
												</div>
												<div class="col-xss-12 col-xs-6 col-sm-4 col-md-3">
													<div class="checkbox-block">
														<input id="filter_checkbox-6" name="filter_checkbox" type="checkbox" class="checkbox"/>
														<label class="" for="filter_checkbox-6">Checkbox Six</label>
													</div>
												</div>
												<div class="col-xss-12 col-xs-6 col-sm-4 col-md-3">
													<div class="checkbox-block">
														<input id="filter_checkbox-7" name="filter_checkbox" type="checkbox" class="checkbox"/>
														<label class="" for="filter_checkbox-7">Checkbox Seven</label>
													</div>
												</div>
												<div class="col-xss-12 col-xs-6 col-sm-4 col-md-3">
													<div class="checkbox-block">
														<input id="filter_checkbox-8" name="filter_checkbox" type="checkbox" class="checkbox"/>
														<label class="" for="filter_checkbox-8">Checkbox Eight</label>
													</div>
												</div>
												<div class="col-xss-12 col-xs-6 col-sm-4 col-md-3">
													<div class="checkbox-block">
														<input id="filter_checkbox-9" name="filter_checkbox" type="checkbox" class="checkbox"/>
														<label class="" for="filter_checkbox-9">Checkbox Nine</label>
													</div>
												</div>
											</div>
										</div>

									</div>
									
								</div>
							
							</div>
						
						</div>
						
					</div>

				</form>
				
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
											<img src="{{ asset('images/itinerary/01.jpg') }}" alt="images" />
										</div>
										
										<div class="trip-guide-content bg-white">
											<h3>{{$package->package_name}}</h3>
											<form action="{{ URL::to('Traveler/Explore/AddToFavorite') }}" id="fav" method="post">
													{{ csrf_field() }}
													<input type="hidden" id="traveler_id" name="traveler_id" value="{{ auth()->user()->id }}">
												<input type="hidden" id="package_id" name="package_id" value="{{ $package->package_id }}">
												<input type="submit" class="btn btn-danger btn-sm fav" value="Favorite">
											<form>
										</div>

										<div class="trip-guide-bottom">
										
											<div class="trip-guide-person bg-white clearfix">
												<div class="image">
													<img src="{{ asset('images/testimonial/01.jpg')}}" class="img-circle" alt="images" />
												</div>
												<p class="name">By: <a href="#">Robert Kalvin</a></p>
												<p>Posted on {{($package->created_at)->toFormattedDateString()}}</p>
			
											</div>
											
											<div class="trip-guide-meta row gap-10">
												<div class="col-xs-6 col-sm-6">
													<div class="rating-item">
														<input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
													</div>
												</div>
												<div class="col-xs-6 col-sm-6 text-right">
													5 days 4 nights
												</div>
											</div>
											
											<div class="row gap-10">
												<div class="col-xs-12 col-sm-6">
													<div class="trip-guide-price">
														Starting at
														<span class="number">PHP {{$package->price}}</span>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 text-right">
														<a href="/Traveler/TourPackage/{{$package->package_id}}" class="btn btn-info">Details</a>
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
		
		<!-- start Footer Wrapper -->
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

	</div>
	
	<!-- end Container Wrapper -->
 
 
<!-- start Back To Top -->

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- end Back To Top -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('submit', '#fav', (function(e){
		e.preventDefault();

		var traveler_id = $('input[name=traveler_id]').val();
		var package_id = $('input[name=package_id]').val();

		var url = $(this).attr('action');
        var post = $(this).attr('method');
        $.ajax({
            type: post,
            url: url,
            data: { traveler_id, package_id},
            dataType: 'json',
            success: function(data){
                console.log(data);
                 console.log(data);
            }
        });
    }));
</script>
@endsection
@extends('layouts.user.javascriptlayout')