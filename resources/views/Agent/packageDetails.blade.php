@extends('layouts.user.headlayout')
@section('content')
<body class="transparent-header with-multiple-sticky">
    <div id="introLoader" class="introLoading"></div>
	<div class="container-wrapper">
		<header id="header">
            @extends('layouts.agent-navbar')
		</header>
		
        <div class="main-wrapper scrollspy-container">
            <div class="breadcrumb-image-bg detail-breadcrumb" style="background-image:url({{asset('images/hero-header/06.jpg')}});">
                <div class="container">
                    <div class="page-title detail-header-02">
                        <div class="row">
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                                <h2>{{$packages->package_name}}</h2>
                                <span class="labeling text-white mt-25"> 
                                    <span>
                                        @if($packages->days == 1)
                                            {{$packages->days}} Day Tour
                                        @else
                                            {{$packages->days}} Days &amp;
                                        @endif

                                        @if(($nights = $packages->days - 1) != 0)
                                            @if($nights <= 1)
                                                {{$nights}} Night Tour
                                            @else
                                                {{$nights}} Nights Tour
                                            @endif
                                        @endif
                                    </span>
                                </span>
                                <div class="rating-item rating-item-lg mb-25">
                                    <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="{{ $avg }}"/>
                                    <div class="rating-text"> <a href="#" style="color:white">
                                        @if($countCom > 1)
                                            ({{$countCom}} Reviews)
                                        @elseif($countCom == 1)
                                            ({{$countCom}} Review)
                                        @else
                                            (No Reviews)
                                        @endif
                                    </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-wrapper text-left"></div>
                </div>
            </div>
    
            <div class="multiple-sticky hidden-sm hidden-xs">               
                <div class="multiple-sticky-inner">
                    <div class="multiple-sticky-container container">
                        <div class="multiple-sticky-item clearfix">
                            <ul id="multiple-sticky-menu" class="multiple-sticky-menu clearfix">
                                <li>
                                    <a href="#booking-details">Booking Details</a>
                                </li>
                                <li>
                                    <a href="#itinerary">Itinerary</a>
                                </li>
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
                    @include('layouts.user.alerts')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-10">
                                <div class="content-wrapper">
                                    <div class="user-long-sm-item clearfix">
                                        <div class="image">
                                            <img src="/public/uploads/files/{{ Auth::user()->photo }}" alt="Images" />
                                        </div>
                                        
                                        <div class="content">
                                            <span class="labeling">Offered by: </span>
                                            <h4>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h4>
                                            <a>{{ Auth::user()->job_position }} OF {{ Auth::user()->company_name }}</a><br>
                                        
                                            <div class="content">
                                                <a href="/Agent/Packages/EditPackage/{{$packages->package_id}}" class="btn btn-info btn-sm btn-wide pull-right"> Edit Package</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-25"></div>
                                    <div class="bb"></div>
                                    <div class="mb-25"></div>

                                    <h2 class="font-lg">{{$packages->type}} Tour</h2>
                                    <label class="text-muted">Categories: {{$packages->categories}}</label>
                                    <h4 class="uppercase spacing-1"><br>Price Details</h4>
                                        @if($packages->type == 'Exclusive')
                                            <ul class="clearfix">
                                                <li class="row gap-20">
                                                    <div class="col-lg-4 col-md-4">
                                                    For {{ $packages->pax1 }} Pax
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 text-primary">
                                                        PHP {{ number_format($packages->pax1_price, 2) }}
                                                    </div>
                                                </li>
                                                <li class="row gap-20">
                                                    <div class="col-lg-4 col-md-4">
                                                        For {{ $packages->pax2 }} Pax
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 text-primary">
                                                        PHP {{ number_format($packages->pax2_price, 2) }}
                                                    </div>
                                                </li>
                                                <li class="row gap-20">
                                                    <div class="col-lg-4 col-md-4">
                                                        For {{ $packages->pax3 }} Pax
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 text-primary">
                                                        PHP {{ number_format($packages->pax3_price, 2) }}
                                                    </div>
                                                </li>
                                                <li class="row gap-20">
                                                    <div class="col-lg-4 col-md-4">
                                                    Excess Person Price
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 text-primary">
                                                        PHP {{ number_format($packages->excess_price, 2) }}
                                                    </div>
                                                </li>
                                            </ul>
                                        @else
                                            <ul class="clearfix">
                                                <li class="row gap-20">
                                                    <div class="col-lg-4 col-md-4">
                                                        Adult Price <b>(11 years. above)</b>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 text-primary">
                                                        PHP {{ $packages->adult_price }}.00
                                                    </div>
                                                </li>
                                                <li class="row gap-20">
                                                    <div class="col-lg-4 col-md-4">
                                                        Child Price: <b>(4-10 yesrs.)</b>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 text-primary">
                                                        PHP {{ $packages->child_price }}.00
                                                    </div>
                                                </li>
                                                <li class="row gap-20">
                                                    <div class="col-lg-4 col-md-4">
                                                        Infant Price <b>(3 years. below)</b>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 text-primary">
                                                        PHP {{ $packages->infant_price }}.00
                                                    </div>
                                                </li>
                                            </ul>
                                        @endif
                                    </div>

                                    <div class="mb-25"></div>
                                    <div class="bb"></div>
                                    <div class="mb-25"></div>

                                    <div>
                                        <h4 class="uppercase spacing-1">Available Slots</h4>
                                        <p>Here are the available slots for this package.</p>
                                        <div class="text-box-h-bb-wrapper">
                                            <div class="text-box-h-bb">
                                                @if(count($slots))
                                                    @foreach($slots as $slot)
                                                        @if($slot->slots != 0)	
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6">
                                                                    @if($packages->days == 1)
                                                                        <h5>
                                                                            {{ Carbon\Carbon::parse($slot->date_from)->toFormattedDateString() }}
                                                                        </h5>
                                                                    @else
                                                                        <h5>
                                                                            {{ Carbon\Carbon::parse($slot->date_from)->toFormattedDateString() }} -
                                                                            {{ Carbon\Carbon::parse($slot->date_to)->toFormattedDateString() }}
                                                                        </h5>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-4 col-md-2">
                                                                    @if($packages->type == 'Joined')
                                                                        <p class="font-sm text-danger"><b>{{ $slot->slots }}</b> slots left</p>
                                                                    @else
                                                                        <p class="font-sm text-danger"><b>{{ $slot->slots }}</b> pax</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-2 col-md-2">
                                                                    <a data-toggle="modal" 
                                                                        data-slot_id="{{ $slot->id }}"	
                                                                        class="btn btn-danger" id="deleteButton">Delete</a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <h4 class="text-danger">No slots available for this package yet.</p>
                                            @endif
                                        </div>
                                    </div>
                                        
                                    <div class="mb-25"></div>
                                    <div class="bb"></div>
                                    <div class="mb-25"></div>
                                        
                                    <div id="itinerary">
                                        <h2 class="font-lg">ITINERARY</h2>
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
                                                                                        <a href="/Agent/Packages/PackageDetails/ViewRoutes/{{$itinerary->package_id}}/{{$itinerary->day}}" class="btn btn-success pull-right">View Routes</a>
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

                                    <div id="additional-info">
                                        <h2 class="font-lg">ADDITIONAL INFORMATION</h2>
                                        <div class="text-box-h-bb-wrapper">
                                            <div class="text-box-h-bb">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <p class="font-md">{{ $packages->add_info }} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box-h-bb">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-4 col-md-3">
                                                        <h4>Inclusions</h4>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <p class="font-md">{{ $packages->inclusions }} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box-h-bb">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-4 col-md-3">
                                                        <h4>Reminders</h4>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <p class="font-md">{{ $packages->reminders }} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <div class="mb-25"></div>
                                        <div class="bb"></div>
                                        <div class="mb-25"></div>
                                            
                                    </div>

                                    <div id="reviews">
                                        <h2 class="font-lg">REVIEWS</h2>
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
                                                                            @if($countCom > 1)
                                                                                {{$countCom}} Reviews
                                                                            @else
                                                                                {{$countCom}} Review
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
                                                                        
                                                                        <div class="col-xs-12 col-sm-8 col-md-6">
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
                                            </div>
                                    </div>
                            </form>
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
    </div>>

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
        {{--  <h4 class="modal-title"></h4>  --}}
    </div>
    <form method="POST" action = "{{ route('Agent.DeleteSlot')}}">
        {{ csrf_field() }}
        <div class="modal-body" style="padding:5%; margin-top:2%">
            <h4 class="center">Are you sure you want to delete this slot?</h4>
            <input type="hidden" name="id" class="text-primary" id="slot_id">
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-success">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>
</div>
<!-- end of delete package -->

@endsection
@extends('layouts.user.javascriptlayout')

@section('script')
<script type="text/javascript">
    $(document).on("click",'#deleteButton',(function(){
        $('#slot_id').val($(this).data('slot_id'));
        $('#deleteModal').modal('show');
    })); 
</script>
@endsection
