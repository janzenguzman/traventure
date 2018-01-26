{{--  @extends('layouts.app')

@section('content')
<style>
    .foo {
    width: 100px;
}
</style>
    <h1>Add a Tour Package</h1>
    {!!Form::open(['action' => 'AgentsController@storePackage', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            <label>Name of the Tour Package:</label>       
            <input type="text" name="package_name" class="form-control" placeholder="Going South">
        </div>
        <div class="form-group">
            <label>Days:</label>       
            <input type="text" name="days" class="form-control" placeholder="No. of days">
        </div>
        <div class="form-group">
            <label>Adult Price (11 years above):</label>
            <input type="text" name="adult_price" class="form-control" placeholder="PHP">
        </div>
        <div class="form-group">
            <label>Child Price (4 - 10 years):</label>
            <input type="text" name="child_price" class="form-control" placeholder="PHP">
        </div>
        <div class="form-group">
            <label>Infant Price (3 years old below):</label>
            <input type="text" name="infant_price" class="form-control" placeholder="PHP">
        </div>
        <div class="form-group">
             <label>Excess Person Price:</label>
            <input type="text" name="excess_price" class="form-control" placeholder="PHP">
        </div>
        <div class="form-group">
            <label>Services:</label>
        </div>
        <div class="form-group">
            <label>Exclusive Tour:</label>
            <input type="checkbox" name="type" value="Exclusive">
        </div>
        <div>
            <label>Pax:</label>
        </div>
        <div>
            <input type="text" name="pax1" class="foo" placeholder="2">
            <input type="text" name="pax1_price" class="foo" placeholder="5500">
        </div>
        <div>
            <input type="text" name="pax2" class="foo" placeholder="6">
            <input type="text" name="pax2_price" class="foo" placeholder="8000">
        </div>
        <div>
            <input type="text" name="pax3" class="foo" placeholder="12">
            <input type="text" name="pax3_price" class="foo" placeholder="10500">
        </div>
        <div class="form-group">
            <label>Joined Tour:</label>
            <input type="checkbox" name="type" value="Joined">   
        </div>
        <div class="form-group">
            <label>Inclusions:</label>
            <input type="text" name="inclusions" class="form-control" placeholder="Text box..">  
        </div>
        <div class="form-group">
            <label>Additional Information:</label>
            <input type="text" name="add_info" class="form-control" placeholder="Text box..">
        </div>
        <div class="form-group">
            <label>Reminders:</label>
            <input type="text" name="reminders" class="form-control" placeholder="Text box..">
        </div>
        <div>
            <label>Categories:</label>
        </div>
        <div class="form-group">      
            <input type="checkbox" name="categories[]" value="Mountain" class="foo">Mountain
        </div>
        <div class="form-group">       
            <input type="checkbox" name="categories[]" value="Sea" class="foo">Sea
        </div>
        <div class="form-group">       
            <input type="checkbox" name="categories[]" value="Forest" class="foo">Forest
        </div> 
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
                                <h2>Create Tour Package</h2>
                                {{--  <p>Celebrated no he decisively thoroughly.</p>  --}}
                            </div>                            
                        </div>
                    </div>                    
                    <div class="breadcrumb-wrapper">                    
                        <ol class="breadcrumb">
                            <li><a href="/Agent/Packages">Home</a></li>
                            <li class="active"><span>Create Tour Package</span></li>
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
                                        <h4 class="section-title">About this tour</h4>
                                        {{--  <p>Fill in the form to successfully make</p>  --}}
                                        <div class="row">
                                            {!!Form::open(['action' => 'AgentsController@storePackage', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                <div class="col-xs-12 col-sm-12 col-md-12">    
                                                    <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label>Tour Package Name:</label>       
                                                            <input type="text" name="package_name" class="form-control" placeholder="Tour Package Name" />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row gap-20">
                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group form-spin-group">
                                                                <label>Day/s:</label>       
                                                                <input type="text" value="1" name="days" class="form-control form-spin" placeholder="How many Days?" value="1" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-12">

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

                                                        <br />

                                                        <div id="Exclusive" class="payment-option-form">
                                                        
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
                                                                                <input type="text" class="form-control form-spin" name="pax1" placeholder="Maximum People">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                            <div class="input-group mb-15">
                                                                                <span class="input-group-addon">PHP</span>
                                                                                <input type="text" class="form-control" name="pax1_price" placeholder="/person">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                    <div class="row gap-20">
                                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                            <div class="form-group form-spin-group">
                                                                                <input type="text" class="form-control form-spin" name="pax2" placeholder="Maximum People">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                            <div class="input-group mb-15">
                                                                                <span class="input-group-addon">PHP</span>
                                                                                <input type="text" class="form-control" name="pax2_price" placeholder="/person">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                    <div class="row gap-20">
                                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                            <div class="form-group form-spin-group">
                                                                                <input type="text" class="form-control form-spin" name="pax3" placeholder="Maximum People">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
                                                                            <div class="input-group mb-15">
                                                                                <span class="input-group-addon">PHP</span>
                                                                                <input type="text" class="form-control" name="pax3_price" placeholder="/person">
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
                                                                                <input type="text" name="excess_price" class="form-control" />
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
                
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="mb-30"></div>
                                            
                                            <h4 class="section-title">Tour Detail</h4>

                                            <div class="col-xs-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Inclusions:</label>
                                                    <textarea type="text" name="inclusions" class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Additional Information:</label>
                                                    <textarea type="text" name="add_info" class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Reminders:</label>
                                                    <textarea type="text" name="reminders" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-40"></div>
                                            
                                            <h4 class="section-title">Categories:</h4>

                                            <div class="row checkbox-wrapper">
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="beach" value="Beach" name="categories[]" type="checkbox" class="checkbox"/>
                                                        <label class="" for="beach">Beach</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="city" value="City Tour" name="categories[]" type="checkbox" class="checkbox"/>
                                                        <label class="" for="city">City Tour</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="historical" value="Historical" name="categories[]" type="checkbox" class="checkbox"/>
                                                        <label class="" for="historical">Historical</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="island" value="Island Hopping" name="categories[]" type="checkbox" class="checkbox"/>
                                                        <label class="" for="island">Island Hopping</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="mountains" value="Mountains" name="categories[]" type="checkbox" class="checkbox"/>
                                                        <label class="" for="mountains">Mountains</label>
                                                    </div>
                                                </div>
                                                <div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
                                                    <div class="checkbox-block">
                                                        <input id="waterfalls" value="Waterfalls" name="categories[]" type="checkbox" class="checkbox"/>
                                                        <label class="" for="waterfalls">Waterfalls</label>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                        <div class="mb-25"></div>
                                        <div class="bb"></div>
                                        <div class="mb-25"></div>

                                        <div class="mb-50">

                                            <div class="form-group">
                                                {{Form::file('photo', ['required' => 'required'])}}
                                            </div>
                                            {{Form::submit('Submit', ['class' => "btn btn-primary btn-wide" ])}}

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
        
        <!-- end Main Wrapper -->
        
        <!-- start Footer Wrapper -->
        
        <div class="footer-wrapper scrollspy-footer">
        
            <footer class="main-footer">
            
                <div class="container">
                
                    <div class="row">
                    
                        <div class="col-sm-12 col-md-4">
                        
                            <h5 class="footer-title">newsletter</h5>
                            
                            <p class="font16">Subsribe to get our latest updates and oeffers</p>
                            
                            <div class="footer-newsletter">
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="enter your email " />
                                    <button class="btn btn-primary">subsribe</button>
                                </div>
                                
                                <p class="font-italic font13">*** Don't worry, we wont spam you!</p>
                            
                            </div>

                        </div>
                        
                        <div class="col-sm-12 col-md-8">
                        
                            <div class="row">
                                
                                <div class="col-xs-12 col-sm-4 col-md-3 col-md-offset-3 mt-25-sm">
                                    <h5 class="footer-title">footer</h5>
                                    <ul class="footer-menu">
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">Advertise</a></li>
                                        <li><a href="#">Media Relations</a></li>
                                        <li><a href="#">Affiliates</a></li>
                                        <li><a href="#">Careers</a></li>
                                    </ul>
                                </div>
                                
                                <div class="col-xs-12 col-sm-4 col-md-3 mt-25-sm">
                                    <h5 class="footer-title">quick  links</h5>
                                    <ul class="footer-menu">
                                        <li><a href="#">Media Relations</a></li>
                                        <li><a href="#">Affiliates</a></li>
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">Advertise</a></li>
                                    </ul>
                                </div>
                                
                                <div class="col-xs-12 col-sm-4 col-md-3 mt-25-sm">
                                
                                    <h5 class="footer-title">helps</h5>
                                    <ul class="footer-menu">
                                        <li><a href="#">Using a Tour</a></li>
                                        <li><a href="#">Submitting a Tour</a></li>
                                        <li><a href="#">Managing My Account</a></li>
                                        <li><a href="#">Merchant Help</a></li>
                                        <li><a href="#">White Label Website</a></li>
                                    </ul>
                                
                                </div>

                            </div>

                        </div>
                        
                    </div>
                    
                </div>
                
            </footer>
            
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
