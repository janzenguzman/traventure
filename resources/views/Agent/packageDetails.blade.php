{{--  @extends('layouts.app')

@section('content')
<center>
<div>
    <img src="/public/uploads/files/{{ $itineraries->day1_photo }}" height="300" width="500">
</div>

<h1>{{ $packages->package_name }}</h1>
<div>
    <label>Days</label>
    <p>{{ $packages->days }}</p>
</div>
<div>
    <label>Nights</label>
    <p>{{ $packages->days-1 }}</p>
</div>
<div>
    <label>Adult Price</label>
    <p>{{ $packages->adult_price }}</p>
</div>
<div>
    <label>Child Price</label>
    <p>{{ $packages->child_price }}</p>
</div>
<div>
    <label>Infant Price</label>
    <p>{{ $packages->infant_price }}</p>
</div>
<div>
    <label>Excess Price</label>
    <p>{{ $packages->excess_price }}</p>
</div>
<div>
    <label>Type</label>
    <p>{{ $packages->type }}</p>
</div>
<div>
@if(count($packages) > 0)
    @if($packages->type == 'Exclusive')
        <label>Pax & Price</label>
        <div>
        {{$packages->pax1}}&nbsp;{{$packages->pax1_price}}
        </div>
        <div>
        {{$packages->pax2}}&nbsp;{{$packages->pax2_price}}
        </div>
        <div>
        {{$packages->pax3}}&nbsp;{{$packages->pax3_price}}
        </div>
    @endif

    @if($packages->type == 'Joined')
        <label>Price</label>
            <div>
                Adult:&nbsp;{{$packages->adult_price}}
            </div>
            <div>
                Child:&nbsp;{{$packages->child_price}}
            </div>
            <div>
                Infant:&nbsp;{{$packages->infant_price}}
            </div>
            <div>
                Excess:&nbsp;{{$packages->excess_price}}
            </div>
    @endif
@endif
</div>
<div>
    <label>Inclusions</label>
    <p>{{ $packages->inclusions }}</p>
</div>
<div>
    <label>Additional Info</label>
    <p>{{ $packages->add_info }}</p>
</div>
<div>
    <label>Reminders</label>
    <p>{{ $packages->reminders }}</p>
</div>
<div>
    <label>Categories</label>
    <p>{{ $packages->categories }}</p>
</div>
<div>
    <a href="/Agent/Packages/EditPackage/{{ $packages->package_id }}"><button>Edit Package</button>
</div>
</center>
@endsection  --}}

@extends('layouts.user.headlayout')
@section('content')
<body class="transparent-header with-multiple-sticky">

	<!-- start Container Wrapper -->
	<div class="container-wrapper">

		<!-- start Header -->
		
		<header id="header">

			<!-- start Navbar (Header) -->
            @extends('layouts.agent-navbar')
			<!-- end Navbar (Header) -->

		</header>
		
        <!-- end Header -->
        <div class="main-wrapper scrollspy-container">
            <div class="breadcrumb-image-bg detail-breadcrumb" style="background-image:url({{ asset('images/detail-header.jpg') }});">
                <div class="container">

                    <div class="page-title detail-header-02">
                    
                        <div class="row">
                        
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                            
                                <h2>{{$packages->package_name}}</h2>
                                {{--  <h6>{{$packages->package_id}}</h6>  --}}
                                <span class="labeling text-white mt-25"><span>Bangkok, Pattaya, Choburi, &amp; Sattaheeb</span> 
                                    <span>
                                        {{$packages->days}} 
                                        @if($packages->days > 1)
                                            days
                                        @else
                                            day
                                        @endif
                                    </span>
                                </span>
                                <div class="rating-item rating-item-lg mb-25">
                                    <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
                                    <div class="rating-text"> <a href="#" style="color:white">(32 reviews)</a></div>
                                </div>

                            </div>
                            
                        </div>

                    </div>
                    
                    <div class="breadcrumb-wrapper text-left">
                    </div>

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

                    <div class="row">
                    
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="content-wrapper">
                                
                                <div class="user-long-sm-item clearfix">
                                    <div class="image">
                                        <img src="/public/uploads/files/{{ Auth::user()->photo }}" alt="Images" />
                                    </div>
                                    
                                    <div class="content">
                                        <span class="labeling">Offered by: </span>
                                        <h4>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h4>
                                        <a>{{ Auth::user()->job_position }} OF {{ Auth::user()->company_name }}</a><br>
                                    </div>
                                    
                                </div>
                                <div class="mb-25"></div>
                                <div class="bb"></div>
                                <div class="mb-25"></div>
                                @if(count($itineraries) > 0)
                                    @foreach($itineraries as $itinerary)
                                        <div id="itinerary">
                                    
                                            <h2 class="font-lg">Itinerary</h2>
                                                
                                                <div class="itinerary-toggle-wrapper mb-40">
                                            
                                                    <div class="panel-group bootstrap-toggle">
            
                                                        <div class="panel">

                                                            <!--DAY 1-->
                                                            <div class="itinerary-list-item">
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-4 col-md-3">
                                                                        <div class="image">
                                                                            <img src="{{asset('images/itinerary/01.jpg')}}" alt="images" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-8 col-md-9">
                                                                        <div class="content">
                                                                            <h4>Day 1</h4>
                                                                            <div class="labeling">
                                                                                    <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                    <span style="color:black">{{ $itinerary->day1_destination1}}</span> 
                                                                                <span>({{ date("g:i A", strtotime($itinerary->day1_starttime1)) }} - {{ date("g:i A", strtotime($itinerary->day1_endtime1)) }})</span>
                                                                            </div>
                                                                            
                                                                            @if($itinerary->day1_starttime2 != NULL)
                                                                                <div class="labeling">
                                                                                        <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                        <span style="color:black">{{ $itinerary->day1_destination2}}</span> 
                                                                                    <span>({{ date("g:i A", strtotime($itinerary->day1_starttime2)) }} - {{ date("g:i A", strtotime($itinerary->day1_endtime2)) }})</span>
                                                                                </div>
                                                                            @endif

                                                                            @if($itinerary->day1_starttime3 != NULL)
                                                                                <div class="labeling">
                                                                                        <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                        <span style="color:black">{{ $itinerary->day1_destination3}}</span> 
                                                                                    <span>({{ date("g:i A", strtotime($itinerary->day1_starttime3)) }} - {{ date("g:i A", strtotime($itinerary->day1_endtime3)) }})</span>
                                                                                </div>
                                                                            @endif

                                                                            @if($itinerary->day1_starttime4 != NULL)
                                                                                <div class="labeling">
                                                                                        <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                        <span style="color:black">{{ $itinerary->day1_destination4}}</span> 
                                                                                    <span>({{ date("g:i A", strtotime($itinerary->day1_starttime4)) }} - {{ date("g:i A", strtotime($itinerary->day1_endtime4)) }})</span>
                                                                                </div>
                                                                            @endif

                                                                            @if($itinerary->day1_starttime5 != NULL)
                                                                                <div class="labeling">
                                                                                        <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                        <span style="color:black">{{ $itinerary->day1_destination5}}</span> 
                                                                                    <span>({{ date("g:i A", strtotime($itinerary->day1_starttime5)) }} - {{ date("g:i A", strtotime($itinerary->day1_endtime5)) }})</span>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--DAY 2-->
                                                            @if($itinerary->day2_starttime1 != NULL)
                                                                <div class="itinerary-list-item">
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                                                            <div class="image">
                                                                                <img src="{{asset('images/itinerary/02.jpg')}}" alt="images" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-8 col-md-9">
                                                                            <div class="content">
                                                                                <h4>Day 2</h4>
                                                                                <div class="labeling">
                                                                                        <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                        <span style="color:black">{{ $itinerary->day2_destination1}}</span> 
                                                                                    <span>({{ date("g:i A", strtotime($itinerary->day2_starttime1)) }} - {{ date("g:i A", strtotime($itinerary->day2_endtime1)) }})</span>
                                                                                </div>
                                                                                
                                                                                @if($itinerary->day2_starttime2 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day2_destination2}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day2_starttime2)) }} - {{ date("g:i A", strtotime($itinerary->day2_endtime2)) }})</span>
                                                                                    </div>
                                                                                @endif

                                                                                @if($itinerary->day2_starttime3 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day2_destination3}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day2_starttime3)) }} - {{ date("g:i A", strtotime($itinerary->day2_endtime3)) }})</span>
                                                                                    </div>
                                                                                @endif

                                                                                @if($itinerary->day2_starttime4 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day2_destination4}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day2_starttime4)) }} - {{ date("g:i A", strtotime($itinerary->day2_endtime4)) }})</span>
                                                                                    </div>
                                                                                @endif

                                                                                @if($itinerary->day2_starttime5 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day2_destination5}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day2_starttime5)) }} - {{ date("g:i A", strtotime($itinerary->day2_endtime5)) }})</span>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            

                                                            <!--DAY 3-->
                                                            @if($itinerary->day3_starttime1 != NULL)
                                                                <div class="itinerary-list-item">
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                                                            <div class="image">
                                                                                <img src="{{asset('images/itinerary/02.jpg')}}" alt="images" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-8 col-md-9">
                                                                            <div class="content">
                                                                                <h4>Day 3</h4>
                                                                                <div class="labeling">
                                                                                        <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                        <span style="color:black">{{ $itinerary->day3_destination1}}</span> 
                                                                                    <span>({{ date("g:i A", strtotime($itinerary->day3_starttime1)) }} - {{ date("g:i A", strtotime($itinerary->day3_endtime1)) }})</span>
                                                                                </div>
                                                                                
                                                                                @if($itinerary->day3_starttime2 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day3_destination2}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day3_starttime2)) }} - {{ date("g:i A", strtotime($itinerary->day3_endtime2)) }})</span>
                                                                                    </div>
                                                                                @endif

                                                                                @if($itinerary->day3_starttime3 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day3_destination3}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day3_starttime3)) }} - {{ date("g:i A", strtotime($itinerary->day3_endtime3)) }})</span>
                                                                                    </div>
                                                                                @endif

                                                                                @if($itinerary->day3_starttime4 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day3_destination4}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day3_starttime4)) }} - {{ date("g:i A", strtotime($itinerary->day3_endtime4)) }})</span>
                                                                                    </div>
                                                                                @endif

                                                                                @if($itinerary->day3_starttime5 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day3_destination5}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day3_starttime5)) }} - {{ date("g:i A", strtotime($itinerary->day3_endtime5)) }})</span>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            <!--DAY 4-->
                                                            @if($itinerary->day4_starttime1 != NULL)
                                                                <div class="itinerary-list-item">
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                                                            <div class="image">
                                                                                <img src="{{asset('images/itinerary/02.jpg')}}" alt="images" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-8 col-md-9">
                                                                            <div class="content">
                                                                                <h4>Day 4</h4>
                                                                                <div class="labeling">
                                                                                        <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                        <span style="color:black">{{ $itinerary->day4_destination1}}</span> 
                                                                                    <span>({{ date("g:i A", strtotime($itinerary->day4_starttime1)) }} - {{ date("g:i A", strtotime($$itinerary->day4_endtime1)) }})</span>
                                                                                </div>
                                                                                
                                                                                @if($itinerary->day4_starttime2 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day4_destination2}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day4_starttime2)) }} - {{ date("g:i A", strtotime($itinerary->day4_endtime2)) }})</span>
                                                                                    </div>
                                                                                @endif

                                                                                @if($itinerary->day4_starttime3 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day4_destination3}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day4_starttime3)) }} - {{ date("g:i A", strtotime($itinerary->day4_endtime3)) }})</span>
                                                                                    </div>
                                                                                @endif

                                                                                @if($itinerary->day4_starttime4 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day4_destination4}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day4_starttime4)) }} - {{ date("g:i A", strtotime($itinerary->day4_endtime4)) }})</span>
                                                                                    </div>
                                                                                @endif

                                                                                @if($itinerary->day4_starttime5 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day4_destination5}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day4_starttime5)) }} - {{ date("g:i A", strtotime($itinerary->day4_endtime5)) }})</span>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            <!--DAY 5-->
                                                            @if($itinerary->day5_starttime1 != NULL)
                                                                <div class="itinerary-list-item">
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                                                            <div class="image">
                                                                                <img src="{{asset('images/itinerary/02.jpg')}}" alt="images" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-8 col-md-9">
                                                                            <div class="content">
                                                                                <h4>Day 5</h4>
                                                                                <div class="labeling">
                                                                                        <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                        <span style="color:black">{{ $itinerary->day5_destination1}}</span> 
                                                                                    <span>({{ date("g:i A", strtotime($itinerary->day5_starttime1)) }} - {{ date("g:i A", strtotime($itinerary->day5_endtime1)) }})</span>
                                                                                </div>
                                                                                
                                                                                @if($itinerary->day3_starttime2 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day5_destination2}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day5_starttime2)) }} - {{ date("g:i A", strtotime($itinerary->day5_endtime2)) }})</span>
                                                                                    </div>
                                                                                @endif

                                                                                @if($itinerary->day5_starttime3 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day5_destination3}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day5_starttime3)) }} - {{ date("g:i A", strtotime($itinerary->day5_endtime3)) }})</span>
                                                                                    </div>
                                                                                @endif

                                                                                @if($itinerary->day5_starttime4 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day5_destination4}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day5_starttime4)) }} - {{ date("g:i A", strtotime($itinerary->day5_endtime4)) }})</span>
                                                                                    </div>
                                                                                @endif

                                                                                @if($itinerary->day5_starttime5 != NULL)
                                                                                    <div class="labeling">
                                                                                            <i class="fa fa-long-arrow-right" style="color:black" aria-hidden="true"></i>
                                                                                            <span style="color:black">{{ $itinerary->day5_destination5}}</span> 
                                                                                        <span>({{ date("g:i A", strtotime($itinerary->day5_starttime5)) }} - {{ date("g:i A", strtotime($itinerary->day5_endtime5)) }})</span>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
            
            
                                                        </div>
            
                                                    </div>
                                                
                                                </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h3>No Itinerary</h3>
                                @endif

                                <div id="additional-info">
                                
                                        <h2 class="font-lg">Additional Information</h2>
                                        
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
                                            <div class="review-content" id="comments">
                                            </div>
                                            
                                            {{--  @if($booking->expired == '1')
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
                                            </div>  --}}
                                            
                                        </div>
                                    
                                </div>
                            </form>

                        </div>
                        
                    </div>
                    
                </div>

            </div>
            
        <!-- end Main Wrapper -->
	</div>
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
	<!-- end Container Wrapper -->

<!-- start Back To Top -->

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- end Back To Top -->
@endsection
@extends('layouts.user.javascriptlayout')
