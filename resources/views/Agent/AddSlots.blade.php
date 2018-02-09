@extends('layouts.user.headlayout')

@section('content')
<body class="transparent-header">
    <div id="introLoader" class="introLoading"></div>
    <div class="container-wrapper">
        <header id="header">
            @extends('layouts.agent-navbar')
        </header>

        <div class="main-wrapper scrollspy-container">
            <div class="breadcrumb-image-bg pb-100 no-bg" style="background-image:url({{asset('/uploads/files/osmena.jpg')}});">
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
                            <li class="active"><span>Slots</span></li>
                        </ol>                    
                    </div>
                </div>                
            </div>            

            <div class="bg-light">            
                <div class="create-tour-wrapper">
                    <div class="container">                    
                        <div class="row">                        
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">                            
                                <div class="form">
                                    <div class="create-tour-inner">
                                        <h4 class="section-title">Add Slots</h4>
                                            @include('layouts.user.alerts')
                                            @if($packages->type == 'Exclusive')
                                                <b><p>{{$packages->type}} {{$packages->package_name}}</p></b>
                                            @else
                                                <b><p>{{$packages->type}} {{$packages->package_name}}</p></b>
                                            @endif

                                            <p class="text-muted">
                                                @if($packages->days == 1)
                                                    ({{$packages->days}} Day Tour)
                                                @else
                                                    ({{$packages->days}} Days &amp;
                                                @endif
        
                                                @if(($nights = $packages->days - 1) != 0)
                                                    @if($nights <= 1)
                                                        {{$nights}} Night Tour)
                                                    @else
                                                        {{$nights}} Nights Tour)
                                                    @endif
                                                @endif
                                            </p>
                                            {!!Form::open(['action' => 'AgentsController@updateSlots', 'method' => 'POST']) !!}
                                            
                                            @if($packages->days == 1)
                                                <div class="form-group eventForm">
                                                    <label>Date:</label>       
                                                    <input type="text" name="date_from" class="form-control datePicker filter-item mmr input-append date" required>
                                                </div>
                                            @else
                                                <div class="form-group eventForm">
                                                    <label>Date From:</label>       
                                                    <input type="text" name="date_from" class="form-control datePicker filter-item mmr input-append date" required>
                                                </div>
                                                <div class="form-group eventForm">
                                                    <label>Date to:</label>       
                                                    <input type="text" name="date_to" class="form-control datePicker filter-item mmr input-append date" required>
                                                </div>
                                            @endif

                                            @if($packages->type == 'Exclusive')
                                                <div class="form-group">
                                                    <label>Slot/s:</label>
                                                    <select class="selectpicker show-tick form-control" name="slots" title="Select placeholder">
                                                        <option value="{{$packages->pax1}}">{{$packages->pax1}}</option>
                                                        <option value="{{$packages->pax2}}">{{$packages->pax2}}</option>
                                                        <option value="{{$packages->pax3}}">{{$packages->pax3}}</option>
                                                    </select>
                                                </div>
                                            @else
                                                <div class="form-group form-spin-group">
                                                    <label>Slot/s:</label>
                                                    <input type="text" name="slots" class="form-control form-spin" required>
                                                </div>
                                            @endif

                                            <input type="hidden" name="package_id" value="{{ $packages->package_id }}">
                                            <br><input type="submit" value="Add Slot" class="btn btn-info pull-right"><br>
                                        {!!Form::close() !!}
                                    </div>
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
    </div>
    
    <!-- end Container Wrapper -->
    
    
<!-- start Back To Top -->

<div id="back-to-top">
    <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- end Back To Top -->

<script>
    $(document).ready(function() {
        $('.datePicker')
            .datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
    });
</script>
@endsection
@extends('layouts.user.javascriptlayout')