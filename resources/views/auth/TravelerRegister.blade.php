@extends('layouts.user.login_headlayout')
<body class="transparent-header">
	<div id="introLoader" class="introLoading"></div>
	<div class="container-wrapper">
		<div class="main-wrapper scrollspy-container">
			<div class="breadcrumb-image-bg pb-100 no-bg" style="background-image:url('images/hero-header/04.jpg');">
				<div class="container">
					<div class="page-title">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
								<center><img src="{{ asset('uploads/files/logo-white-2.png') }}" style="width:300px"></center>
							</div>
						</div>
                    </div>
                    
					<div class="breadcrumb-wrapper">
						<ol class="breadcrumb">
							<li><a href="{{ url('/') }}">Home</a></li>
							<li class="active"><span>Traveler Sign Up</span></li>
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
										<div class="promo-box-02 mb-40">
											<div class="icon">
												<i class="ti-plus"></i>
											</div>
											
											<h4>Already have an account? Login now. </h4>
											
											<a href="{{ url('/TravelerLogin') }}" class="btn btn-default">Log in</a>
										</div>
										
										<h4 class="section-title">Sign Up As Traveler</h4>
										<div class="row">
										
										    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}

                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}"> 
                                                        <label for="fname">First Name</label>
                                                        <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autofocus>
                                                    </div>

                                                    @if ($errors->has('fname'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('fname') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}"> 
                                                        <label for="lname">Last Name</label>
                                                        <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required autofocus> 
                                                        
                                                        @if ($errors->has('lname'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('lname') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"> 
                                                        <label for="username">Username</label>
                                                            <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required>

                                                            @if ($errors->has('username'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('username') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
                                                </div>
                                                

                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group"> 
                                                        <label for="gender">Gender</label>
                                                           <div class="clear mb-5"></div>
                                                                <div class="radio-inline">
                                                                    <input id="male" name="gender" value="Male" type="radio" class="radio" />
                                                                    <label for="male">Male</label>
                                                                </div>
                                                                <div class="radio-inline">
                                                                    <input id="female" name="gender" value="Female" type="radio" class="radio"/>
                                                                    <label for="female">Female</label>
                                                                </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
                                                        <label for="email">Email Address</label>
                                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                           @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-md-12">
                                                    <div class="form-group{{ $errors->has('contact_no') ? ' has-error' : '' }}"> 
                                                        <label for="contact_no">Contact No.</label>
                                                            <input id="contact_no" type="text" class="form-control" name="contact_no" value="{{ old('contact_no') }}" required>

                                                           @if ($errors->has('contact_no'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('contact_no') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> 
                                                        <label for="password">Password</label>
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
                                                        <label for="password-confirm">Password Confirmation</label>
                                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}"> 
                                                        <label for="birthday">Birthday</label>
                                                            <input id="birthday" type="date" class="form-control" name="birthday" required>

                                                            @if ($errors->has('birthday'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('birthday') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-md-6">
                                                    <label for="photo">Profile Picture</label>
                                                    <input id="photo" name="photo" type="file" required>
                                                </div>
                                                <div class="col-sm-6 col-md-12">
                                                    <center>
                                                        <button type="submit" style="margin-top:2%" class="btn btn-info">Register</button>
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
			
		</div>
		
		<!-- end Footer Wrapper -->

	</div>
	
	<!-- end Container Wrapper -->
 
 
<!-- start Back To Top -->

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>
</body>
<!-- end Back To Top -->
 <!-- Core JS -->
@extends('layouts.user.login_javascriptlayout')
</html>