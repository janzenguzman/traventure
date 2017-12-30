@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <div>
            <h1>Total Bill</h1>
            <p>Booking No.: 000000000001</p>
            <p>Date: 09/01/2017 - 09/07/2017</p>
            <p>Name: Janzen Guzman</p>
            <p>Contact Number: 09123456789</p>
            <p>Email: janzen@mail.com</p>
            <p>Service: Joined Tour Package</p>
        </div>
        <b>
            <p>Adult: </p>
            <p>Child: </p>
            <p>Infant: </p>
        </b>
        <h3>TOTAL: </h3>
        {{--  {{Form::submit('Book', ['class' => 'btn btn-primary', 'style' => 'float:right;'])}}  --}}
        <a href="/Traveler/Explore" style="text-align:right;float:right;padding:4px;">Book</a>
    </div>
</div>
@endsection