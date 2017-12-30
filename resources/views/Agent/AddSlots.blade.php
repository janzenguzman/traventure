@extends('layouts.app')

@section('content')
<style>
    .foo {
    width: 100px;
}
</style>
    <h1>Slots</h1>
    {!!Form::open(['action' => 'AgentsController@updateSlots', 'method' => 'POST']) !!}
        <div class="form-group">
            <label>Date to:</label>       
            <input type="date" name="date_to" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Date From:</label>       
            <input type="date" name="date_from" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Slot/s:</label>
            <input type="text" name="slots" class="form-control" required>
        </div>
        <input type="hidden" name="package_id" value="{{ $packages->package_id }}">
        <input type="submit" value="Submit">
    {!!Form::close() !!}
@endsection