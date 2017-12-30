@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{--  <div class="row">  --}}
        {{--  <div class="panel panel-default" style="padding:8px;">  --}}
        <h1 style="text-align:center;">{{$packages->package_name}}</h1>
        <hr>
        <div>
            <p>Max Pax: {{$packages->pax}}</p>
            <p>Price: Php {{number_format($packages->price, 2)}}</p>
            <p>Services Include:<br> {{$packages->services}}</p>
        </div>
        <div style="text-align:right;">
            <a href="/Traveler/Explore" class="btn btn-default">Go Back</a>
            <a href="/Traveler/TourPackage/{{$packages->package_id}}/ContactNow" class="btn btn-info">Contact Now</a>
            <a href="/Traveler/TourPackage/{{$packages->package_id}}/Book" class="btn btn-warning"> Book</a>
        </div>
        <hr><small>Posted on {{$packages->created_at}}</small>
    {{--  </div>  --}}
</div>
@endsection
