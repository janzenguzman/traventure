@extends('layouts.user.headlayout')
<link href="{{asset ('css_user/messages.css') }}" type="text/css" rel="stylesheet">
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
								<h2>Messages</h2>
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
						<li><a>Messages</a></li>
						<li class="active">Inbox</li>
					</ol>
				</div>
			</div>
			
			
			<!-- end Breadcrumb -->
			<div class="pt-30 pb-50">
			
				<div class="container">

					<div class="row">
						
						<div class="col-xs-12 col-sm-4 col-md-3 mt-20">

							<aside class="sidebar-wrapper pr-15 pr-0-xs">
	
								<div class="common-menu-wrapper">
							
									<ul class="common-menu-list">
										
										<li class="active"><a href="{{ route('Traveler.ShowMessages') }}">
											@if($messagesCount != 0)
											<span class="badge pull-right">
												{{ $messagesCount }}
											</span>
											@endif
											Inbox</a>
											</li>
										<li><a href="{{ route('Traveler.SentMessages') }}">Sent</a></li>
										
									</ul>
									
								</div>
								
							</aside>
						
						</div>
						
						<div class="col-xs-12 col-sm-8 col-md-9 mt-20">
						
							<div class="dashboard-wrapper">
							
								<h4 class="section-title">Inbox</h4>
									@include('layouts.user.alerts')
									<div class="panel panel-default widget">
										<div class="panel-body">
											@if(count($messages) > 0)
											@foreach($messages as $message)
											<ul class="list-group">
												<li class="list-group-item">
													<div class="row">
														<div class="col-xs-2 col-md-2">
															<img src="/public/uploads/files/{{ $message->photo }}" class="img-circle img-responsive" alt="image" /></div>
														@if($message->status == 0)
														<div style="font-weight: bold; " class="col-xs-10 col-md-10">
															<div>
																<a>{{ $message->fname }} {{ $message->lname }}</a>
																<div class="mic-info">
																	Inquiry: <a href="/Traveler/TourPackage/{{$message->package_id}}">{{ $message->package_name }}</a> | Received: {{ Carbon\Carbon::parse($message->created_at)->toDayDateTimeString() }}
																</div>
															</div>
															<div class="comment-text">
																{{ str_limit($message->message, 80) }}
															</div>
															
															<div class="pull-right">
															
															<a data-toggle="modal" 
																		  data-id="{{ $message->id }} " 
																		  data-sender_email="{{ $message->sender_email }} " 
																		  data-receiver_email="{{ $message->receiver_email }} " 
																		  data-package_id=" {{$message->package_id}} "
																		  data-message=" {{$message->message}} "
																		  data-created_at=" {{ Carbon\Carbon::parse($message->created_at)->toDayDateTimeString() }} "
																		  data-fname=" {{$message->fname}} "
																		  data-lname=" {{$message->lname}} "
																		class="reply-modal btn btn-sm btn-hover btn-info"><span class="glyphicon glyphicon-share-alt" style="padding-right:3px;"></span>Reply</a>
															<a data-toggle="modal"
																		  data-id="{{ $message->id }} " 
																		  data-sender_email="{{ $message->sender_email }} " 
																		  data-receiver_email="{{ $message->receiver_email }} "
																		  data-package_id=" {{$message->package_id}} "
																		  data-message=" {{$message->message}} "
																		  data-created_at=" {{$message->created_at}} "
																		  class="delete-modal btn btn-sm btn-hover btn-danger"><span class="glyphicon glyphicon-remove" style="padding-right:3px;"></span>Delete</a>
															</div>
															
														</div>
														@else
														<div class="col-xs-10 col-md-10">
																<div>
																	<a>{{ $message->fname }} {{ $message->lname }}</a>
																	<div class="mic-info">
																		Inquiry: <a href="/Traveler/TourPackage/{{$message->package_id}}">{{ $message->package_name }}</a> | Received: {{ Carbon\Carbon::parse($message->created_at)->toDayDateTimeString() }}
																	</div>
																</div>
																<div class="comment-text">
																	{{ str_limit($message->message, 80) }}
																</div>
																
																<div class="pull-right">
																
																<a data-toggle="modal" 
																			  data-id="{{ $message->id }} " 
																			  data-sender_email="{{ $message->sender_email }} " 
																			  data-receiver_email="{{ $message->receiver_email }} " 
																			  data-package_id=" {{$message->package_id}} "
																			  data-message=" {{$message->message}} "
																			  data-created_at=" {{ Carbon\Carbon::parse($message->created_at)->toDayDateTimeString() }} "
																			  data-fname=" {{$message->fname}} "
																			  data-lname=" {{$message->lname}} "
																			class="reply-modal btn btn-sm btn-hover btn-info"><span class="glyphicon glyphicon-share-alt" style="padding-right:3px;"></span>Reply</a>
																<a data-toggle="modal"
																			  data-id="{{ $message->id }} " 
																			  data-sender_email="{{ $message->sender_email }} " 
																			  data-receiver_email="{{ $message->receiver_email }} "
																			  data-package_id=" {{$message->package_id}} "
																			  data-message=" {{$message->message}} "
																			  data-created_at=" {{$message->created_at}} "
																			  class="delete-modal btn btn-sm btn-hover btn-danger"><span class="glyphicon glyphicon-remove" style="padding-right:3px;"></span>Delete</a>
																</div>
																
															</div>
															@endif
													</div>
												</li>
											</ul>
											@endforeach
											@else
											<center><h2>Inbox is empty.</h2></center>
											<div class="pager-wrappper clearfix">
										
													<div class="pager-innner">
															
															<div class="clearfix">
																<nav class="pager-center">
																	<ul class="pagination">
																		{{$messages->links()}}
																	</ul>
																</nav>
															</div>
													</div>
													
												</div>
											@endif
												
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
	
</div>

<!--AJAX-->
<script>
	$(document).on('click', '.delete-modal', function() {
		$('.message_id').val($(this).data('id'));
		$('.sender_email').val($(this).data('sender_email'));
		$('.receiver_email').val($(this).data('receiver_email'));
		$('.package_id').val($(this).data('package_id'));
		$('.message').val($(this).data('message'));
		$('.created_at').val($(this).data('created_at'));
		$('.deleteContent').show();
		$('.form-horizontal').hide();
		$('.title-reply').hide();
		$('.title-delete').show();
		$('.footer-reply').hide();
		$('.footer-delete').show();
		$('.form-delete').show();
		$('#myModal').modal('show');
	});

	$(document).on('click', '.reply-modal', function() {
		$('.message_id').val($(this).data('id'));
		$('.fname').text($(this).data('fname'));
		$('.lname').text($(this).data('lname'));
		$('.sender_email').val($(this).data('sender_email'));
		$('.receiver_email').val($(this).data('receiver_email'));
		$('.package_id').val($(this).data('package_id'));
		$('.message').text($(this).data('message'));
		$('.created_at').text($(this).data('created_at'));
		$('.message_id').val($(this).data('id'));
		$('.title-reply').show();
		$('.title-delete').hide();
		$('.deleteContent').hide();
		$('.form-horizontal').show();
		$('.footer-reply').show();
		$('.footer-delete').hide();
		$('.form-delete').hide();
		$('#myModal').modal('show');
	});
</script>
@endsection
@extends('layouts.user.javascriptlayout')