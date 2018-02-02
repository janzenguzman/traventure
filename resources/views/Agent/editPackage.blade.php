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
                                <h2>Create Tour Package</h2>
                            </div>                            
                        </div>
                    </div>                    
                    <div class="breadcrumb-wrapper">                    
                        <ol class="breadcrumb">
                            <li><a href="/Agent/Packages">Home</a></li>
                            <li class="active"><span>Edit Tour Package</span></li>
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
                                        <h4 class="section-title">About this tour</h4>
                                        <div class="row">
                                            {!!Form::open(array('method' => 'post', 'enctype' => 'multipart/form-data','action' => array('AgentsController@updatePackage', $packages->package_id)))!!}
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Tour Package Name:</label>       
                                                        <input type="text" name="package_name" class="form-control" value="{{$packages->package_name}}" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row gap-20">
                                                        <div class="form-group form-spin-group">
                                                            <label>Day/s:</label>       
                                                            <input type="text" name="days" class="form-control" value="{{$packages->days}}" readonly/>
                                                            <br />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                <h4 class="section-title">Service Type</h4>
                                                    @if($packages->type == 'Exclusive')
                                                        <div id="paymentOption" class="payment-option-wrapper">
                                                            <div class="col-xss-12 col-xs-6 col-sm-6 col-md-12">
                                                                <div class="radio-block">
                                                                    <input id="type1" name="type" type="radio" class="radio" value="Exclusive" checked/>
                                                                    <label class="" for="type1"><span>Exclusive Tour</span></label>
                                                                </div>
                                                            </div>

                                                            <div id="Exclusive" class="payment-option-form-two"><br>
                                                                <div class="inner">
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <label>Pax:</label>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <label>Price:</label>
                                                                    </div>
                                                                    
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="row gap-20">
                                                                            <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                                <div class="form-group form-spin-group">
                                                                                    <input type="text" class="form-control form-spin" name="pax1" placeholder="2" value="{{ $packages->pax1 }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                                <div class="input-group mb-15">
                                                                                    <span class="input-group-addon">PHP</span>
                                                                                    <input type="text" class="form-control" name="pax1_price" placeholder="3500" value="{{ $packages->pax1_price }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="row gap-20">
                                                                            <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                                <div class="form-group form-spin-group">
                                                                                    <input type="text" class="form-control form-spin" name="pax2" placeholder="5" value="{{ $packages->pax2 }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                                <div class="input-group mb-15">
                                                                                    <span class="input-group-addon">PHP</span>
                                                                                    <input type="text" class="form-control" name="pax2_price" placeholder="4500" value="{{ $packages->pax2_price }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="row gap-20">
                                                                            <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                                <div class="form-group form-spin-group">
                                                                                    <input type="text" class="form-control form-spin" name="pax3" placeholder="8" value="{{ $packages->pax3 }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                                <div class="input-group mb-15">
                                                                                    <span class="input-group-addon">PHP</span>
                                                                                    <input type="text" class="form-control" name="pax3_price" placeholder="6500" value="{{ $packages->pax3_price }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="row gap-20">
                                                                            <div class="col-xsw-12 col-xs-12 col-sm-12 col-md-12">
                                                                                <label>Excess Person Price:</label>
                                                                                <div class="input-group mb-15">
                                                                                    <span class="input-group-addon">PHP</span>
                                                                                    <input type="text" name="excess_price" class="form-control" placeholder="350"/ value="{{ $packages->excess_price }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="clear"></div><br/>

                                                            <div class="col-xss-12 col-xs-6 col-sm-6 col-md-12">
                                                                <div class="radio-block">
                                                                    <input id="type2" name="type" type="radio" class="radio" value="Joined"/>
                                                                    <label class="" for="type2"><span>Joined Tour</span></label>
                                                                </div>
                                                            </div><br/>
                                                            
                                                            <div id="Joined" class="payment-option-form">
                                                                <div class="inner">
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <label>Adult Price (13 years above):</label>
                                                                        <div class="input-group mb-15">
                                                                            <span class="input-group-addon">PHP</span>
                                                                            <input type="text" name="adult_price" class="form-control" />
                                                                        </div>
                                                                    </div>
                    
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="row gap-20">
                                                                            <div class="col-xsw-12 col-xs-12 col-sm-12 col-md-12">
                                                                                <label>Child Price (4 - 10 years):</label>
                                                                                <div class="input-group mb-15">
                                                                                    <span class="input-group-addon">PHP</span>
                                                                                    <input type="text" name="child_price" class="form-control" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                    
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="row gap-20">
                                                                            <div class="col-xsw-12 col-xs-12 col-sm-12 col-md-12">
                                                                                <label>Infant Price (3 years old below):</label>
                                                                                <div class="input-group mb-15">
                                                                                    <span class="input-group-addon">PHP</span>
                                                                                    <input type="text" name="infant_price" class="form-control" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div id="paymentOption" class="payment-option-wrapper">
                                                            <div class="col-xss-12 col-xs-6 col-sm-6 col-md-12">
                                                                <div class="radio-block">
                                                                    <input id="type1" name="type" type="radio" class="radio" value="Exclusive"/>
                                                                    <label class="" for="type1"><span>Exclusive Tour</span></label>
                                                                </div>
                                                            </div>
        
                                                            <div id="Exclusive" class="payment-option-form"><br>
                                                                <div class="inner">
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <label>Pax:</label>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <label>Price:</label>
                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="row gap-20">
                                                                            <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                                <div class="form-group form-spin-group">
                                                                                    <input type="text" class="form-control form-spin" name="pax1" placeholder="2">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                                <div class="input-group mb-15">
                                                                                    <span class="input-group-addon">PHP</span>
                                                                                    <input type="text" class="form-control" name="pax1_price" placeholder="3500">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="row gap-20">
                                                                            <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                                <div class="form-group form-spin-group">
                                                                                    <input type="text" class="form-control form-spin" name="pax2" placeholder="5">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                                <div class="input-group mb-15">
                                                                                    <span class="input-group-addon">PHP</span>
                                                                                    <input type="text" class="form-control" name="pax2_price" placeholder="4500">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="row gap-20">
                                                                            <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                                <div class="form-group form-spin-group">
                                                                                    <input type="text" class="form-control form-spin" name="pax3" placeholder="8">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                                <div class="input-group mb-15">
                                                                                    <span class="input-group-addon">PHP</span>
                                                                                    <input type="text" class="form-control" name="pax3_price" placeholder="6500">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="row gap-20">
                                                                            <div class="col-xsw-12 col-xs-12 col-sm-12 col-md-12">
                                                                                <label>Excess Person Price:</label>
                                                                                <div class="input-group mb-15">
                                                                                    <span class="input-group-addon">PHP</span>
                                                                                    <input type="text" name="excess_price" class="form-control" placeholder="350"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
        
                                                            <div class="clear"></div><br/>
                                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-12">
                                                                    <div class="radio-block">
                                                                        <input id="type2" name="type" type="radio" class="radio" value="Joined" checked/>
                                                                        <label class="" for="type2"><span>Joined Tour</span></label>
                                                                    </div>
                                                                </div><br/>
                                                            
                                                                <div id="Joined" class="payment-option-form-two">
                                                                    <div class="inner">
                                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                                            <label>Adult Price (13 years above):</label>
                                                                            <div class="input-group mb-15">
                                                                                <span class="input-group-addon">PHP</span>
                                                                                <input type="text" name="adult_price" class="form-control" value="{{$packages->adult_price}}"/>
                                                                            </div>
                                                                        </div>
                        
                                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                                            <div class="row gap-20">
                                                                                <div class="col-xsw-12 col-xs-12 col-sm-12 col-md-12">
                                                                                    <label>Child Price (4 - 10 years):</label>
                                                                                    <div class="input-group mb-15">
                                                                                        <span class="input-group-addon">PHP</span>
                                                                                        <input type="text" name="child_price" class="form-control" value="{{$packages->child_price}}" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                        
                                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                                            <div class="row gap-20">
                                                                                <div class="col-xsw-12 col-xs-12 col-sm-12 col-md-12">
                                                                                    <label>Infant Price (3 years old below):</label>
                                                                                    <div class="input-group mb-15">
                                                                                        <span class="input-group-addon">PHP</span>
                                                                                        <input type="text" name="infant_price" class="form-control" value="{{$packages->infant_price}}" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                            </div>
                                            
                                            <div class="mb-30"></div>
                                            
                                            <h4 class="section-title">Tour Detail</h4>
                                            <div class="col-xs-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Inclusions:</label>
                                                    <textarea type="text" name="inclusions" class="form-control" rows="3">{{$packages->inclusions}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Additional Information:</label>
                                                    <textarea type="text" name="add_info" class="form-control" rows="3">{{$packages->add_info}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Reminders:</label>
                                                    <textarea type="text" name="reminders" class="form-control" rows="3">{{$packages->reminders}}</textarea><br>
                                                </div>
                                            </div>

                                            <div class="mb-40"></div>
                                            
                                            <h4 class="section-title">Categories:</h4>
                                            <div class="col-xs-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Tags: </label>
                                                    <input type="text" class="form-control" name="categories[]" value="{{ $packages->categories }}" data-role="tagsinput" required/>
                                                </div>
                                            </div>
                                            <div class="mb-40"></div> <br></br>
                                            
                                            <div class="mb-25"></div>
                                            <div class="bb"></div>
                                            <div class="mb-25"></div>

                                            <div class="mb-50">
                                                
                                            <div class="mb-25"></div>

                                            <div class="col-xs-12 col-sm-12">
                                                <div class="form-group">
                                                    {{Form::file('photo', ['required' => 'required'])}}
                                                    {{Form::submit('Submit', ['class' => "btn btn-info btn-wide pull-right"])}}
                                                </div>
                                            
                                            </div><br>
                                        </div>
                                        {!!Form::close() !!}
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
    
<!-- start Back To Top -->
<div id="back-to-top">
    <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>
<!-- end Back To Top -->
@endsection
@extends('layouts.user.javascriptlayout')
<script>
    var categories = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('categories'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        
    });
</script>