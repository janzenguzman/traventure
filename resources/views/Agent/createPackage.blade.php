@extends('layouts.user.headlayout')

@section('content')
<body class="transparent-header">
    <div id="introLoader" class="introLoading"></div>
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
            <div class="breadcrumb-image-bg pb-100 no-bg" style="background-image:url({{asset('/uploads/files/osmena.jpg')}});">
                <div class="container">
                    <div class="page-title">                    
                        <div class="row">                        
                            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">                            
                                <h2>Create Tour Package</h2>
                                {{--  <p>Celebrated no he decisively thoroughly.</p>  --}}
                            </div>                            
                        </div>
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
                                        <h4 class="section-title">About this tour</h4>
                                        {{--  <p>Fill in the form to successfully make</p>  --}}
                                        <div class="row">
                                            {!!Form::open(['action' => 'AgentsController@storePackage', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                <div class="col-xs-12 col-sm-12 col-md-12">    
                                                    <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label>Tour Package Name:</label>       
                                                            <input type="text" name="package_name" class="form-control" placeholder="Tour Package Name" required/>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row gap-20">
                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group form-spin-group">
                                                                <label>Day/s:</label>       
                                                                <input type="text" value="1" name="days" class="form-control form-spin" min="1" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <br>
                                                    <h4 class="section-title">Service Type</h4>

                                                    <div id="paymentOption" class="payment-option-wrapper">
                
                                                        <div class="row">
                                                        
                                                            <div class="col-sm-12">
                                                            
                                                                <div class="radio-block">
                                                                    <input id="service1" name="type" type="radio" class="radio" value="Exclusive"/>
                                                                    <label class="" for="service1"><span>Exclusive Tour</span></label>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>

                                                        <div id="Exclusive" class="payment-option-form">
                                                        
                                                            <div class="inner">
                                                            
                                                        <br />
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
                                                                                <input type="text" class="form-control" name="pax2_price" placeholder="5500">
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
                                                                                <input type="text" class="form-control" name="pax3_price" placeholder="7000">
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
                                                                                <input type="text" name="excess_price" class="form-control" placeholder="350" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            
                                                        </div>

                                                        <div class="clear"></div><br />
                                                            
                                                        <div class="row">

                                                            <div class="col-sm-12">

                                                                <div class="radio-block">
                                                                    <input id="service2" name="type" type="radio" class="radio" value="Joined"/>
                                                                    <label class="" for="service2"><span>Joined Tour</span></label>
                                                                </div>

                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <br />
                                                        
                                                        <div id="Joined" class="payment-option-form">
                                                            <div class="inner">
                                                            
                                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                                    <label>Adult Price (13 years above):</label>
                                                                    <div class="input-group mb-15">
                                                                        <span class="input-group-addon">PHP</span>
                                                                        <input type="text" name="adult_price" class="form-control" placeholder="800" />
                                                                    </div>
                                                                </div>
                
                                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                                    <div class="row gap-20">
                                                                        <div class="col-xsw-12 col-xs-12 col-sm-12 col-md-12">
                                                                            <label>Child Price (4 - 10 years):</label>
                                                                            <div class="input-group mb-15">
                                                                                <span class="input-group-addon">PHP</span>
                                                                                <input type="text" name="child_price" class="form-control" placeholder="400" />
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
                                                                                <input type="text" name="infant_price" class="form-control" placeholder="150"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="mb-30"></div>
                                            
                                            <h4 class="section-title">Tour Detail</h4>

                                            <div class="col-xs-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Inclusions:</label>
                                                    <textarea type="text" name="inclusions" class="form-control" rows="3" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Additional Information:</label>
                                                    <textarea type="text" name="add_info" class="form-control" rows="3" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Reminders:</label>
                                                    <textarea type="text" name="reminders" class="form-control" rows="3" required></textarea><br>
                                                </div>
                                            </div>

                                            <div class="mb-40"></div>
                                            
                                            <h4 class="section-title">Categories:</h4>

                                            <div class="col-xs-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Tags: </label>
                                                    {{--  <input type="text" class="form-control" name="categories[]" id="autocompleteTagging2" placeholder="" />  --}}
                                                    <input type="text" class="form-control" name="categories[]" data-role="tagsinput" required />
                                                </div>
                                            </div>
                                            <div class="mb-40"></div>  
                                                <br></br>
                                            
                                        <div class="mb-25"></div>
                                        <div class="bb"></div>
                                        <div class="mb-25"></div>

                                        <div class="mb-50">
                                            
                                            <div class="mb-25"></div>

                                            <div class="col-xs-12 col-sm-12">
                                                <div class="form-group">
                                                    {{--  <div id="file-submit" class="dropzone">
                                                        <input name="photo" type=f"file" required>
                                                        <div class="dz-default dz-message"><span>Click or Drop Image Here</span></div>
                                                    </div>  --}}

                                                    {{Form::file('photo', ['required' => 'required'])}}
                                                    {{--  <input type="submit" class="btn btn-info btn-wide pull-right" style="margin-bottom: 5%">  --}}
                                                    {{Form::submit('Submit', ['class' => "btn btn-info btn-wide pull-right"])}}
                                                </div>
                                            
                                            </div> <br>
                                            {{--  <a href="requested-create-done.html" class="btn btn-primary btn-wide">Submit</a>  --}}

                                            {{--  <a href="#" class="btn btn-primary btn-wide btn-border">Save as draft</a>  --}}
                                            

                                        </div>
                                            {!!Form::close() !!}
                                    </div>
                                </div>
                                
                            </div>
                        
                        </div>
                        
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
<script type="text/javascript">
</script>
<!-- end Back To Top -->
@endsection
@extends('layouts.user.javascriptlayout')
<script>
    var categories = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('categories'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        
    });
</script>
