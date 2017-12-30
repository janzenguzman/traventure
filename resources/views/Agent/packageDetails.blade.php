@extends('layouts.app')

@section('content')
<center>
<div>
    <img src="/public/uploads/files/{{ $itineraries->day1_photo }}" height="300" width="500">
</div>

<h1>{{ $packages->package_name }}</h1>
<div>
    <label>Days</label>
    <p>{{ $packages->days }}</p>
</div>
<div>
    <label>Nights</label>
    <p>{{ $packages->days-1 }}</p>
</div>
<div>
    <label>Adult Price</label>
    <p>{{ $packages->adult_price }}</p>
</div>
<div>
    <label>Child Price</label>
    <p>{{ $packages->child_price }}</p>
</div>
<div>
    <label>Infant Price</label>
    <p>{{ $packages->infant_price }}</p>
</div>
<div>
    <label>Excess Price</label>
    <p>{{ $packages->excess_price }}</p>
</div>
<div>
    <label>Type</label>
    <p>{{ $packages->type }}</p>
</div>
<div>
@if(count($packages) > 0)
    @if($packages->type == 'Exclusive')
        <label>Pax & Price</label>
        <div>
        {{$packages->pax1}}&nbsp;{{$packages->pax1_price}}
        </div>
        <div>
        {{$packages->pax2}}&nbsp;{{$packages->pax2_price}}
        </div>
        <div>
        {{$packages->pax3}}&nbsp;{{$packages->pax3_price}}
        </div>
    @endif

    @if($packages->type == 'Joined')
        <label>Price</label>
            <div>
                Adult:&nbsp;{{$packages->adult_price}}
            </div>
            <div>
                Child:&nbsp;{{$packages->child_price}}
            </div>
            <div>
                Infant:&nbsp;{{$packages->infant_price}}
            </div>
            <div>
                Excess:&nbsp;{{$packages->excess_price}}
            </div>
    @endif
@endif
</div>
<div>
    <label>Inclusions</label>
    <p>{{ $packages->inclusions }}</p>
</div>
<div>
    <label>Additional Info</label>
    <p>{{ $packages->add_info }}</p>
</div>
<div>
    <label>Reminders</label>
    <p>{{ $packages->reminders }}</p>
</div>
<div>
    <label>Categories</label>
    <p>{{ $packages->categories }}</p>
</div>
<div>
    <a href="/Agent/Packages/EditPackage/{{ $packages->package_id }}"><button>Edit Package</button>
</div>
</center>
@endsection