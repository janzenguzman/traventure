@extends('layouts.app')

@section('content')
<style>
    .foo {
    width: 100px;
}
</style>
        {!!Form::open(array('method' => 'post', 'enctype' => 'multipart/form-data','action' => array('AgentsController@updatePackage', $packages->package_id)))!!}
        <h1>Edit {{ $packages->packageName }} package</h1>
        <div class="form-group">
            <label>Name  of the Tour Package:</label>
            <input type="text" name="package_name" class="form-control" value="{{$packages->package_name}}">       
        </div>
        <div class="form-group">
            <label>Days:</label>
            <input type="text" name="days" class="form-control" value="{{$packages->days}}">       
        </div>
        <div class="form-group">
            <label>Adult Price (11 years above):</label>
            <input type="text" name="adult_price" class="form-control" value="{{$packages->adult_price}}">      
        </div>
        <div class="form-group">
            <label>Child Price (4 - 10 years):</label>
            <input type="text" name="child_price" class="form-control" value="{{$packages->child_price}}">   
        </div>
        <div class="form-group">
            <label>Infant Price (3 years below):</label>
            <input type="text" name="infant_price" class="form-control" value="{{$packages->infant_price}}">         
        </div>
        <div class="form-group">
            <label>Excess Person Price:</label>
            <input type="text" name="excess_price" class="form-control" value="{{$packages->excess_price}}">    
        </div>
        <div class="form-group">
            <label>Services:</label>
        </div>
        <div class="form-group">
            <label>Exclusive Tour:</label>
            <input type="checkbox" name="type" value="Exclusive">
        </div>
        <div>
            <label>Pax:</label>
        </div>
        <div>
            <input type="text" name="pax1" class="foo" value="{{$packages->pax1}}">
            <input type="text" name="pax1_price" class="foo" value="{{$packages->pax1_price}}">
        </div>
        <div>
            <input type="text" name="pax2" class="foo" value="{{$packages->pax2}}">
            <input type="text" name="pax2_price" class="foo" value="{{$packages->pax2_price}}">
        </div>
        <div>
            <input type="text" name="pax3" class="foo" value="{{$packages->pax3}}">
            <input type="text" name="pax3_price" class="foo" value="{{$packages->pax3_price}}">
        </div>
        <div class="form-group">
            <label>Joined Tour:</label>
            <input type="checkbox" name="type" value="Joined">
        </div>
        <div class="form-group">
            <label>Inclusions:</label>
            <input type="text" name="inclusions" class="form-control" value="{{$packages->inclusions}}">
        </div>
        <div class="form-group">
            <label>Additional Information:</label>
            <input type="text" name="add_info" class="form-control" value="{{$packages->add_info}}">       
        </div>
        <div class="form-group">
            <label>Reminders:</label>
            <input type="text" name="reminders" class="form-control" value="{{$packages->reminders}}">       
        </div>
        <div>
            <label>Categories:</label>
        </div>
        <div class="form-group">      
            <input type="checkbox" name="categories[]" value="Mountain" class="foo">Mountain
        </div>
        <div class="form-group">       
            <input type="checkbox" name="categories[]" value="Sea" class="foo">Sea
        </div>
        <div class="form-group">       
            <input type="checkbox" name="categories[]" value="Forest" class="foo">Forest
        </div>
        <div class="form-group">
            {{--  {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Update', array('class' => 'btn btn-primary'))}}  --}}
            <input type="submit" value="Submit">
        </div>
    {!!Form::close() !!}
@endsection