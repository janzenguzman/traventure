@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-9 col-md-offset-1">
        <h1>{{$package->package_name}}</h1>
        <div>
            <p>Max Pax: {{$package->pax}}</p>
            <p>Price: Php {{$package->price}}</p>
            <p>Services Include:<br> {{$package->services}}</p>
        </div>
        <a href="/Traveler/HomePage" style="padding:4px;">Go Back</a>
        <a href="#" style="text-align:right;float:right;padding:4px;"> Book</a>
        <a href="/Traveler/ContactNow" style="text-align:right;float:right;padding:4px;">Contact Now </a>
        <hr><small>Posted on {{$package->created_at}}</small>
    </div>
</div>
@endsection
