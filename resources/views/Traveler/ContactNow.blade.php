@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <h1>Contact Now</h1>
        <h3>Package: {{$packages->package_name}}</h3>
        <div>
            <p>Company Name: Travel Agent<br>
            Name: Janzen Guzman<br>
            Position: Secretary<br>
            Email: janzen@mail.com<br>
            <br>Contact No.: +63 900 123 4567</p>
        </div>
        <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
            <span style="font-size: 25px; background-color: #F3F5F6; padding: 0 10px;">
                Or <!--Padding is optional-->
            </span>
        </div>
        <br><p>Send a Message:</p>
        <input type="text" name="message" style="width:100%;height:100px;">
        <br><br><a href="/Traveler/TourPackage/{{$packages->package_id}}" style="padding:4px;">Cancel</a>
        <a href="#" style="text-align:right;float:right;padding:4px;"> Send</a>
    </div>
</div>
@endsection