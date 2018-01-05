@extends('layouts.user.headlayout')
@section('content')
        <!-- start Container Wrapper -->
        <div class="container-wrapper">
    
            <!-- start Header -->
            
            <header id="header">
    
                <!-- start Navbar (Header) -->
                @extends('layouts.agent-navbar')
                <!-- end Navbar (Header) -->
    
            </header>
            
            <!-- end Header -->
    
            <!-- start Main Wrapper -->
            
            <div class="main-wrapper scrollspy-container">
            
                <!-- start Breadcrumb -->
                @foreach($bookings as $booking)
                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li><a href="{{route('Agent.Bookings')}}">Bookings</a></li>
                            <li class="active">Booking {{$booking->booking_id}}</li>
                        </ol>
                    </div>
                </div>
                
                <!-- end Breadcrumb -->
    
                <div class="pt-30 pb-50">
                
                    <div class="container">
    
                        <div class="row">
                            
                            <div class="col-xs-12 col-sm-7 col-md-8 mt-20">
                                <h4 class="section-title">Booking Information:</h4>
                                
                                <ul class="featured-list-with-h">
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <h5><i class="ti-id-badge text-primary mr-5"></i> Booking ID</h5>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                                <span class="pl-sm">{{ $booking->booking_id }}</span>
                                            </div>
                                        </div>
                                    </li>


                                    <li>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <h5><i class="ti-package text-primary mr-5"></i> Package Name</h5>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                                <span class="pl-sm">{{ $booking->package_name }}</span>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <h5><i class="ti-calendar text-primary mr-5"></i> Travel Date</h5>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                                <span class="pl-sm">
                                                    {{ Carbon\Carbon::parse($booking->date_from)->toFormattedDateString() }} -
                                                    {{ Carbon\Carbon::parse($booking->date_to)->toFormattedDateString() }} 
                                                </span>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <h5><i class="ti-user text-primary mr-5"></i> Client Name</h5>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                                <span class="pl-sm">{{ $booking->client_fname }} {{ $booking->client_lname }}</span>
                                            </div>
                                        </div>
                                    </li> 
                                    

                                    <li>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <h5><i class="ti-location-pin text-primary mr-5"></i> Tour Service</h5>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                                <span class="pl-sm">{{ $booking->service }} Tour</span>
                                            </div>
                                        </div>
                                    </li>

                                    @if($booking->service == 'Joined')
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                    <h5><i class="ti-user text-primary mr-5"></i> Total Travelers</h5>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                                    <span class="pl-sm">{{$booking->adult + $booking->child + $booking->infant}} Traveler/s</span>
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                    <h5><i class="ti-user text-primary mr-5"></i> Total Travelers</h5>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                                    <span class="pl-sm">{{$booking->no_of_excess + $booking->no_of_exclusive_traveler}} Traveler/s</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <h5><i class="ti-notepad text-primary mr-5"></i> Note</h5>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                                <span class="pl-sm">{{$booking->note}}</span>
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                                
    
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 mt-30">
                                    </div>
                                    <div class="col-xs-12 col-sm-6 mt-30">
                                    </div>
                                </div>
    
                            </div>
                            
                            <div id="sidebar-sticky" class="col-xs-12 col-sm-5 col-md-4 mt-20">
    
                                <aside class="sidebar-wrapper with-box-shadow">
                                
                                    <div class="sidebar-booking-box">
                                        
                                        <div class="sidebar-booking-header clearfix">
                                        
                                            <div class="price">
                                                Total Bill
                                            </div>
                                        
                                        </div>
                                        
                                        <div class="sidebar-booking-inner">
									
                                            <ul class="price-summary-list">
                                                @if($booking->service == 'Joined')
                                                    <ul class="price-summary-list">
                                                        <li>
                                                            <h6>Travelers:</h6><br>
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
                                                                    Adult Price <br>
                                                                    Child Price <br>
                                                                    Infant Price
                                                                </div>
                                                                <div class="col-xs-5 col-sm-5 text-right">
                                                                    <h6 style="font-wight:bold"> 
                                                                        PHP {{ $booking->adult_price }} <br>
                                                                        PHP {{ $booking->child_price }} <br>
                                                                        PHP {{ $booking->infant_price }}
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
                                                                        PHP {{ $booking->adult_price }} x {{ $booking->adult }} <br>
                                                                        PHP {{ $booking->child_price }} x {{ $booking->child }} <br>
                                                                        PHP {{ $booking->infant_price }} x {{ $booking->infant }}
                                                                </div>
                                                                <h4 class="font600 font24 block text-primary mt-5 pull-right">
                                                                    PHP {{ ($booking->adult * $booking->adult_price) + 
                                                                        ($booking->child * $booking->child_price) + ($booking->infant * $booking->infant_price) }}.00</h4>
                                                            </div>
                                                        </li>
                                                        
                                                    </ul>
                                                @else
                                                    <ul class="price-summary-list">
                                                        <li>
                                                            <h6>Travelers:</h6><br>
                                                            <p class="text-muted"> {{ $booking->no_of_exclusive_traveler }} Pax</p>
														    <p class="text-muted"> {{ $booking->no_of_excess }} Excess Person</p>
                                                        </li>
                                                        
                                                        <li class="divider"></li>
                                                        
                                                        <li>
                                                            <h6 class="heading mt-20 mb-5 text-primary uppercase">Exclusive Tour Price</h6>
                                                            <div class="row gap-10 mt-10">
                                                                <div class="col-xs-7 col-sm-7">
                                                                    For {{ $booking->no_of_exclusive_traveler }} Pax <br>
                                                                    Excess Person Price 
                                                                </div>
                                                                <div class="col-xs-5 col-sm-5 text-right">
                                                                    PHP {{$booking->pax_price}} <br>
                                                                    PHP {{ $booking->excess_price }} 
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
                                                                        PHP {{ $booking->pax_price }} <br>
                                                                        PHP {{ $booking->no_of_excess }} x {{ $booking->excess_price }}
                                                                </div>
                                                                <h4 class="font600 font24 block text-primary mt-5 pull-right">
                                                                    PHP {{ $booking->total_payment }}</h4>
                                                            </div>
                                                        </li>
                                                        
                                                    </ul>
                                                @endif
                                                
                                            </ul>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </aside>
                            
                            </div>
                            
                        </div>
    
                    </div>
                
                </div>
    
            </div>
            @endforeach
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
    

@endsection
@extends('layouts.user.javascriptlayout')