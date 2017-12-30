<html lang="{{ app()->getLocale() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Traventure') }}</title> 

            <nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">

				<div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<a href="index.html"><img src="{{ asset('images/navbar-logo.png') }}" alt="Logo" /></a>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper">
					
						<ul class="nav navbar-nav" id="responsive-menu">
                            <li>
								<a><i class="fa fa-user"></i> Hi, {{ Auth::user()->fname }} {{ Auth::user()->lname }}</a>
								<ul>
									<li>
										<a data-toggle="modal" href="#profile_modal">User Profile</a>
									</li>
									<li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
								</ul>
							</li>
							<li>
								<a href="{{ route('Traveler.Explore') }}">EXPLORE</a>
							</li>
							
							<li>
								<a href="{{ route('Traveler.Bookings') }}">BOOKINGS</a>
							</li>
							
							<li>
								<a href="{{ route('Traveler.Trips') }}">TRIPS</a>
							</li>
							
							<li>
								<a href="{{ route('Traveler.Favorites') }}">FAVORITES</a>
							</li>
							
							<li>
								<a href="{{ route('Traveler.ShowMessages') }}">MESSAGES</a>
							</li>
						</ul>
				
					</div><!--/.nav-collapse -->
				
				</div>
				
				<div id="slicknav-mobile"></div>
				
			</nav>

        <!--USER PROFILE MODAL-->
        <div id="profile_modal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" data-backdrop="static" data-keyboard="false" data-replace="true">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">User Profile</h4>
            </div>
            <div class="modal-body">
                <div class="row gap-20">
                    <div class="user-item-wrapper-01">
                        <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
                            <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
                                <div class="GridLex-col-12_sm-4_xs-12_xss-12">
                                    <div class="user-long-sm-item clearfix">
					
										<div class="image">
											<img src="/public/uploads/files/{{ Auth::user()->photo }}" class="img-circle" alt="images" />	
										</div>
										
										<div class="content">
                                            <div class="col-sm-12 col-md-12">
                                                <span class="labeling">Name: </span>
                                                <h4>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h4>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                 <div class="form-group"> 
                                                    <span class="labeling">Username: </span>
                                                    <h4>{{ Auth::user()->username }}</h4>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group"> 
                                                    <span class="labeling">Birthday: </span>
                                                    <h4>{{ Carbon\Carbon::parse(Auth::user()->birthday)->toFormattedDateString() }}</h4>
                                                </div>
                                            </div>
                                            

                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group"> 
                                                    <span class="labeling">Contact Number: </span>
                                                    <h4>{{ Auth::user()->contact_no }}</h4>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group"> 
                                                    <span class="labeling">Email Address: </span>
                                                    <h4>{{ Auth::user()->email }}</h4>
                                                </div>
                                            </div>

											{{--  <ul class="user-meta">
												<li>53 tours</li>
												<li>443 reviews</li>
												<li>8 awards</li>
											</ul>
											<a href="#">view profile <i class="ion-android-arrow-forward"></i></a>  --}}
										</div>
										
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <a href="#editProfile" type="button" class="btn btn-info btn-sm" data-toggle="modal">Edit</a>
                <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button>
            </div>
            
        </div>

        <!--USER EDIT MODAL-->
        
        <div id="editProfile" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" data-backdrop="static" data-keyboard="false" data-replace="true">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Edit Profile</h4>
            </div>
            <div class="modal-body">
                <div class="row gap-20">
                    <div class="user-item-wrapper-01">
                        <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
                            <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
                                <div class="GridLex-col-12_sm-4_xs-12_xss-12">
                                    <div class="user-long-sm-item clearfix">
                                        <form method="POST" action="{{ route('Traveler.UpdateProfile') }}" enctype="multipart/form-data">
										{{ csrf_field() }}
                                        <div class="image">
											<img src="/public/uploads/files/{{ Auth::user()->photo }}" class="img-circle" alt="images" />
										</div>
										
										<div class="content">
                                            <div class="col-sm-6 col-md-6">
                                                <span class="labeling" style="color:black">First Name: </span>
                                                <div class="form-group form-group-sm">
                                                    <input type="text" class="form-control" name="fname" value="{{ Auth::user()->fname }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                <span class="labeling" style="color:black">Last Name: </span>
                                                <div class="form-group form-group-sm">
                                                    <input type="text" class="form-control" name="lname" value="{{ Auth::user()->lname }}"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                 <div class="form-group"> 
                                                    <span class="labeling" style="color:black">Username: </span>
                                                    <div class="form-group form-group-sm">
                                                        <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group"> 
                                                    <span class="labeling" style="color:black">Birthday: </span>
                                                    <div class="form-group form-group-sm">
                                                        <input type="date" class="form-control" name="birthday" value="{{ Auth::user()->birthday }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group"> 
                                                    <span class="labeling" style="color:black">Contact Number: </span>
                                                    <div class="form-group form-group-sm">
                                                        <input type="text" class="form-control" name="contact_no" value="{{ Auth::user()->contact_no }}"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group form-group-sm"> 
                                                    <span class="labeling" style="color:black">Change Profile Picture: </span>
                                                    <div class="form-group form-group-sm">
                                                        <input type="file" name="photo"/>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <input type="submit" class="btn btn-info btn-sm" value="Save">
                <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button>
            </div>
            </form>
            
        </div>

        @yield('content')
        @yield('script')