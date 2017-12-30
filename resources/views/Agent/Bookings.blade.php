<html>
    <style>
    .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
    </style>
</html>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bookings</div>
                    <div class="links">
                        <a href="Packages">Packages</a>
                        <a href="Bookings">Bookings</a>
                        <a href="Messages">Messages</a>
                    </div>
                </div>
                 <form  id="live-search">
                                <div class="input-group" style="width: 35%">
                                        <label>Search</label>
                                        <input class="form-control" placeholder="Booking number" 
                                            type="text" id="search_field">
                                        <br><br><br>
                                        <label>Sort by:</label>
                                        <br>
                                        <button type="button">Booked</button>&nbsp;&nbsp;
                                        <button type="button">Requested</button>&nbsp;&nbsp;
                                        <button type="button">Cancelled</button>
                                </div>
                </form>
                <div>
                    <div class="panel-heading">
                        <table>
                            <tr>
                                <td>Booking No</td>
                                <td>Date From</td>
                                <td>Date To</td>
                                <td>Tour Package</td>
                                <td>Name</td>
                                <td>People</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                                @if(count($bookings) > 0)
                                    @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->booking_id }}</td>
                                <td>{{ $booking->date_from }}</td>
                                <td>{{ $booking->date_to }}</td>
                                <td>{{ $booking->package_name }}</td>
                                <td>{{ $booking->client_fname }} {{ $booking->client_lname  }}</td>
                                <td>{{ $booking->adult + $booking->child + $booking->infant }}</td>
                                <td>{{ $booking->status }}</td>
                                <td><a href="/Agent/Packages/Accept/{{ $booking->booking_id }}"><button>Accept</button>
                                    <a href="/Agent/Packages/Decline/{{ $booking->booking_id }}"><button>Decline</button>
                                    <a href=""><button>Contact Now</button></a>
                                    </td>
                            </tr>
                                    @endforeach
                                 @else
                                    <p>No packages found</p>
                                @endif
                        </table>
                    </div>
            </div>
        </div>
    </div>
    

</div>
@endsection
