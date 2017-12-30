@extends('layouts.app')

@section('content')
<div class="container-fluid text-center">
    <div class="panel panel-default">
        <div class="panel-heading"><h1>My Favorites</h1></div>
        @if(count($favorites) > 0)
            <table class="table table-striped">
                <tr>
                    <th>Favorite ID</th>
                    <th>Package ID</th>
                    <th>Package Name</th>
                    <th>Information</th>
                    <th></th>
                </tr>
                @foreach($favorites as $favorite)
                    <tr id="fave{{$favorite->favorite_id}}">
                        <td>{{$favorite->favorite_id}}</td>
                        <td>{{$favorite->package_id}}</td>
                        <td>{{$favorite->package_name}}</td>
                        <td style="text-align:left;">
                            Pax: {{$favorite->pax}} <br>
                            Php {{number_format($favorite->price, 2)}} <br>
                            Services: {{$favorite->services}}
                        </td>
                        <td>
                            <button class="btn btn-danger del" value="{{$favorite->favorite_id}}">Unfavorite</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="panel-body">
                <p>You have no favorite packages yet.</p>
            </div>
        @endif
        {{$favorites->links()}}
    </div>
</div>

<script>
    var token = '{{ Session::token() }}';
    var urlUnFave = '{{ route('Traveler.unFavorite') }}';
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
	    console.log("HELLO WORLD");
		$(".del").on('click', function(){
            var deleteFave = $(this).val();
            console.log(deleteFave);
            var $t = $(this);
			$.ajax({
				type: 'POST',
				url: urlUnFave,
				data: { deleteFave: deleteFave, token: token },
				success: function(data){
                    console.log(data,'Success na gud!');
                    $t.text('Favorite');
                    $('#fave'+ deleteFave).remove();
				},
				error: function (data) {
					console.log("ERROR!!! ERROR:", data);
				}
			})
				.done(function(){
					//alert("DONE");
				});
		});
	}(jQuery));
</script>
@endsection
