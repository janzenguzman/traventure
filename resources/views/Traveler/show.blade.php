@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-9 col-md-offset-1">
        <div class="panel panel-default" style="padding:8px;">
            {{--  <h1>BLAH BLAH KAPOY NA</h1>  --}}
            <h1>{{$packages->package_name}}</h1>
            <hr>
            <div>
                <p>Max Pax: {{$packages->pax}}</p>
                <p>Price: Php {{$packages->price}}</p>
                <p>Services Include:<br> {{$packages->services}}</p>
            </div>
            <a href="/Traveler/Explore" style="padding:4px;">Go Back</a>
            <a href="/Traveler/TourPackage/{{$packages->package_id}}/Book" style="text-align:right;float:right;padding:4px;"> Book</a>
            <a href="/Traveler/TourPackage/{{$packages->package_id}}/ContactNow" style="text-align:right;float:right;padding:4px;">Contact Now </a>
            <hr><small>Posted on {{$packages->created_at}}</small>
        </div>
    </div>
</div>
@endsection
