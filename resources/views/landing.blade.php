@extends('layouts.user.login_headlayout')
<body class="home transparent-header">
	<div id="introLoader" class="introLoading"></div>
	<!-- start Container Wrapper -->
    
    <div class="container-wrapper">
            <div class="main-wrapper scrollspy-container">
            
                <!-- start hero-header -->
                <div class="hero img-bg-01">
                    <div class="container">
                            <center><img src="{{ asset('uploads/files/logo-white-2.png') }}" style="width:350px; margin-top:-10%">
								{{--  <p>Book. Chill. Venture.</p></center>  --}}
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
								<p>Certain but she but shyness why cottage. Gay the put instrument sir entreaties affronting. Pretended exquisite see cordially the you.</p>
							</div>
							
                                <p>Far concluded not his something extremity. Want four we face an he gate. On he of played he ladies answer little though nature. Blessing oh do pleasure as so formerly. Took four spot soon led size you. Outlived it received he material. Him yourself joy moderate off repeated laughter outweigh screened.</p>
                                <p>Or neglected agreeable of discovery concluded oh it sportsman. Week to time in john. Son elegance use weddings separate. Ask too matter formed county wicket oppose talent. He immediate sometimes or to dependent in. Everything few frequently discretion surrounded did simplicity decisively. Less he year do with no sure loud.</p>
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