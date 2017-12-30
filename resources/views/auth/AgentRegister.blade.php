@extends('layouts.user.login_headlayout')
<body class="transparent-header">

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
							
								<center><img src="{{ asset('uploads/files/logo-white.png') }}" style="width:300px">
                                <p>Book. Chill. Venture</p></center>
						
							</div>
							
						</div>

					</div>
					
					<div class="breadcrumb-wrapper">
					
						<ol class="breadcrumb">
							<li><a href="{{ url('/') }}">Home</a></li>
							<li class="active"><span>Travel Agent Sign Up</span></li>
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
											
											<h4>Already have an account? Login now. </h4>
											
											<a href="{{ url('/AgentLogin') }}" class="btn btn-default">Log In</a>
                                        </div>

										<h4 class="section-title">Sign Up As Travel Agent</h4>
                                        @include('layouts.user.alerts')
                                        
                                        <h4>Reminders:</h4>
                                            <div class="col-sm-12 col-md-12">
                                                <ul style="list-style-type:disc">
                                                    <li>After signing up, please wait for an email from the admin for other
                                                        accreditation requirements.</li>
                                                    <li>If your sign up request is accepted, you  may now access your account.</li><br>
                                                </ul>
                                            </div>
                                            
                                        <h4>Commission Payment Procedure:</h4>
                                            <div class="col-sm-12 col-md-12">
                                                <ul style="list-style-type:disc">
                                                    <li>The Company must pay 15% of the total sales every 15'th of the month to Traventure.</li>
                                                </ul>
                                            </div>
                                        <br><br><h4 class="section-title"></h4>
										<div class="row">
										    <form method="POST" action="{{ route ('agents-register') }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}

                                                <div class="col-sm-12 col-md-12">
                                        
                                                    <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}"> 
                                                        <label>Company Name</label>
                                                        <input id="company_namee" type="text" class="form-control`" name="company_name" required autofocus>

                                                        @if ($errors->has('company_name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('company_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                
                                                </div>
                                                
                                                <div class="col-sm-6 col-md-6">
                                                
                                                    <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}"> 
                                                        <label>First Name</label>
                                                        <input id="fname" type="text" class="form-control" name="fname" required autofocus>
                                                        
                                                        @if ($errors->has('fname'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('fname') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                
                                                </div>

                                                <div class="col-sm-6 col-md-6">
                                                
                                                    <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}"> 
                                                        <label>Last Name</label>
                                                        <input id="lname" type="text" class="form-control" name="lname" required autofocus>
                                                        
                                                        @if ($errors->has('lname'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('lname') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                
                                                </div>

                                                <div class="col-sm-6 col-md-6">
                                                
                                                    <div class="form-group{{ $errors->has('job_position') ? ' has-error' : '' }}"> 
                                                        <label>Job Position</label>
                                                        <input id="job_position" type="text" class="form-control" name="job_position" required autofocus>
                                                        
                                                        @if ($errors->has('job_position'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('job_position') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                
                                                </div>

                                                <div class="col-sm-6 col-md-6">
                                                
                                                    <div class="form-group{{ $errors->has('contact_no') ? ' has-error' : '' }}"> 
                                                        <label>Contact No.</label>
                                                        <input id="contact_no" type="text" class="form-control" name="contact_no" value="{{ old('contact_no') }}" required>

                                                            @if ($errors->has('contact_no'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('contact_no') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
                                                
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                
                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
                                                        <label>Email Address</label>
                                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
                                                
                                                </div>

                                                <div class="col-sm-6 col-md-6">
                                                
                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> 
                                                        <label>Password</label>
                                                        <input id="password" type="password" class="form-control" name="password" required>

                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
                                                
                                                </div>

                                                <div class="col-sm-6 col-md-6">
                                                
                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> 
                                                        <label>Confirm Password</label>
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                    </div>
                                                
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                    <label for="photo">Profile Picture</label>
                                                    <input id="photo" name="photo" type="file" required>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <center>
                                                        <button type="submit" class="btn btn-info">Sign Up</button>
                                                    </center>
                                                </div>
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