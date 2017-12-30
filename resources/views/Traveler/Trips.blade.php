@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1 style="text-align:center;">Trips</h1></div>
                @if(count($trips) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Trip ID</th>
                            <th>Package ID</th>
                            <th>Booking ID</th>
                            <th>Package Name</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        @foreach($trips as $trip)
                            @if($trip->expired == 1)
                                <tr>
                                    <td>{{$trip->trip_id}}</td>
                                    <td>{{$trip->package_id}}</td>
                                    <td>{{$trip->booking_id}}</td>
                                    <td>{{$trip->package_name}}</td>
                                    <td>{{$trip->client_fname}} {{$trip->client_lname}}</td>
                                    <td>
                                        {{$trip->date_from = Carbon\Carbon::parse($trip->date_from)->toFormattedDateString()}} - 
                                        {{$trip->date_to = Carbon\Carbon::parse($trip->date_to)->toFormattedDateString()}}
                                    </td>
                                    <td>Expired</td>
                                    <td></td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                @else
                    <p>You have no Trips yet!</p>
                @endif
			</div>
        </div>
    </div>
</div>
@endsection