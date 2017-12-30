@extends('layouts.app')

@section('content')
<style>
    .foo {
    width: 100px;
}
</style>
    <h1>Add Itineraries</h1>
    {!!Form::open(['action' => 'AgentsController@storeItineraries', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {{--  {!!Form::open(array('method' => 'post', 'enctype' => 'multipart/form-data', 'action' => array('AgentsController@storeItineraries', $itineraries->package_id)))!!}  --}}
@if(count($packages) > 0)
    @if($packages->days == 1)
        <div class="form-group">
            <h1>Day 1</h1>    
        </div>
        <div class="form-group">
            <label>Start Time:</label>
            <input type="text" name="day1_starttime1" class="form-control" placeholder="Time">
        </div>
        <div class="form-group">
            <label>End Time:</label>
            <input type="text" name="day1_endtime1" class="form-control" placeholder="Time">
        </div>
        <div class="form-group">
            <label>Destinations:</label>
            <input type="text" name="day1_destination1" class="form-control" placeholder="Destination">
        </div>
        <div class="form-group">
            <label>Start Time:</label>
            <input type="text" name="day1_starttime2" class="form-control" placeholder="Time">
        </div>
        <div class="form-group">
            <label>End Time:</label>
            <input type="text" name="day1_endtime2" class="form-control" placeholder="Time">
        </div>
        <div class="form-group">
            <label>Destinations:</label>
            <input type="text" name="day1_destination2" class="form-control" placeholder="Destination">
        </div>
        <div class="form-group">
            <label>Start Time:</label>
            <input type="text" name="day1_starttime3" class="form-control" placeholder="Time">
        </div>
        <div class="form-group">
            <label>End Time:</label>
            <input type="text" name="day1_endtime3" class="form-control" placeholder="Time">
        </div>
        <div class="form-group">
            <label>Destinations:</label>
            <input type="text" name="day1_destination3" class="form-control" placeholder="Destination">
        </div>
        <div class="form-group">
            <label>Start Time:</label>
            <input type="text" name="day1_starttime4" class="form-control" placeholder="Time">
        </div>
        <div class="form-group">
            <label>End Time:</label>
            <input type="text" name="day1_endtime4" class="form-control" placeholder="Time">
        </div>
        <div class="form-group">
            <label>Destinations:</label>
            <input type="text" name="day1_destination4" class="form-control" placeholder="Destination">
        </div>
        <div class="form-group">
            <label>Start Time:</label>
            <input type="text" name="day1_starttime5" class="form-control" placeholder="Time">
        </div>
        <div class="form-group">
            <label>End Time:</label>
            <input type="text" name="day1_endtime5" class="form-control" placeholder="Time">
        </div>
        <div class="form-group">
            <label>Destinations:</label>
            <input type="text" name="day1_destination5" class="form-control" placeholder="Destination">
        </div>
        <div class="form-group">
            <label>Upload Photo:</label>
            <input type="file" name="day1_photo">
        </div>
    @endif

    @if($packages->days == 2)
    <div class="form-group">
        <h1>Day 1</h1>    
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination1" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination2" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination3" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination4" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination5" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="day1_photo" >
    </div>
    <div class="form-group">
        <h1>Day 2</h1>    
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination1" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination2" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination3" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination4" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination5" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="day2_photo" required>
    </div>
    @endif

    @if($packages->days == 3)
    <div class="form-group">
        <h1>Day 1</h1>    
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination1" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination2" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination3" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination4" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination5" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="day1_photo" >
    </div>
    <div class="form-group">
        <h1>Day 2</h1>    
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination1" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination2" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination3" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination4" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination5" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="day2_photo" >
    </div>
    <div class="form-group">
        <h1>Day 3</h1>    
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination1" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination2" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination3" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination4" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination5" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="day3_photo" >
    </div>

    @endif

    @if($packages->days == 4)
    <div class="form-group">
        <h1>Day 1</h1>    
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination1" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination2" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination3" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination4" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination5" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="day1_photo" >
    </div>
    <div class="form-group">
        <h1>Day 2</h1>    
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination1" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination2" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination3" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination4" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination5" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="day2_photo" >
    </div>
    <div class="form-group">
        <h1>Day 3</h1>    
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination1" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination2" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination3" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination4" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination5" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="day3_photo" >
    </div>
    <div class="form-group">
        <h1>Day 4</h1>    
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day4_starttime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day4_endtime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day4_destination1" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day4_starttime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day4_endtime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day4_destination2" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day4_starttime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day4_endtime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day4_destination3" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day4_starttime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day4_endtime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day4_destination4" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day4_starttime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day4_endtime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day4_destination5" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="day4_photo" >
    </div>


    @endif
      
    @if($packages->days == 5)
    <div class="form-group">
        <h1>Day 1</h1>    
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination1" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination2" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination3" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination4" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day1_starttime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day1_endtime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day1_destination5" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="day1_photo" >
    </div>
    <div class="form-group">
        <h1>Day 2</h1>    
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination1" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination2" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination3" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination4" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day2_starttime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day2_endtime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day2_destination5" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="day2_photo" >
    </div>
    <div class="form-group">
        <h1>Day 3</h1>    
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination1" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination2" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination3" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination4" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day3_starttime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day3_endtime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day3_destination5" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="day3_photo" >
    </div>
    <div class="form-group">
        <h1>Day 4</h1>    
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day4_starttime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day4_endtime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day4_destination1" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day4_starttime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day4_endtime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day4_destination2" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day4_starttime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day4_endtime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day4_destination3" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day4_starttime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day4_endtime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day4_destination4" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day4_starttime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day4_endtime5" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day4_destination5" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="day4_photo" >
    </div>
    <div class="form-group">
        <h1>Day 5</h1>    
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day5_starttime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day5_endtime1" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day5_destination1" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day5_starttime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day5_endtime2" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day5_destination2" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day5_starttime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day5_endtime3" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day5_destination3" class="form-control" placeholder="Destination" >
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day5_starttime4" class="form-control" placeholder="Time" >
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day5_endtime4" class="form-control" placeholder="Time">
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day5_destination4" class="form-control" placeholder="Destination">
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="text" name="day5_starttime5" class="form-control" placeholder="Time">
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="text" name="day5_endtime5" class="form-control" placeholder="Time">
    </div>
    <div class="form-group">
        <label>Destinations:</label>
        <input type="text" name="day5_destination5" class="form-control" placeholder="Destination">
    </div>
    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="day5_photo" >
    </div>
    @endif

        <input type="hidden" value="{{ $packages->days }}">
        <div>
            <input type="hidden" name="package_id" value="{{ $packages->package_id }}">
        </div>

@endif
        <input type="submit" value="Submit">
    {!!Form::close() !!}
@endsection