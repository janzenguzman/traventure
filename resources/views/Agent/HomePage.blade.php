@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Travel Agent Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Last Signed in at {{ Auth::guard('agents')->user()->last_signed_in }}<br><br> 
                    You are logged in as a Travel Agent!
                    <br>

                    {{$diffHours}} hour.

                    @if($diffHours <= 1)
                        <p>ACTIVE USER</p>
                    @else
                        <p>INACTIVE</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
