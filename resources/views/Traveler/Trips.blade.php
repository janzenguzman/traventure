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
                            <th>Booking ID</th>
                            <th>Package Name</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        @foreach($trips as $trip)
                            @if($trip->expired == 1)
                                <tr >
                                    <td>{{$trip->trip_id}}</td>
                                    <td>{{$trip->booking_id}}</td>
                                    <td>{{$trip->package_name}}</td>
                                    <td>{{$trip->client_fname}} {{$trip->client_lname}}</td>
                                    <td>
                                        {{$trip->date_from = Carbon\Carbon::parse($trip->date_from)->toFormattedDateString()}} - 
                                        {{$trip->date_to = Carbon\Carbon::parse($trip->date_to)->toFormattedDateString()}}
                                    </td>
                                    <td>Expired</td>
                                    <td>
                                        <span id="fave" data-id="{{ $trip->package_id }}">
                                            <button href="#" class="fave btn btn-danger">
                                                {{	Auth::user()->favorites()->where('package_id', $trip->package_id)->first() ? 
                                                    Auth::user()->favorites()->where('package_id', $trip->package_id)->first()->favorited == 1 ? 
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
                @else
                    <p>You have no Trips yet!</p>
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
            console.log($t);
            $.ajax({
                method: 'POST',
                url: urlFave,
                data: { packageId: packageId, token: token },
                success: function(data){
                    console.log(data);
                    if (data == 'Favorite') {
                        //while()
                        $t.text('Unfavorite');
                        //$t.append('<button class="btn btn-primary">Unfavorite</button>')
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
