@extends('layouts.user.headlayout')
@section('content')
<div class="container-wrapper">
    <header id="header">
        @extends('layouts.traveler-navbar')
    </header>

    <div class="main-wrapper scrollspy-container">
        <div class="multiple-sticky hidden-sm hidden-xs">
            <div class="multiple-sticky-inner">
                <div class="multiple-sticky-container container">
                    <div class="multiple-sticky-item clearfix">
                        <ul id="multiple-sticky-menu" class="multiple-sticky-menu clearfix">
                            <li>
                                <a href="#booking-details">Booking Details</a>
                            </li>

                            @foreach($bookings as $booking)
                                @if($booking->status == 'Accepted')
                                    <li>
                                        <a href="#itinerary">Itinerary</a>
                                    </li>
                                @endif
                            <li>
                                <a href="#additional-info">Additional Information</a>
                            </li>
                            <li>
                                <a href="#reviews">Reviews</a>
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
                                    <img src="/public/uploads/files/{{ $booking->photo }}" alt="Images" />
                                </div>
                                
                                <div class="content">
                                    <span class="labeling">Offered by: </span>
                                    <h4>{{ $booking->fname }} {{ $booking->lname }}</h4>
                                    <a>{{ $booking->job_position }} OF {{ $booking->company_name }}</a><br>
                                
                                        @if($booking->status == 'Confirmed')
                                            <span class="label label-warning">Requested</span>
                                        @elseif($booking->status == 'Accepted')
                                            <span class="label label-success">Accepted</span>
                                        @endif
                                </div>
                            </div>
                                        
                            <div id="booking-details">
                                <br>
                                <h4 class="section-title">Booking Information</h4>
                                
                                <ul class="book-sum-list mt-30">
                                    <li><span class="font600">Booking Number: </span>{{ $booking->booking_id }}</li>
                                    <li><span class="font600">Client Name: </span>{{ $booking->client_fname }} {{ $booking->client_lname }}</li>
                                    <li><span class="font600">Phone Number: </span> {{ $booking->contact_num }} </li>
                                    <li><span class="font600">Package Name: </span>{{ $booking->package_name }}</li>

                                    @if($booking->date_to == NULL)
                                        <li><span class="font600">Travel Date: </span> {{ Carbon\Carbon::parse($booking->date_from)->toFormattedDateString() }}</li>
                                    @else
                                        <li><span class="font600">Starting Date: </span> {{ Carbon\Carbon::parse($booking->date_from)->toFormattedDateString() }}</li>
                                        <li><span class="font600">End Date: </span>{{ Carbon\Carbon::parse($booking->date_to)->toFormattedDateString() }}</li>
                                    @endif
                                    <li><span class="font600">Duration: </span>
                                        @if($booking->days == 1)
                                            {{$booking->days}} Day Tour
                                        @else
                                            {{$booking->days}} Days
                                        @endif

                                        @if(($nights = $booking->days - 1) != 0)
                                            @if($nights <= 1)
                                                {{$nights}} Night 
                                            @else
                                                {{$nights}} Nights
                                            @endif
                                        @endif
                                    </li>
                                </ul>

                                <div class="mb-40"></div>
                                
                                <h4 class="section-title">Need Booking Help?</h4>
                                <p>You can contact me through text, email, or chat.</p>
                                
                                <ul class="list-with-icon list-inline-block">
                                    <li><i class="fa fa-mobile text-primary"></i> <strong>Phone:</strong> {{ $booking->contact_no }}</li>
                                        <li><i class="ri ri-envelope text-primary"></i> <strong>Email:</strong> {{ $booking->email }}</li>
                                    <li><i class="ri ri-comments-bubble text-primary"></i> <strong>Chat:</strong> <a href="/Traveler/TourPackage/{{ $booking->package_id }}">Click Here</a></li>
                                </ul>

                                <div class="mb-40"></div>
                                
                                <div class="mb-25"></div>
                                <div class="bb"></div>
                                <div class="mb-25"></div>
                                
                                <div class="featured-icon-simple-wrapper">
                
                                    
                                </div>
                                
                            </div>

                            @if($booking->status == 'Accepted')
                            <div class="featured-list-in-box">
                                <h2 class="font-lg section-title">ITINERARY</h2>
                                    <div id="itinerary">
                                        <div class="itinerary-toggle-wrapper mb-40">
                                            <div class="panel-group bootstrap-toggle">
                                                <div class="panel">

                                                    <?php $temp = 0 ?>
                                                    @if(count($itineraries) > 0)
                                                        <div class="itinerary-list-item">
                                                            @foreach($itineraries as $itinerary)
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="content">
                                                                            @for($x=0; $x<count($itinerary->package_id); ++$x)
                                                                                    
                                                                                @if($temp != $itinerary->day)
                                                                                    @if($itinerary->day !=1)
                                                                                    <div class="mb-25"></div>
                                                                                    <div class="bb"></div>
                                                                                    <div class="mb-25"></div>
                                                                                    @endif
                                                                                <div class="col-xs-12 col-sm-4 col-md-12">
                                                                                    <b><span class="labeling" style="font-size: 20px">Day 0{{$itinerary->day}}</span></b>
                                                                                    <div class="col-xs-12 col-sm-4 col-md-3">
                                                                                        <div class="image">
                                                                                            <img src="/public/uploads/files/{{ $itinerary->dayPhoto }}" alt="images" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xs-12 col-sm-4 col-md-9">
                                                                                        <a href="/Traveler/Bookings/ViewRoutes/{{$itinerary->package_id}}/{{$itinerary->day}}" class="btn btn-success pull-right">View Routes</a>
                                                                                    </div>
                                                                                </div>
                                                                                    <?php $temp = $itinerary->day ?> 
                                                                                @endif
                                                                                <div class="col-xs-12 col-sm-4 col-md-12">
                                                                                    <div class="content">
                                                                                        <div class="labeling"><br>
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->destination}}</span> 
                                                                                            <span>({{ date("g:i A", strtotime($itinerary->starttime)) }} - {{ date("g:i A", strtotime($itinerary->endtime)) }})</span>
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                            </div>             
                                                                            @endfor
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>    
                                                    @else
                                                        <div class="itinerary-list-item">
                                                            <h4 class="text-danger">No Itinerary for this package.</p>
                                                        </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>	
                                </div>

                                @elseif($booking->status == 'Confirmed')
                                <div class="featured-list-in-box"><br>
                                    <h4 class="uppercase spacing-1 section-title">Trip Details</h4>
                                        <div id="itinerary">
                                            <div class="itinerary-toggle-wrapper mb-40">
                                                <div class="panel-group bootstrap-toggle">
                                                    <div class="panel">
    
                                                    <?php $temp = 0 ?>
                                                    @if(count($itineraries) > 0)
                                                        <div class="itinerary-list-item">
                                                            @foreach($itineraries as $itinerary)
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="content">
                                                                            @for($x=0; $x<count($itinerary->package_id); ++$x)
                                                                                    
                                                                                @if($temp != $itinerary->day)
                                                                                    @if($itinerary->day !=1)
                                                                                    <div class="mb-25"></div>
                                                                                    <div class="bb"></div>
                                                                                    <div class="mb-25"></div>
                                                                                    @endif
                                                                                <div class="col-xs-12 col-sm-4 col-md-12">
                                                                                    <b><span class="labeling" style="font-size: 20px">Day 0{{$itinerary->day}}</span></b>
                                                                                    <div class="col-xs-12 col-sm-4 col-md-3">
                                                                                        <div class="image">
                                                                                            <img src="/public/uploads/files/{{ $itinerary->dayPhoto }}" alt="images" />
                                                                                            
                                                                                        </div>
                                                                                        
                                                                                        
                                                                                    </div>
                                                                                    <div class="col-xs-12 col-sm-4 col-md-9">
                                                                                        {{--  <a href="/Agent/Packages/PackageDetails/ViewRoutes/{{$itinerary->package_id}}/{{$itinerary->day}}" class="btn btn-success pull-right">View Routes</a>  --}}
                                                                                        </div>
                                                                                </div>
                                                                                    <?php $temp = $itinerary->day ?> 
                                                                                @endif
                                                                                    <div class="col-xs-12 col-sm-4 col-md-12">
                                                                                        <div class="content">
                                                                                            <div class="labeling"><br>
                                                                                                <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                                <span style="color:black">{{ $itinerary->destination}}</span> 
                                                                                                {{--  <span>({{ date("g:i A", strtotime($itinerary->starttime)) }} - {{ date("g:i A", strtotime($itinerary->endtime)) }})</span>  --}}
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>            
                                                                                            
                                                                            @endfor
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>    
                                                    @else
                                                        <div class="itinerary-list-item">
                                                            <h4 class="text-danger">No Itinerary for this package.</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                @endif
                            </div>
    
                            <div id="additional-info">
                                <h2 class="font-lg">ADDITIONAL INFORMATION</h2>
                                
                                <div class="text-box-h-bb-wrapper">
                                    <div class="text-box-h-bb">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <p class="font-md">{{ $booking->add_info }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-box-h-bb">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4 col-md-3">
                                                <h4>Inclusions</h4>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <p class="font-md">{{ $booking->inclusions }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-box-h-bb">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4 col-md-3">
                                                <h4>Reminders</h4>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <p class="font-md">{{ $booking->reminders }} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-25"></div>
                                <div class="bb"></div>
                                <div class="mb-25"></div>
                                
                            </div>
    
                            <div id="reviews">
                                <h2 class="font-lg">Reviews</h2>
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
                                        @endforeach <!--endforeach comments-->
                                    @else
                                        <h2 id="h2">No reviews for this package yet</h2>
                                    @endif
                                <div class="review-content" id="comments"></div>
                                
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
                                                            <textarea name="comment" class="form-control form-control-sm" rows="5" required></textarea>
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
                @endforeach <!--endforeach bookings-->
            </div>
    
            <div id="sidebar-sticky" class="col-xs-12 col-sm-4 col-md-4 mt-20 sticky-mt-30 mt-50-sm">
                <aside class="sidebar-wrapper with-box-shadow">
                    <div class="sidebar-booking-box">
                        <div class="sidebar-booking-header pt-20 pb-15 clearfix">
                            <h3 class="text-white text-uppercase spacing-3 mb-0 line-1">Total Bill</h3>
                        </div>
                        
                        <div class="sidebar-booking-inner">
                            @foreach($bills as $bill)
                                @if($bill->service == 'Joined')
                                    <ul class="price-summary-list">
                                        <li>
                                            <h6>Travelers:</h6><br>
                                            <p class="text-muted"> {{ $bill->adult }} Adult/s</p>
                                            @if($bill->child <= 1)
                                                <p class="text-muted"> {{ $bill->child }} Child</p>
                                            @else
                                                <p class="text-muted"> {{ $bill->child }} Children</p>
                                            @endif
                                            <p class="text-muted"> {{ $bill->infant }} Infant/s</p>
                                        </li>
                                        
                                        <li class="divider"></li>
                                        
                                        <li>
                                            <h6 class="heading mt-20 mb-5 text-primary uppercase">Price per person</h6>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    Adult Price <br>
                                                    Child Price <br>
                                                    Infant Price
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                    <h6 style="font-wight:bold"> 
                                                        PHP {{ number_format($bill->adult_price, 2) }} <br>
                                                        PHP {{ number_format($bill->child_price, 2) }} <br>
                                                        PHP {{ number_format($bill->infant_price, 2) }}
                                                    </h6>
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
                                                        PHP {{ number_format($bill->adult_price, 2) }} x {{ $bill->adult }} <br>
                                                        PHP {{ number_format($bill->child_price, 2) }} x {{ $bill->child }} <br>
                                                        PHP {{ number_format($bill->infant_price, 2) }} x {{ $bill->infant }}
                                                </div>
                                                <h4 class="font600 font24 block text-primary mt-5 pull-right">
                                                    PHP {{ number_format(($bill->adult * $booking->adult_price) + 
                                                        ($bill->child * $bill->child_price) + ($bill->infant * $bill->infant_price), 2) }}</h4>
                                            </div>
                                        </li>
                                    </ul>
                                @else
                                    <ul class="price-summary-list">
                                        <li>
                                            <h6>Travelers:</h6><br>
                                            <p class="text-muted"> {{ $bill->no_of_exclusive_traveler }} Pax</p>
                                            <p class="text-muted"> {{ $bill->no_of_excess }} Excess Person</p>
                                        </li>
                                        
                                        <li class="divider"></li>
                                        
                                        <li>
                                            <h6 class="heading mt-20 mb-5 text-primary uppercase">Exclusive Tour Price</h6>
                                            <div class="row gap-10 mt-10">
                                                <div class="col-xs-7 col-sm-7">
                                                    For {{ $bill->no_of_exclusive_traveler }} Pax <br>
                                                    Excess Person Price 
                                                </div>
                                                <div class="col-xs-5 col-sm-5 text-right">
                                                    PHP {{ number_format($bill->pax_price, 2) }} <br>
                                                    PHP {{ number_format($bill->excess_price, 2) }} 
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
                                                        PHP {{ number_format($bill->pax_price, 2) }} <br>
                                                        PHP {{ $bill->no_of_exclusive_traveler }} x {{ number_format($bill->excess_price, 2) }}
                                                </div>
                                                <h4 class="font600 font24 block text-primary mt-5 pull-right">
                                                    PHP {{ number_format($bill->total_payment, 2) }}</h4>
                                            </div>
                                        </li>
                                    </ul>
                                @endif
                            @endforeach <!--endforeach bills-->
                        </div>
                    </div>
                </aside>
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
</div>
 
 
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