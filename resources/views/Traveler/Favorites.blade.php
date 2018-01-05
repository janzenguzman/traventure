{{--  @extends('layouts.app')

@section('content')
<div class="container-fluid text-center">
    <div class="panel panel-default">
        <div class="panel-heading"><h1>My Favorites</h1></div>
        @if(count($favorites) > 0)
            <table class="table table-striped">
                <tr>
                    <th>Favorite ID</th>
                    <th>Package ID</th>
                    <th>Package Name</th>
                    <th>Information</th>
                    <th></th>
                </tr>
                @foreach($favorites as $favorite)
                    <tr id="fave{{$favorite->favorite_id}}">
                        <td>{{$favorite->favorite_id}}</td>
                        <td>{{$favorite->package_id}}</td>
                        <td>{{$favorite->package_name}}</td>
                        <td style="text-align:left;">
                            Pax: {{$favorite->pax}} <br>
                            Php {{number_format($favorite->price, 2)}} <br>
                            Services: {{$favorite->services}}
                        </td>
                        <td>
                            <button class="btn btn-danger del" value="{{$favorite->favorite_id}}">Unfavorite</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="panel-body">
                <p>You have no favorite packages yet.</p>
            </div>
        @endif
        {{$favorites->links()}}
    </div>
</div>  --}}

@extends('layouts.user.headlayout')
@section('content')
<div class="container-wrapper">

		<!-- start Header -->
		
		<header id="header">

			@extends('layouts.traveler-navbar')

		</header>
		
		<!-- end Header -->

		<!-- start Main Wrapper -->
		
		<div class="main-wrapper scrollspy-container">
		
			<!-- start Breadcrumb -->
			
			<div class="breadcrumb-image-bg" style="background-image:url({{ asset('images/breadcrumb-bg.jpg') }});">
				<div class="container">
                                                                                           
					<div class="page-title">
					
						<div class="row">
						
							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
								<h2>Favorites</h2>
							</div>
							
						</div>

					</div>
					
					<div class="breadcrumb-wrapper">
					
						<ol class="breadcrumb">
						</ol>
					
					</div>

				</div>
				
			</div>
			
			<div class="breadcrumb-wrapper">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="{{ route('Traveler.Explore') }}">Explore</a></li>
						<li class="active">Favorites</li>
					</ol>
				</div>
			</div>
			
			
			<!-- end Breadcrumb -->
			<div class="pt-30 pb-50">
			
				<div class="container">

					<div class="row">
						
						<div class="col-xs-12 col-sm-12 col-md-12 mt-20">
                            <div class="trip-list-wrapper no-bb-last">
                                    <div class="trip-list-item">
                                            <div class="image-absolute">
                                                <div class="image image-object-fit image-object-fit-cover">
                                                    <img src="images/trip/01.jpg" alt="image" >
                                                </div>
                                            </div>
                                            <div class="content">
                                            
                                                <div class="GridLex-gap-20 mb-5">
                            
                                                    <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
                                                    
                                                        <div class="GridLex-col-6_sm-12_xs-12_xss-12">
                                                            
                                                            <div class="GridLex-inner">
                                                                <h6>Hong Kong Best Highlight Explore</h6>
                                                                <span class="font-italic font14">5 days 4 nights</span>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="GridLex-col-3_sm-6_xs-7_xss-12">
                                                            <div class="GridLex-inner line-1 font14 text-muted spacing-1">
                                                                Travel date
                                                                <span class="block text-primary font16 font700 mt-1">24th-30th, Mar 2017</span>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="GridLex-col-3_sm-6_xs-5_xss-12">
                                                            <div class="GridLex-inner text-right text-left-xss dropdown">
                                                                <a href="#" class="btn btn-primary btn-sm">View</a>
                                                                <button class="btn btn-info btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Share</button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a href="#">Facebook</a></li>
                                                                    <li><a href="#">Twitter</a></li>
                                                                    <li><a href="#">Google Plus</a></li>
                                                                </ul>
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

			<div id="myModal" class="modal fade login-box-wrapper" role="dialog">
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">×</button>
				  <div class="title-reply">
				  <center><text class="modal-title fname"></text><text class="modal-title lname"></text></center>
				  </div>

				  	<div class="title-delete">
						<text class="modal-title">Delete</text>
					</div>
				</div>
				<div class="modal-body">
				  <form method="POST" action="{{ route('Traveler.ReplyMessage') }}" class="form-horizontal">
						{{ csrf_field() }}
					<div class="form-group">
						<div class="col-sm-12">
							<input type="hidden" name="message_id" class="text-primary message_id">
							<input type="hidden" class="text-primary receiver_email" name="sender_email">
							<input type="hidden" class="text-primary sender_email" name="receiver_email">
							<input type="hidden" class="text-primary package_id" name="package_id">
							<small style="font-weight:bold" class="pull-right created_at"></small>
							<small style="font-weight:bold;" class="pull-right"> Received: </small><br>
							<span style="font-weight:bold">MESSAGE:</span><br>
							<text type="text" class="message" style="font-size:15px"></text><br><br>
							<textarea id="form_message" name="message" class="form-control col-sm-12 col-md-12" required></textarea>
						</div>
					</div>
				</div>
					<div class="modal-footer footer-reply">
						<button type="button" data-dismiss="modal" class="btn btn-success">Close</button>
						<button type="submit" class="btn btn-info">Reply<button>
					</div>
				</form>
				
				<form method="POST" action="{{ route('Traveler.DeleteMessage')}}" class="form-delete">
						{{ csrf_field() }}
				  <div class="deleteContent" style="padding-left:5%; padding-bottom:5%">
					<h4 class="center">Are you Sure you want to delete this message?</h4>
					<input type="hidden" name="id" class="text-primary message_id"></h4>
					<input type="hidden" class="text-primary receiver_email" name="receiver_email">
					<input type="hidden" class="text-primary sender_email" name="sender_email">
					<input type="hidden" class="text-primary package_id" name="package_id">
					<input type="hidden" class="text-primary message" name="message">
					<input type="hidden" class="text-primary created_at" name="created_at">
				  </div>
					<div class="modal-footer footer-delete">
						<button type="button" data-dismiss="modal" class="btn btn-success">Close</button>
						<button type="submit" class="btn btn-danger">Delete</button>
					</div>
				</form>
			</div>
 
 
<!-- start Back To Top -->

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- end Back To Top -->
<script>
	var token = '{{ Session::token() }}';
	var urlUnFave = '{{ route('Traveler.unFavorite') }}';
</script>	
</div>
@endsection
@extends('layouts.user.javascriptlayout')

@section('js')
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
		}
		});
</script>
<script type="text/javascript">
	(function($) {
		console.log("HELLO WORLD");
		$(".del").on('click', function(){
			var deleteFave = $(this).val();
			console.log(deleteFave);
			var $t = $(this);
			$.ajax({
				type: 'POST',
				url: urlUnFave,
				data: { deleteFave: deleteFave, token: token },
				success: function(data){
					console.log(data,'Success na gud!');
					$t.text('Favorite');
					$('#fave'+ deleteFave).remove();
				},
				error: function (data) {
					console.log("ERROR!!! ERROR:", data);
				}
			})
				.done(function(){
					//alert("DONE");
				});
		});
	}(jQuery));
</script>
@endsection
