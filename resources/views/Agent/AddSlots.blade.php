{{--  @extends('layouts.app')

@section('content')
<style>
    .foo {
    width: 100px;
}
</style>
    <h1>Slots</h1>
    {!!Form::open(['action' => 'AgentsController@updateSlots', 'method' => 'POST']) !!}
        <div class="form-group">
            <label>Date to:</label>       
            <input type="date" name="date_to" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Date From:</label>       
            <input type="date" name="date_from" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Slot/s:</label>
            <input type="text" name="slots" class="form-control" required>
        </div>
        <input type="hidden" name="package_id" value="{{ $packages->package_id }}">
        <input type="submit" value="Submit">
    {!!Form::close() !!}
@endsection  --}}
@extends('layouts.user.headlayout')

@section('content')
<body class="transparent-header">
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
            <!-- start breadcrumb -->
            <div class="breadcrumb-image-bg pb-100 no-bg" style="background-image:url({{ asset('images/breadcrumb-bg.jpg') }});">
                <div class="container">
                    <div class="page-title">                    
                        <div class="row">                        
                            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">                            
                                <h2>Add Slots</h2>
                            </div>                            
                        </div>
                    </div>                    
                    <div class="breadcrumb-wrapper">                    
                        <ol class="breadcrumb">
                            <li><a href="/Agent/Packages">Home</a></li>
                            <li class="active"><span>Add Slots</span></li>
                        </ol>                    
                    </div>
                </div>                
            </div>            
            <!-- end breadcrumb -->            
            <div class="bg-light">            
                <div class="create-tour-wrapper">
                    <div class="container">                    
                        <div class="row">                        
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">                            
                                <div class="form">
                                    <div class="create-tour-inner">
                                        <h4 class="section-title">Slots</h4>
                                        <div class="row">
                                            {!!Form::open(['action' => 'AgentsController@updateSlots', 'method' => 'POST']) !!}
                                            <div class="form-group">
                                                <label>Date to:</label>       
                                                <input type="date" name="date_to" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Date From:</label>       
                                                <input type="date" name="date_from" class="form-control" required>
                                            </div>
                                            <div class="form-group form-spin-group">
                                                <label>Slot/s:</label>
                                                <input type="text" name="slots" class="form-control form-spin" required>
                                            </div>
                                            <input type="hidden" name="package_id" value="{{ $packages->package_id }}">
                                            <input type="submit" value="Submit" class="btn btn-info">
                                        {!!Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start Footer Wrapper -->
        
        <div class="footer-wrapper scrollspy-footer">
        
            
            <footer class="bottom-footer">
            
                <div class="container">
                
                    <div class="row">
                    
                        <div class="col-xs-12 col-sm-6 col-md-4">
                
                            <p class="copy-right">&#169; 2017 Togoby - tour hosting</p>
                            
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-4">
                        
                            <ul class="bottom-footer-menu">
                                <li><a href="#">Cookies</a></li>
                                <li><a href="#">Policies</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Blogs</a></li>
                            </ul>
                        
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <ul class="bottom-footer-menu for-social">
                                <li><a href="#"><i class="icon-social-twitter" data-toggle="tooltip" data-placement="top" title="twitter"></i></a></li>
                                <li><a href="#"><i class="icon-social-facebook" data-toggle="tooltip" data-placement="top" title="facebook"></i></a></li>
                                <li><a href="#"><i class="icon-social-google" data-toggle="tooltip" data-placement="top" title="google plus"></i></a></li>
                                <li><a href="#"><i class="icon-social-instagram" data-toggle="tooltip" data-placement="top" title="instrgram"></i></a></li>
                            </ul>
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
