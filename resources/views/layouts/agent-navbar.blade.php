<?php
    $countBookings = DB::table('bookings')
                    ->join('packages', 'bookings.package_id', '=', 'packages.package_id')
                    ->where([['packages.agent_id', auth()->user()->id], ['bookings.status', 'Confirmed'], 
                            ['bookings.expired', '=', '0']])
                    ->count();
    $countMessages = DB::table('messages')
                    ->where([['receiver_email', auth()->user()->email],['status', 0]])
                    ->count();
?>  
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <meta name="token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Traventure') }}</title> 

            <nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">

				<div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<a href="/Agent/Packages"><img src="{{ asset('images/navbar-logo.png') }}" alt="Logo" /></a>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper">
					
						<ul class="nav navbar-nav" id="responsive-menu">
                            <li>
								<a><i class="fa fa-user"></i> Hi, {{ Auth::user()->fname }} {{ Auth::user()->lname }} </a>
								<ul>
									<li>
										<a data-toggle="modal" href="#profile_modal"><i class="fa fa-user"></i> User Profile</a>
                                    </li>
                                    <li>
                                        <a data-toggle="modal" href="#changepass_modal"><i class="fa fa-key"></i> Change Password</a>
                                    </li>
									<li><a href="{{ route('Agent.Logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i>
                                            Logout</a>
                                    <form id="logout-form" action="{{ 'App\Agents' == Auth::getProvider()->getModel() ?  route('Agent.Logout'): route('logout') }}" method="POST" style="display: none">
                                                {{ csrf_field() }}
                                    </form>
                                    </li>
								</ul>
							</li>
							<li>
								<a href="{{ route('Agent.Packages') }}">PACKAGES</a>
							</li>
							
							<li>
								<a href="{{ route('Agent.Bookings') }}">BOOKINGS
                                    @if($countBookings != 0)
                                        <span class="badge">
                                                {{ $countBookings }}
                                        </span>
                                    @endif
                                </a>
							</li>
							
							<li>
								<a href="{{ route('Agent.ShowMessages') }}">MESSAGES 
                                    @if($countMessages != 0)
                                        <span class="badge">
                                            {{$countMessages}}
                                        </span>
                                    @endif
                                </a>
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
                                            <div class="col-sm-12 col-md-6">
                                                <span class="labeling">Company Name: </span>
                                                <h4>{{ Auth::user()->company_name }}</h4>
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <span class="labeling">Name: </span>
                                                <h4>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h4>
                                            </div>

                                            <div class="col-sm-12 col-md-12">
                                                    <span class="labeling">Office Address: </span>
                                                    <h4>{{ Auth::user()->office_address }}</h4>
                                                </div>

                                            <div class="col-sm-6 col-md-6">
                                                    <span class="labeling">Job Position: </span>
                                                    <h4>{{ Auth::user()->job_position }}</h4>
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

                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group"> 
                                                    <span class="labeling">Date Joined: </span>
                                                    <h4>{{ Carbon\Carbon::parse(Auth::user()->created_at)->toFormattedDateString() }}</h4>
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
                <a href="/Agent/EditProfile" type="button" class="btn btn-info btn-sm">Edit</a>
                <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button>
            </div>
            
        </div>
        
        <!--CHANGE PASS MODAL-->
        <div id="changepass_modal" class="modal fade login-box-wrapper">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Change Password</h4>
            </div>
            <div class="modal-body">
                <div class="row gap-20">
                    <div class="user-item-wrapper-01">
                        <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
                            <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
                                <div class="GridLex-col-12_sm-4_xs-12_xss-12">
                                    <div class="user-long-sm-item clearfix">
                                        <form method="POST" action="{{ route('Agent.ChangePass') }}">
                                            
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group form-group-sm">
                                                        <label>Current Password: </label>
                                                        <input type="password" class="form-control" name="old_pass" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group form-group-sm">
                                                        <label>New Password: </label>
                                                        <input type="password" class="form-control" name="new_pass" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group form-group-sm">
                                                        <label>Confirm New Password: </label>
                                                        <input type="password" class="form-control" name="confirm_pass" required>
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
                <input type="submit" class="btn btn-info btn-sm" value="Save"/>
                <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button>
            </div>
        </div>
        </form>
        <!--CHANGE PASS MODAL-->
    </div>
@yield('content')
@yield('script')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
</script>