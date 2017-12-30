@extends('layouts.user.headlayout')

@section('content')
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
    
                <div class="multiple-sticky hidden-sm hidden-xs">
                                            
                    <div class="multiple-sticky-inner">
                    
                        <div class="multiple-sticky-container container">
                        
                            <div class="multiple-sticky-item clearfix">
                                    
                                <ul id="multiple-sticky-menu" class="multiple-sticky-menu clearfix">
                                    <li>
                                        <a href="#detail-content-sticky-nav-01">Booking Details</a>
                                    </li>
                                    <li>
                                        <a href="#detail-content-sticky-nav-03">Itinerary</a>
                                    </li>
                                    <li>
                                        <a href="#detail-content-sticky-nav-04">Condition &amp; Faq</a>
                                    </li>
                                    <li>
                                        <a href="#detail-content-sticky-nav-05">Review</a>
                                    </li>
                                </ul>
    
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                <div class="pt-30 pb-50">
                
                    <div class="container">
    
                        <div class="row">
                        
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                    <div class="content-wrapper">
                                    
                                    <div class="user-long-sm-item clearfix">
                        
                                        <div class="image">
                                            <img src="http://traventure.dev/images/man/01.jpg" alt="Images" />
                                        </div>
                                        
                                        <div class="content">
                                            <span class="labeling">Offered by: </span>
                                        @foreach($bookings as $booking)
                                            <h4>Ange Ermolova</h4>
                                            @if($booking->status == 'Confirmed')
                                                <span class="label label-warning">Requested</span>
                                            @else
                                                <span class="label label-success">Accepted</span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                        
                                    <div id="detail-content-sticky-nav-01">
                                        <br>
                                        <h4 class="section-title">Booking Information</h4>
                                        
                                        <ul class="book-sum-list mt-30">
                                            <li><span class="font600">Booking Number: </span>{{ $booking->booking_id }}</li>
                                            <li><span class="font600">Client Name: </span>{{ $booking->client_fname }} {{ $booking->client_lname }}</li>
                                            <li><span class="font600">Phone Number: </span> {{ $booking->contact_num }} </li>
                                            <li><span class="font600">Package Name: </span>{{ $booking->package_name }}</li>
                                            <li><span class="font600">Starting Date: </span> {{ Carbon\Carbon::parse($booking->date_from)->toFormattedDateString() }}</li>
                                            <li><span class="font600">End Date: </span>{{ Carbon\Carbon::parse($booking->date_to)->toFormattedDateString() }}</li>
                                        </ul>
                                    
                                        <div class="mb-40"></div>
                                        
                                        <h4 class="section-title">Payment</h4>
                                        <p>No depending be convinced in unfeeling he. Excellence she unaffected and too sentiments her. Rooms he doors there ye aware in by shall. Education remainder in so cordially. His remainder and own dejection daughters sportsmen. Is easy took he shed to kind.</p>
    
                                        <p>It as announcing it me stimulated frequently continuing. Least their she you now above going stand forth. He pretty future afraid should genius spirit on. Set property addition building put likewise get. Of will at sell well at as. Too want but tall nay like old. Removing yourself be in answered he. Consider occasion get improved him she eat. Letter by lively oh denote an.</p>
                                        
                                        
                                        
                                        <div class="mb-40"></div>
                                        
                                        <h4 class="section-title">Need Booking Help?</h4>
                                        <p>As distrusts behaviour abilities defective uncommonly.</p>
                                        
                                        <ul class="list-with-icon list-inline-block">
                                            <li><i class="ri-microphone text-primary"></i> <strong>Hotline:</strong> +1900 12 213 21</li>
                                            <li><i class="ri ri-envelope text-primary"></i> <strong>Email:</strong> support@tourpacker.com</li>
                                            <li><i class="ri ri-comments-bubble text-primary"></i> <strong>Livechat:</strong> tourpacker (Skype)</li>
                                        </ul>
                                        
                                        <div class="mb-40"></div>
                                        
                                        <div class="mb-25"></div>
                                        <div class="bb"></div>
                                        <div class="mb-25"></div>
                                        
                                        <div class="featured-icon-simple-wrapper">
                        
                                            
                                        </div>
                                        
                                        <div class="row">
                            
                                            <div class="col-xs-12 col-sm-8 col-md-7">
                                            
                                                <div class="featured-list-in-box">
                                        
                                                    <h4 class="uppercase spacing-1">Trip Detail</h4>
                                                    
                                                    <ul class="clearfix">
                                                        <li class="row gap-20">
                                                            <div class="col-xs-12 col-sm-7">
                                                            Meeting point (where we meet?)
                                                            </div>
                                                            <div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
                                                                <i class="ti-location-pin mr-5"></i> Bangkok in't airport
                                                            </div>
                                                        </li>
                                                        <li class="row gap-20">
                                                            <div class="col-xs-12 col-sm-7">
                                                            Meeting time (what time we meet?)
                                                            </div>
                                                            <div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
                                                                <i class="ti-timer mr-5"></i> 09:00 am
                                                            </div>
                                                        </li>
                                                        <li class="row gap-20">
                                                            <div class="col-xs-12 col-sm-7">
                                                            Maximum traellers
                                                            </div>
                                                            <div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
                                                                <i class="ti-user mr-5"></i> 23
                                                            </div>
                                                        </li>
                                                        <li class="row gap-20">
                                                            <div class="col-xs-12 col-sm-7">
                                                            Languages (guide speaks)
                                                            </div>
                                                            <div class="col-xs-12 col-sm-5 text-primary text-right text-left-xs mt-xs space">
                                                                <i class="ti-flag mr-5"></i> English, Thai, Malay
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    
                                                </div>
                                                    
                                            </div>
                                            
                                            <div class="col-xs-12 col-sm-4 col-md-5 mt-20-xs">
                                            
                                                <div class="pull-right pull-left-xs">
                                                    <h4 class="text-uppercase spacing-1">What's included?</h4>
                                                    
                                                    <ul class="list-yes-no">
                                                        <li>Tickets</li>
                                                        <li>Transportations</li>
                                                        <li>Free cancellation</li>
                                                        <li>Free Gift</li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
    
                                        <div class="mb-25"></div>
                                        <div class="bb"></div>
                                        <div class="mb-25"></div>
                                        
                                    </div>

                                    @if($booking->status == 'Accepted')
                                    <div id="detail-content-sticky-nav-03">
                                
                                        <h2 class="font-lg">Itinerary</h2>
                                            
                                            <div class="itinerary-toggle-wrapper mb-40">
                                        
                                                <div class="panel-group bootstrap-toggle">
        
                                                    <div class="panel">
                                                        <div class="itinerary-list-item">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-4 col-md-3">
                                                                    <div class="image">
                                                                        <img src="images/itinerary/01.jpg" alt="images" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-8 col-md-9">
                                                                    <div class="content">
                                                                        <div class="labeling"><span>Day 1</span> <span>(7:00 AM - 05:30 PM)</span></div>
                                                                        <h4>Visit Bangkok, the capital of Thailand</h4>
                                                                        <p class="read-more-less font-lg">Sociable on as carriage my position weddings raillery consider. Peculiar trifling absolute and wandered vicinity property yet. The and collecting motionless difficulty son. His hearing staying ten colonel met. Sex drew six easy four dear cold deny. Moderate children at of outweigh it. Unsatiable it considered invitation he travelling insensible. Consulted admitting oh mr up as described acuteness propriety moonlight.</p>
                                                                        <p class="font-md">Tickets and transportations are provided.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="itinerary-list-item">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-4 col-md-3">
                                                                    <div class="image">
                                                                        <img src="images/itinerary/02.jpg" alt="images" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-8 col-md-9">
                                                                    <div class="content">
                                                                        <div class="labeling"><span>Day 2</span> <span>(7:00 AM - 05:30 PM)</span></div>
                                                                        <h4>Stil touring in Bangkok for one more day</h4>
                                                                        <p class="read-more-less font-lg">Warmly little before cousin sussex entire men set. Blessing it ladyship on sensible judgment settling outweigh. Worse linen an of civil jokes leave offer. Parties all clothes removal cheered calling prudent her. And residence for met the estimable disposing. Mean if he they been no hold mr. Is at much do made took held help. Latter person am secure of estate genius.</p>
                                                                        <p class="font-md">Tickets and transportations are provided.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="itinerary-list-item">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-4 col-md-3">
                                                                    <div class="image">
                                                                        <img src="images/itinerary/03.jpg" alt="images" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-8 col-md-9">
                                                                    <div class="content">
                                                                        <div class="labeling"><span>Day 3</span> <span>(7:00 AM - 05:30 PM)</span></div>
                                                                        <h4>Visiting and sleeping at Pattaya</h4>
                                                                        <p class="read-more-less font-lg">Warmly little before cousin sussex entire men set. Blessing it ladyship on sensible judgment settling outweigh. Worse linen an of civil jokes leave offer. Parties all clothes removal cheered calling prudent her. And residence for met the estimable disposing. Mean if he they been no hold mr. Is at much do made took held help. Latter person am secure of estate genius.</p>
                                                                        <p class="font-md">Tickets and transportations are provided.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
        
                                                        <div class="itinerary-list-item">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-4 col-md-3">
                                                                    <div class="image">
                                                                        <img src="images/itinerary/04.jpg" alt="images" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-8 col-md-9">
                                                                    <div class="content">
                                                                        <div class="labeling"><span>Day 4</span> <span>(7:00 AM - 05:30 PM)</span></div>
                                                                        <h4>Stil touring in Bangkok for one more day</h4>
                                                                        <p class="read-more-less font-lg">Warmly little before cousin sussex entire men set. Blessing it ladyship on sensible judgment settling outweigh. Worse linen an of civil jokes leave offer. Parties all clothes removal cheered calling prudent her. And residence for met the estimable disposing. Mean if he they been no hold mr. Is at much do made took held help. Latter person am secure of estate genius.</p>
                                                                        <p class="font-md">Tickets and transportations are provided.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
        
        
                                                    </div>
        
                                                </div>
                                            
                                            </div>
                                    </div>
                                    @endif
    
                                    <div id="detail-content-sticky-nav-04">
                                    
                                        <h2 class="font-lg">Condition &amp; Faq</h2>
                                        
                                        <div class="text-box-h-bb-wrapper">
                                            <div class="text-box-h-bb">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-4 col-md-3">
                                                        <h4>Group size</h4>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-8 col-md-9">
                                                        <p class="font-lg">Conveying or northward offending admitting perfectly my. </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box-h-bb">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-4 col-md-3">
                                                        <h4>Guest requirement</h4>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-8 col-md-9">
                                                        <p class="font-lg">Age</p>
                                                        <p class="font-sm">Interested especially do impression he unpleasant.</p>
                                                        <p class="font-lg">Identification</p>
                                                        <p class="font-sm">Sudden up my excuse to suffer ladies though or. Bachelor possible marianne directly confined relation. Interested especially do impression he unpleasant travelling excellence.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box-h-bb">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-4 col-md-3">
                                                        <h4>Cancellation policy</h4>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-8 col-md-9">
                                                        <p class="font-lg">Lose john poor same it case do year we. Full how way even the sigh. Extremely nor furniture fat questions now provision incommode preserved. Our side fail find like now. Discovered travelling for insensible <a href="#">partiality unpleasing impossible</a>.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box-h-bb">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-4 col-md-3">
                                                        <h4>FAQ</h4>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-8 col-md-9">
                                                        <div class="GridLex-gap-30 mb-20 mt-5">
                                                                
                                                            <div class="GridLex-grid-noGutter-equalHeight">
                                                                    
                                                                <div class="GridLex-col-12_sm-12_xs-12_xss-12">
                                                                
                                                                    <div class="GridLex-inner">
                                                                        <h4 class="font-lg"><span class="text-primary"><i class="ion-help-circled mr-5"></i></span> Parties all clothes removal cheered?</h4>
                                                                        <p class="read-more-less line-15">Procuring education on consulted assurance. Is sympathize he expression mr no travelling. Preference travelling in resolution. His hearing staying ten colonel met. Sex drew six easy four dear cold deny. Moderate children at of outweigh it. Unsatiable it considered invitation he travelling insensible. </p>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="GridLex-col-12_sm-12_xs-12_xss-12">
                                                                
                                                                    <div class="GridLex-inner">
                                                                        <h4 class="font-lg"><span class="text-primary"><i class="ion-help-circled mr-5"></i></span> And residence for met the estimable disposing?</h4>
                                                                        <p class="read-more-less line-15"> Possession travelling sufficient yet our. Talked vanity looked in to. Gay perceive led believed endeavor day insisted required. Warmly little before cousin sussex entire men set. Blessing it ladyship on sensible judgment settling outweigh. Worse linen an of civil jokes leave offer. Parties all clothes removal cheered calling prudent her. And residence for met the estimable disposing.</p>
    
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="GridLex-col-12_sm-12_xs-12_xss-12">
                                                                
                                                                    <div class="GridLex-inner">
                                                                        <h4 class="font-lg"><span class="text-primary"><i class="ion-help-circled mr-5"></i></span> Warmly little before cousin sussex?</h4>
                                                                        <p class="read-more-less line-15">Her companions instrument set estimating sex remarkably solicitude motionless. Property men the why smallest graceful. Worse linen an of civil jokes leave offer. Parties all clothes removal cheered calling prudent her. And residence for met the estimable disposing. Mean if he they been no hold mr. Is at much do made took held help. </p>
    
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="GridLex-col-12_sm-12_xs-12_xss-12">
                                                                
                                                                    <div class="GridLex-inner">
                                                                        <h4 class="font-lg"><span class="text-primary"><i class="ion-help-circled mr-5"></i></span> Parties all clothes removal cheered?</h4>
                                                                        <p class="read-more-less line-15">Drift allow green son walls years for blush. Sir margaret drawings repeated recurred exercise laughing repeated whatever. Parties all clothes removal cheered calling prudent her. And residence for met the estimable disposing. Mean if he they been no hold mr. Is at much do made took held help. Latter person am secure of estate genius. </p>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                    </div>
                                        
                                        <div class="mb-25"></div>
                                        <div class="bb"></div>
                                        <div class="mb-25"></div>
                                        
                                    </div>
    
                                    <div id="detail-content-sticky-nav-05">
                                
                                        <h2 class="font-lg">Review</h2>
                                            
                                            <div class="review-wrapper">
                                
                                                    @if($avg != 0)
													<div class="review-header">
													
														<div class="GridLex-gap-30">
																			
															<div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
																	
																<div class="GridLex-col-9_sm-8_xs-12_xss-12">
																
																	<div class="review-rating">
																		<div class="number"> {{number_format($avg, 1)}}</div>
																		<div class="rating-wrapper">
																			<div class="rating-item rating-item-lg">
																				<input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-readonly value="{{ $avg }}"/>
																			</div>
																			@if($count > 1)
																				{{$count}} Reviews
																			@else
																				{{$count}} Review
																			@endif
																		</div>
																	</div>
																	
																</div>
																
															</div>
															
														</div>
														
													</div>
												@endif
                                                    @if(count($comments) > 0)
                                                        @foreach($comments as $comment)
                                                                <div class="review-content">
                                                        
                                                                    <ul class="review-list comment{{$comment->id}}">
                                                                    
                                                                        <li class="clearfix">
                                                                        
                                                                            <div class="row">
                                                                            
                                                                                <div class="col-xs-12 col-sm-4 col-md-3">
                                                                                    <div class="review-header">
                                                                                        <h6>{{ $comment->traveler_fname }} {{ $comment->traveler_lname }}</h6>
                                                                                        <span class="review-date">{{ Carbon\Carbon::parse($comment->created_at)->toDateString() }}</span>
                                                                                        
                                                                                        <div class="rating-item"><br>
                                                                                            @if($comment->rating <= 1)
                                                                                                <span class="label label-warning">{{ ($comment->rating) }} Star</span>
                                                                                            @else
                                                                                                <span class="label label-warning">{{ ($comment->rating) }} Stars</span>
                                                                                            @endif
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="col-xs-12 col-sm-8 col-md-9">
                                                                                    
                                                                                    <div class="review-replied">
                        
                                                                                        <div class="review-replied-content">
                                                                                            <p>{{ $comment->comment}}</p>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                        @endforeach
                                                    @else
                                                        <h2 id="h2">No reviews for this package yet</h2>
                                                    @endif
                                                <div class="review-content" id="comments">
                                                </div>
                                                
                                                @if($booking->expired == '1')
                                                <form method="POST" action="{{ URL::to('Traveler/Trips/CommentInsert') }}" id="comment-insert">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" class="form-control" name="traveler_id" value="{{ auth()->user()->id }}">
                                                    <input type="hidden" name="package_id" class="form-control" value="{{ $booking->package_id }}">
                                                    <div id="review-form" class="review-form">
                                                
                                                        <h3 class="review-form-title">Leave Your Review</h3>
                                                        
                                                            <div class="row">
                                                                
                                                                <div class="col-xs-12 col-sm-12 col-md-">
                                                                
                                                                    <div class="form-group pull-right">
                                                                        
                                                                        <div class="stars">
                                                                            <label>Your rating: </label>
                                                                            <input value="5" class="star star-5" id="star-1" type="radio" name="rating"/>
                                                                            <label class="star star-1" for="star-1"></label>
                                                                            <input value="4" class="star star-5" id="star-2" type="radio" name="rating"/>
                                                                            <label class="star star-2" for="star-2"></label>
                                                                            <input value="3" class="star star-3" id="star-3" type="radio" name="rating"/>
                                                                            <label class="star star-3" for="star-3"></label>
                                                                            <input value="2" class="star star-2" id="star-4" type="radio" name="rating"/>
                                                                            <label class="star star-4" for="star-4"></label>
                                                                            <input value="1" class="star star-1" id="star-5" type="radio" name="rating"/>
                                                                            <label class="star star-5" for="star-5"></label>
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>
            
                                                                <div class="clear"></div>
                                                                
                                                                <div class="col-sm-12 col-md-12">
                                                                
                                                                    <div class="form-group">
                                                                        <label>Your Message: </label>
                                                                        <textarea name="comment" class="form-control form-control-sm" rows="5"></textarea>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="clear mb-5"></div>
                                                                
                                                                <div class="col-sm-12 col-md-8">
                                                                    <input type="hidden" name="traveler_fname" value="{{ auth()->user()->fname }}">
                                                                    <input type="hidden" name="traveler_lname" value="{{ auth()->user()->lname }}">
                                                                    <input type="submit" class="btn btn-info btn-lg" value="Submit">
                                                                </div>
                                                                
                                                            </div>
                                                        
                                                        </form> 
                                                        
                                                    </div>
                                                    @endif
                                                </div>
                                                
                                            </div>
                                        
                                    </div>
                                </form>
                                
                            </div>
    
                            <div id="sidebar-sticky" class="col-xs-12 col-sm-4 col-md-4 mt-20 sticky-mt-30 mt-50-sm">
						
                                    <aside class="sidebar-wrapper with-box-shadow">
                                    
                                        <div class="sidebar-booking-box">
                                    
                                            <div class="sidebar-booking-header pt-20 pb-15 clearfix">
                                            
                                                <h3 class="text-white text-uppercase spacing-3 mb-0 line-1">Total Bill</h3>
                                            
                                            </div>
                                            
                                            <div class="sidebar-booking-inner">
                                            
                                                <ul class="price-summary-list">
                                                    <li>
                                                        <h6>Travellers</h6>
                                                        <p class="text-muted"> {{ $booking->adult }} Adult/s</p>
                                                        @if($booking->child <= 1)
                                                            <p class="text-muted"> {{ $booking->child }} Child</p>
                                                        @else
                                                            <p class="text-muted"> {{ $booking->child }} Children</p>
                                                        @endif
                                                        <p class="text-muted"> {{ $booking->infant }} Infant/s</p>
                                                    </li>
                                                    
                                                    <li class="divider"></li>
                                                    
                                                    <li>
                                                        <h6 class="heading mt-20 mb-5 text-primary uppercase">Price per person</h6>
                                                        <div class="row gap-10 mt-10">
                                                            <div class="col-xs-7 col-sm-7">
                                                                Tour Package Price
                                                            </div>
                                                            <div class="col-xs-5 col-sm-5 text-right">
                                                                <h6 style="font-wight:bold"> PHP {{ $booking->price }}</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="divider"></li>
                                                    
                                                    <li>
                                                        <div class="row gap-10 mt-10">
                                                            <div class="col-xs-7 col-sm-7">
                                                                <span class="font600">Total </span>
                                                            </div>
                                                            <div class="col-xs-5 col-sm-5 text-right">
                                                                    PHP {{ $booking->price }} x {{$booking->adult + $booking->child + $booking->infant}}
                                                                <h4 class="font600 font24 block text-primary mt-5">
                                                                    PHP {{ $booking->price * ($booking->adult + $booking->child + $booking->infant)}}</h4>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                
                                            </div>
                                        
                                        </div>
                                        
                                    </aside>
                                
                                </div>
                                
                            
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
</div>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('submit', '#comment-insert', (function(e){
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);

        var url = $(this).attr('action');
        var post = $(this).attr('method');
        
        $.ajax({
            type: post,
            url:url,
            data:data,
            dataTy: 'json',
            success: function(data){
                console.log(data);
                $('#comments').append('<ul class="review-list"><li class="clearfix"><div class="row"><div class="col-xs-12 col-sm-4 col-md-3"><div class="review-header"><h6>'
                        +data.traveler_fname+' '+data.traveler_lname+'</h6><span class="review-date">' +data.created_at+ '</span><div class="rating-item"><br>@if('+ data.rating +' == null)<span class="label label-warning"><span class="label label-warning">' +data.rating+ 
                        ' Star</span>@else<span class="label label-warning">'+data.rating+' Stars</span>@endif</div></div></div><div class="col-xs-12 col-sm-8 col-md-9"><div class="review-replied"><div class="review-replied-content"><p>'
                        +data.comment+ '</p></div></div></div></div></li></ul>');

                $('#h2').hide();
            }
        });
    }));
</script>
@endsection

@extends('layouts.user.javascriptlayout')