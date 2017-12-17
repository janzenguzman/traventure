@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1 style="text-align:center;">Traveler Dashboard</h1></div>
                
				@if(count($packages) > 0)
					@foreach($packages as $package)
						<div class="floating-box">
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

@endsection
