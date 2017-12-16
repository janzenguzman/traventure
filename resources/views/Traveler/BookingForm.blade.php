@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8" style="border-radius:10px;column-gap:1em">
        {{--  <div class="g_left">  --}}
            <h1>Book {{$packages->package_name}}</h1>
            {!! Form::open(['action' => 'TravelersController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    <h4>Date:</h4>
                    {{Form::label('frDate', 'From:')}}
                    {{Form::date('frDate', \Carbon\Carbon::now())}}
                    {{--  {{Form::text('frDate', '', ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy'])}}  --}}
                    {{Form::label('toDate', 'To:')}}
                    {{Form::date('toDate', \Carbon\Carbon::now())}}
                    {{--  {{Form::text('toDate', '', ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy'])}}  --}}
                </div>
                <div class="form-group">
                    {{Form::label('fname', 'First Name:')}}
                    {{Form::text('fname', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('lname', 'Last Name:')}}
                    {{Form::text('lname', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('contactnum', 'Contact Number:')}}
                    {{Form::text('contactnum', '', ['class' => 'form-control', 'placeholder' => 'Contact Number'])}}
                </div>
                <div class="form-group">
                    {{Form::label('email', 'Email Address:')}}
                    {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
                </div>
                <div class="form-group">
                    {{Form::label('adult', 'Adult: ')}}
                    {{Form::number('adult', 'value', ['placeholder' => '0', 'style' => 'padding:4px;'])}}
                    {{Form::label('child', 'Child: ')}}
                    {{Form::number('child', 'value', ['placeholder' => '0', 'style' => 'padding:4px;'])}}
                    {{Form::label('infant', 'Infant: ')}}
                    {{Form::number('infant', 'value', ['placeholder' => '0', 'style' => 'padding:4px;'])}}
                </div>
                <div class="form-group">
                    {{Form::label('note', 'Note:')}}
                    {{Form::textarea('note', '', ['class' => 'form-control', 'placeholder' => 'Additional Information/Requests'])}}
                </div>
                <div>
                    {{Form::hidden('package_id_hidden', $packages->package_id)}}
                </div>
            <a href="/Traveler/TourPackage/{{$packages->package_id}}" style="text-align:right;float:right;padding:4px;">Cancel</a>
            {{Form::submit('Continue', ['class' => 'btn btn-primary', 'style' => 'float:right;'])}}
            {{--  <a href="{{action('TravelersController@store')}}" style="text-align:right;float:right;padding:4px;">Continue</a>  --}}
            {!! Form::close() !!}
        </div>
    {{--  </div>
    <div class="row">  --}}
        {{--  <div class="col-md-4" style="border-radius:10px;float:right;">
            <h3>sdjkfhjan</h3>
            <hr><p>Booking Details</p>
            <p>Date:</p>
            <p>From: </p><p style="float:right;"></p>
        </div>
        <div class="col-md-4" style="border-radius:10px;float:right;">
            <p>HELLO</p>
        </div>  --}}
    </div>
</div>
@endsection