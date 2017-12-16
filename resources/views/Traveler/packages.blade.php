@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1 style="text-align:center;">Traveler Dashboard</h1></div>

				{{--  {!! Form::open(['method'=>'GET','url'=>'offices','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" name="search" placeholder="Search...">
					<span class="input-group-btn">
						<button class="btn btn-default-sm" type="submit">
							<i class="fa fa-search"><!--<span class="hiddenGrammarError" pre="" data-mce-bogus="1"-->i>
						</button>
					</span>
				</div>
				{!! Form::close() !!}  --}}
                
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
