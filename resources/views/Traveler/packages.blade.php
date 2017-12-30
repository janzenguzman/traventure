@extends('layouts.app')

@section('content')
<div class="container-fluid text-center">
	<div class="panel panel-default panel-heading"><h1>Traveler Dashboard</h1></div>
	@if(count($packages) > 0)
		@foreach($packages as $package)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2><a href="/Traveler/TourPackage/{{$package->package_id}}">{{$package->package_name}}</a></h2>
				</div>
				<div class="panel-body">
					Pax: {{$package->pax}} <br>
					Php {{number_format($package->price, 2)}} <br>
					Services: {{$package->services}}
				</div>
				<span id="fave" data-id="{{ $package->package_id }}">
					<button href="#" class="fave btn btn-danger">
						{{	Auth::user()->favorites()->where('package_id', $package->package_id)->first() ? 
							Auth::user()->favorites()->where('package_id', $package->package_id)->first()->favorited == 1 ? 
							'Unfavorited' : 'Favorite' : 'Favorite'}}
					</button>
					{{--  <i class="fa fa-heart-o"></i> --}}
					{{--  <a href="#" class="fave">Unfavorite</a>  --}}
					{{--  <i class="fa fa-heart"></i>  --}}
				</span>
				<hr><small>Posted on {{Carbon\Carbon::parse($package->created_at)->toDayDateTimeString()}}</small>
			</div>
		@endforeach
		<hr>{{$packages->links()}}
	@else
		<p>No Packages Yet.</p>
	@endif
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
