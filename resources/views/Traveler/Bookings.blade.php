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
                            <th>Package ID</th>
                            <th>Package Name</th>
                            <th>Booking ID</th>
                            <th>Client</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{$booking->package_id}}</td>
                                <td>{{$booking->package_name}}</td>
                                <td>{{$booking->booking_id}}</td>
                                <td>{{$booking->client_fname}}</td>
                                @if($booking->status == 0)
                                    <td>Pending</td>
                                @else
                                    <td>Accepted</td>
                                @endif
                                <td>
                                    <a href="/Traveler/TourPackage/{{$booking->package_id}}/ContactNow">Contact Now</a><br>
                                    {!!Form::open(['action' => ['TravelersController@destroyBookings', $booking->booking_id], 'method' => 'POST'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => "btn btn-danger"])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p>You have no Bookings yet!!!!!</p>
                @endif
                
                {{--  @if(count($bookings) > 0)
					@foreach($bookings as $booking)
						<div class="floating-box">
							<h3><a href="/Traveler/TourPackage/{{$packages}}">{{$booking->booking_id}}</a></h3>
							{{--  <small>Posted on {{$package->created_at}}</small>  --}}
						{{--  </div>  --}}
					{{--  @endforeach  --}}
					{{--  {{$packages->links()}}  --}}
				{{--  @else  --}}
					{{--  <p>You have no Bookings yet!!!!!!</p>  --}}
				{{--  @endif  --}}
			</div>
        </div>
    </div>
</div>
@endsection