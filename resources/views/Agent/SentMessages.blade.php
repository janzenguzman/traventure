@extends('layouts.user.headlayout')

<link href="{{asset ('css_user/messages.css') }}" type="text/css" rel="stylesheet">
@section('content')
<body class="transparent-header">
<div id="introLoader" class="introLoading"></div>
<div class="container-wrapper">

		<!-- start Header -->
		
		<header id="header">
            @extends('layouts.agent-navbar')
		</header>
		
		<!-- end Header -->

		<!-- start Main Wrapper -->
		
		<div class="main-wrapper scrollspy-container">
		
			<!-- start Breadcrumb -->
			
			<div class="breadcrumb-image-bg" style="background-image:url({{asset('/uploads/files/osmena.jpg')}});">
				<div class="container">
                                                                                           
					<div class="page-title">
					
						<div class="row">
						
							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                                <br><br>
                                <h2>Messages</h2>
                                <br>
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
                        <li><a href="{{ route('Agent.Packages') }}">Packages</a></li>
                        <li>Messages</li>
						<li class="active">Sent</li>
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
                                            
                                            <li><a href="{{ route('Agent.ShowMessages') }}">
                                                @if($messagesCount != 0)
                                                <span class="badge pull-right">
                                                    {{ $messagesCount }}
                                                </span>
                                                @endif
                                                Inbox</a>
                                                </li>
                                            <li class="active"><a href="{{ route('Agent.SentMessages') }}">Sent</a></li>
                                            
                                        </ul>
                                        
                                    </div>
                                    
                                </aside>
                            
                            </div>
                            
                            <div class="col-xs-12 col-sm-8 col-md-9 mt-20">
                            
                                <div class="dashboard-wrapper">
                                
                                    <h4 class="section-title">Sent Messages</h4>
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
                                                            <div class="col-xs-10 col-md-10">
                                                                <div>
                                                                    <a>{{ $message->fname }} {{ $message->lname }}</a>
                                                                    <div class="mic-info">
                                                                        Inquiry: <a href="/Traveler/TourPackage/{{$message->package_id}}">{{ $message->package_name }}</a> | Received: {{ Carbon\Carbon::parse($message->created_at)->toDayDateTimeString() }}
                                                                    </div>
                                                                </div>
                                                                <div class="comment-text">
                                                                        {{str_limit($message->message, 80) }}
                                                                </div>
                                                                
                                                                <div class="pull-right">
                                                                <a data-toggle="modal" data-target="#deleteModal(" 
                                                                              data-id="{{ $message->id }} " 
                                                                              data-sender_email="{{ $message->sender_email }} " 
                                                                              data-receiver_email="{{ $message->receiver_email }} " 
                                                                              data-package_id=" {{$message->package_id}} "
                                                                              data-message=" {{$message->message}} "
                                                                              data-created_at=" {{$message->created_at}} "
                                                                              id="deleteButton" type="submit" class="btn btn-sm btn-hover btn-danger"><span class="glyphicon glyphicon-remove" style="padding-right:3px;"></span>Delete</a>
                                                                
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                @endforeach
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
                                                @else
                                                <center><h2>No sent messages yet.</h2></center>
                                                @endif
                                                    
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

<!-- end Back To Top -->
<!-- delete message -->
<div id="deleteModal" role="dialog" class="modal fade login-box-wrapper">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                {{--  <h4 class="modal-title"></h4>  --}}
            </div>
            <form method="POST" action = "{{ route('Agent.DeleteMessage')}}">
                {{ csrf_field() }}
                <div class="modal-body" style="padding:5%; margin-top:2%">
                    <h4 class="center">Are you sure you want to delete this message?</h4>
                    <input type="hidden" name="id" class="text-primary" id="message_id">
                    <input type="hidden" class="text-primary" name="receiver_email" id="receiver_email">
                    <input type="hidden" class="text-primary" name="sender_email" id="sender_email">
                    <input type="hidden" class="text-primary" name="package_id" id="package_id">
                    <input type="hidden" class="text-primary" name="message" id="message">
                    <input type="hidden" class="text-primary" name="created_at" id="created_at">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-success">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
</div>
<!-- end of delete message -->	
</div>

<!--AJAX-->
<script>
    $(document).on("click",'#deleteButton',(function(){
        $('#message_id').val($(this).data('id'));
        $('#sender_email').val($(this).data('sender_email'));
        $('#receiver_email').val($(this).data('receiver_email'));
        $('#package_id').val($(this).data('package_id'));
        $('#message').val($(this).data('message'));
        $('#created_at').val($(this).data('created_at'));
        $('#deleteModal').modal('show');
    })); 
</script>
@endsection
@extends('layouts.user.javascriptlayout')