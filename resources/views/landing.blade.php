@extends('layouts.user.login_headlayout')
<body class="home transparent-header">
	<div id="introLoader" class="introLoading"></div>
    <div class="container-wrapper">
            <div class="main-wrapper scrollspy-container">
                <div class="hero img-bg-01">
                    <div class="container">
                            <center><img src="{{ asset('uploads/files/logo-white-2.png') }}" style="width:350px; margin-top:-10%">
                            <a href="{{ url('TravelerLogin') }}" class="btn btn-sm btn-info">TRAVELER</a>
                            <a href="{{ url('AgentLogin') }}" class="btn btn-sm btn-info">TRAVEL AGENT</a>
                        </center>
                    </div>
                </div>
            </div>

        	<!--ABOUT-->
            <div class="pt-50 pb-60">
				<div class="container">
					<div class="row mb-30">
						<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						    <div class="section-title">
                                <h2 class="text-uppercase">About Us</h2>
								{{--  <p>Certain but she but shyness why cottage. Gay the put instrument sir entreaties affronting. Pretended exquisite see cordially the you.</p>  --}}
							</div>
							
                                <p>Founded in 2017, the aim of Traventure is to establish an environment where the people can belong when they travel by being linked
										and connected to particular cultures and enjoying unique travel experiences. Its community emporium grants access to thousands of 
										exclusive, uncommon and particular accommodations that is related to travelling in more than 7,107 islands here in the Philippines.</p>
                                <p>From beautiful beaches, to astonishing mountains, appealing cities and more, Traventure offers a broad variety of unique
								accommodations for your next trip. Whether you're searching a beach for a brief getaway, or astounding mountains to camp and hike to,
								Traventure can help you find and book what you desire.</p>
						</div>
					</div>
				</div>

				<div id="back-to-top">
						<a href="#"><i class="ion-ios-arrow-up"></i></a>
				</div>

                <!--siargao header-->
                <div class="featured-bg" style="background-image:url({{asset('images/hero-header/07.jpg')}});">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <h2>&nbsp</h2>
							</div>
						</div>
					</div>
				</div>
				
                <!--the team-->
				<div class="container pt-60">
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
							<div class="section-title">
								<h2>The Team</h2>
							</div>
						</div>
					</div>

					<div class="team-wrapper">
						<div class="GridLex-gap-30">
							<div class="GridLex-grid-noGutter-equalHeight">
								<div class="GridLex-col-4_sm-6_xs-12">
									<div class="team-item">
										<div class="image">
											<img src="{{asset('uploads/files/janzen.jpg')}}" alt="Team" />
										</div>
										
                                        <!--janzen guzman-->
										<div class="content">
											<h4>Janzen Guzman</h4>
											<p>Backend Developer</p>
										</div>
									</div>
								</div>
								
								<div class="GridLex-col-4_sm-6_xs-12">
									<div class="team-item">
										<div class="image">
											<img src="{{asset('uploads/files/ariel.jpg')}}" alt="Team" />
										</div>
										
                                        <!--ariel leonado-->
										<div class="content">
											<h4>Ariel Cates Leonado</h4>
											<p>Backend Developer</p>
										</div>
									</div>
								</div>
								
								<div class="GridLex-col-4_sm-6_xs-12">
									<div class="team-item">
										<div class="image">
											<img src="{{asset('uploads/files/alex.jpg')}}" alt="Team" />
										</div>
										
                                        <!--alex ramas-->
										<div class="content">
											<h4>Alexander Prince Ramas</h4>
											<p>Backend Developer</p>
										</div>
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

 <!-- Core JS -->
@extends('layouts.user.login_javascriptlayout')