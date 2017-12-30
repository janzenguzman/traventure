@extends('layouts.app')

@section('content')
<style>
    .foo {
    width: 100px;
}
</style>
    <h1>Add a Tour Package</h1>
    {!!Form::open(['action' => 'AgentsController@storePackage', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            <label>Name of the Tour Package:</label>       
            <input type="text" name="package_name" class="form-control" placeholder="Going South">
        </div>
        <div class="form-group">
            <label>Days:</label>       
            <input type="text" name="days" class="form-control" placeholder="No. of days">
        </div>
        <div class="form-group">
            <label>Adult Price (11 years above):</label>
            <input type="text" name="adult_price" class="form-control" placeholder="PHP">
        </div>
        <div class="form-group">
            <label>Child Price (4 - 10 years):</label>
            <input type="text" name="child_price" class="form-control" placeholder="PHP">
        </div>
        <div class="form-group">
            <label>Infant Price (3 years old below):</label>
            <input type="text" name="infant_price" class="form-control" placeholder="PHP">
        </div>
        <div class="form-group">
             <label>Excess Person Price:</label>
            <input type="text" name="excess_price" class="form-control" placeholder="PHP">
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
            <input type="text" name="pax1" class="foo" placeholder="2">
            <input type="text" name="pax1_price" class="foo" placeholder="5500">
        </div>
        <div>
            <input type="text" name="pax2" class="foo" placeholder="6">
            <input type="text" name="pax2_price" class="foo" placeholder="8000">
        </div>
        <div>
            <input type="text" name="pax3" class="foo" placeholder="12">
            <input type="text" name="pax3_price" class="foo" placeholder="10500">
        </div>
        <div class="form-group">
            <label>Joined Tour:</label>
            <input type="checkbox" name="type" value="Joined">   
        </div>
        <div class="form-group">
            <label>Inclusions:</label>
            <input type="text" name="inclusions" class="form-control" placeholder="Text box..">  
        </div>
        <div class="form-group">
            <label>Additional Information:</label>
            <input type="text" name="add_info" class="form-control" placeholder="Text box..">
        </div>
        <div class="form-group">
            <label>Reminders:</label>
            <input type="text" name="reminders" class="form-control" placeholder="Text box..">
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
        <input type="submit" value="Submit">
    {!!Form::close() !!}
@endsection