@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Traveler Dashboard</div>

				@if(count($packages) > 0)
					@foreach($packages as $package)
						<div>
							<h3><a href="/Traveler/TourPackage/{{$package->package_id}}">{{$package->package_name}}</a></h3>
							<small>Posted on {{$package->created_at}}</small>
						</div>
					@endforeach
					{{$packages->links()}}
				@else
					<p>No Packages Yet.</p>
				@endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
