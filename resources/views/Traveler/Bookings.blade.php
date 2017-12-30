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
                            <th></th>
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
                                        {!!Form::open(['action' => ['TravelersController@destroyBookings', $booking->booking_id], 'method' => 'POST'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Cancel Booking', ['class' => "btn btn-danger"])}}
                                        {!!Form::close()!!}
                                        <a href="/Traveler/TourPackage/{{$booking->package_id}}/ContactNow">Contact Now</a><br>
                                    </td>
                                    <td>
                                        <span id="fave" data-id="{{ $booking->package_id }}">
                                            <button href="#" class="fave btn btn-danger">
                                                {{	Auth::user()->favorites()->where('package_id', $booking->package_id)->first() ? 
                                                    Auth::user()->favorites()->where('package_id', $booking->package_id)->first()->favorited == 1 ? 
                                                    'Unfavorited' : 'Favorite' : 'Favorite'}}
                                            </button>
                                            {{--  <i class="fa fa-heart-o"></i> --}}
                                            {{--  <a href="#" class="fave">Unfavorite</a>  --}}
                                            {{--  <i class="fa fa-heart"></i>  --}}
                                        </span>
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

<script>
    var token = '{{ Session::token() }}';
    var urlFave = '{{ route('Traveler.Favorite') }}';
</script>
@endsection
    
@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
        });
</script>
<script type="text/javascript">
    (function($) {
    //console.log("HELLO WORLD");
        $(".fave").on('click', function(event){
            event.preventDefault();
            packageId = event.target.parentNode.dataset['id'];
            console.log(packageId);
            var $t = $(this);
            $.ajax({
                method: 'POST',
                url: urlFave,
                data: { packageId: packageId, token: token },
                success: function(data){
                    console.log(data);
                    if (data == 'Favorite') {
                        $t.text('Unfavorite');
                        //$t.append('<button class="btn btn-danger">Unfavorite</button>')
                    }else{
                        $t.text('Favorite');
                    }
                },
                error: function (jqXHR, exception) {
                    alert("ERROR ERROR");
                }
            })
                .done(function(){
                    //alert("HELLO HELLO HELLO");
                });
        });
    }(jQuery));
</script>
@endsection
