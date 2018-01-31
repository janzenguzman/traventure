@extends('layouts.user.login_headlayout')
<body class="transparent-header">
	<div id="introLoader" class="introLoading"></div>

	<!-- start Container Wrapper -->
	<div class="container-wrapper">
		<!-- start Main Wrapper -->
		
		<div class="main-wrapper scrollspy-container">
		
			<!-- start breadcrumb -->
			
			<div class="breadcrumb-image-bg pb-100 no-bg" style="background-image:url('images/hero-header/04.jpg');">
				<div class="container">

					<div class="page-title">
					
						<div class="row">
						
							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
							
								<center><img src="{{ asset('uploads/files/logo-white-2.png') }}" style="width:300px">
								<p>Book. Chill. Venture</p></center>
						
							</div>
							
						</div>

					</div>
					
					<div class="breadcrumb-wrapper">
					
						<ol class="breadcrumb">
							<li><a href="{{ url('/') }}">Home</a></li>
							<li class="active"><span>Traveler Login</span></li>
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
										<div class="promo-box-02 mb-40">
											<div class="icon">
												<i class="ti-plus"></i>
											</div>
											
											<h4>No traveler account? Sign-up now. It's free. </h4>
											
											<a href="{{ url('TravelerRegister') }}" class="btn btn-default">Sign Up</a>
										</div>
										
										<h4 class="section-title">Login As Traveler</h4>
										<div class="row">
										
										    <form method="POST" action="{{ route('login') }}">
                                                {{ csrf_field() }}

                                                <div class="col-sm-12 col-md-12">
                                        
                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
                                                        <label>Email Address</label>
                                                        <input id="email" class="form-control" name="email" placeholder="Your Email Address" type="email" required autofocus> 

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                
                                                </div>
                                                
                                                <div class="col-sm-12 col-md-12">
                                                
                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> 
                                                        <label>Password</label>
                                                        <input id="password" class="form-control" name="password" placeholder="Your Password" type="password"> 
                                                        
                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                
                                                </div>
                                                
                                                {{--  <div class="col-sm-6 col-md-6">
                                                    <div class="checkbox-block"> 
                                                        <input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
                                                        <label class="" for="remember_me_checkbox">Remember me</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="login-box-link-action">
                                                        <a data-toggle="modal" href="#forgotPasswordModal" class="block line18 mt-1">Forgot password?</a> 
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="login-box-box-action">
                                                        No account? <a data-toggle="modal" href="#registerModal">Register</a>
                                                    </div>
												</div>  --}}
												
												
                                                
                                                <center>
                                                    <button type="submit" class="btn btn-info">Log-in</button>
                                                </center>
                                            </div>
                                        </form>
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
		
		<!-- end Footer Wrapper -->

	</div>
	
	<!-- end Container Wrapper -->
 
 
<!-- start Back To Top -->

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- end Back To Top -->
 <!-- Core JS -->
@extends('layouts.user.login_javascriptlayout')
</html>
</body>