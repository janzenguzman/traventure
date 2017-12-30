@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1 style="text-align:center;">Bookings</h1></div>
                @if(count($bookings) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Booking ID</th>
                            <th>Package Name</th>
                            <th>Package ID</th>
                            <th>Client</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Expired</th>
                            <th></th>
                            <th>Favorite</th>
                        </tr>
                        @foreach($bookings as $booking)
                            @if($booking->expired == 0)
                                <tr>
                                    <td>{{$booking->booking_id}}</td>
                                    <td>{{$booking->package_name}}</td>
                                    <td>{{$booking->package_id}}</td>
                                    <td>{{$booking->client_fname}} {{$booking->client_lname}}</td>
                                    @if($booking->status == 0)
                                        <td>Pending</td>
                                    @else
                                        <td>Accepted</td>
                                    @endif
                                    <td>{{$booking->date_from = Carbon\Carbon::parse($booking->date_from)->toFormattedDateString()}} - {{$booking->date_to = Carbon\Carbon::parse($booking->date_to)->toFormattedDateString()}}</td>
                                    {{--  <td>Not Expired</td>  --}}
                                    @if($booking->expired == 0)
                                        <td>Not Expired</td>
                                    @else
                                        <td>Expired</td>
                                    @endif
                                    <td>
                                        <a href="/Traveler/TourPackage/{{$booking->package_id}}/ContactNow">Contact Now</a><br>
                                        {!!Form::open(['action' => ['TravelersController@destroyBookings', $booking->booking_id], 'method' => 'POST'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Cancel Booking', ['class' => "btn btn-danger"])}}
                                        {!!Form::close()!!}
                                    </td>
                                    <td>
                                        <a href="#" class="fave">Favorite</a>
                                        {{--  @if (Auth::check())  --}}
                                        {{--  <favorite
                                            :booking={{ $booking->booking_id }}
                                            :favorited={{ $booking->favorited() ? 'true' : 'false' }}
                                        ></favorite>  --}}
                                        {{--  @endif  --}}
                                    </td>
                                </tr>
                            @endif  
                        @endforeach
                    </table>
                    {{--  <hr>{{$bookings->links()}}  --}}
                @else
                    <p>You have no Bookings yet!!!!!</p>
                @endif
			</div>
        </div>
    </div>
</div>
@endsection