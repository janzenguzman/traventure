{{--  @extends('layouts.app')

@section('content')
<style>
    .foo {
    width: 100px;
}
</style>
    <h1>Add Itineraries</h1>
    {!!Form::open(['action' => 'AgentsController@storeItineraries', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {!!Form::open(array('method' => 'post', 'enctype' => 'multipart/form-data', 'action' => array('AgentsController@storeItineraries', $itineraries->package_id)))!!}
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
            <label>Destination:</label>
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
            <label>Destination:</label>
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
            <label>Destination:</label>
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
            <label>Destination:</label>
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
            <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>Destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
        <label>destination:</label>
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
@endsection  --}}
@extends('layouts.user.headlayout')

@section('content')
<body class="transparent-header">
    <!-- start Container Wrapper -->
    <div class="container-wrapper">
        <!-- start Header -->
        <header id="header">
            <!-- start Navbar (Header) -->
            @extends('layouts.agent-navbar')
            <!-- end Navbar (Header) -->
        </header>
        <!-- end Header -->
        <!-- start Main Wrapper -->
		
		<div class="main-wrapper scrollspy-container">
		
			<!-- start breadcrumb -->
			
			<div class="breadcrumb-image-bg pb-100 no-bg" style="background-image:url({{ asset('images/breadcrumb-bg.jpg')}});">
				<div class="container">

					<div class="page-title">
					
						<div class="row">
						
							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
							
								<h2>Create Your Tour</h2>
								<p>Celebrated no he decisively thoroughly.</p>
						
							</div>
							
						</div>

					</div>
					
					<div class="breadcrumb-wrapper">
					
						<ol class="breadcrumb">
							<li><a href="#">Home</a></li>
							<li class="active"><span>Tour Create</span></li>
						</ol>
					
					</div>

				</div>
				
			</div>
			
			<!-- end breadcrumb -->
			
			<div class="bg-light">
			
				<div class="create-tour-wrapper">

					<div class="container">
					
						<div class="row">
						
							<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
							
								<div class="form">
								
									<div class="create-tour-inner">
										
										<div class="mb-40"></div>
										
										<h4 class="section-title">Itinerary</h4>
										
										
										<div class="itinerary-form-wrapper">
                                            {!!Form::open(['action' => 'AgentsController@storeItineraries', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                            @if(count($packages) > 0)
                                                @if($packages->days == 1)
											
                                                    <div class="itinerary-form-item">
                                                    
                                                        <div class="content clearfix">
                                                        
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                    <div class="day">
                                                                        <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                        <span class="text-primary block number spacing-1">01</span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day1_photo" >
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                    
                                                    </div>
                                                @endif

                                                @if($packages->days == 2)
                                                    <div class="itinerary-form-item">
                                                    
                                                        <div class="content clearfix">
                                                        
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                    <div class="day">
                                                                        <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                        <span class="text-primary block number spacing-1">01</span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day1_photo" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                    <div class="itinerary-form-item">
                                                    
                                                        <div class="content clearfix">
                                                        
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                    <div class="day">
                                                                        <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                        <span class="text-primary block number spacing-1">02</span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>destination:</label>
                                                                                <input type="text" name="day2_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>destination:</label>
                                                                                <input type="text" name="day2_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day2_photo" >
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                        
                                                    </div>
                                                @endif
                                                
                                                @if($packages->days == 3)
                                                    <div class="itinerary-form-item">
                                                        
                                                        <div class="content clearfix">
                                                        
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                    <div class="day">
                                                                        <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                        <span class="text-primary block number spacing-1">01</span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day1_photo" >
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                    <div class="itinerary-form-item">
                                                    
                                                        <div class="content clearfix">
                                                        
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                    <div class="day">
                                                                        <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                        <span class="text-primary block number spacing-1">02</span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day2_photo" >
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                    <div class="itinerary-form-item">
                                                    
                                                        <div class="content clearfix">
                                                        
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                    <div class="day">
                                                                        <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                        <span class="text-primary block number spacing-1">03<span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day3_photo" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                        
                                                    </div>
                                                @endif

                                                @if($packages->days == 4)
                                                    <div class="itinerary-form-item">
                                                            
                                                        <div class="content clearfix">
                                                        
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                    <div class="day">
                                                                        <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                        <span class="text-primary block number spacing-1">01</span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day1_photo" >
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                    <div class="itinerary-form-item">
                                                    
                                                        <div class="content clearfix">
                                                        
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                    <div class="day">
                                                                        <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                        <span class="text-primary block number spacing-1">02</span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day2_photo" >
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                    <div class="itinerary-form-item">
                                                    
                                                        <div class="content clearfix">
                                                        
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                    <div class="day">
                                                                        <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                        <span class="text-primary block number spacing-1">03<span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day3_photo" >
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                    <div class="itinerary-form-item">
                                                    
                                                        <div class="content clearfix">
                                                        
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                    <div class="day">
                                                                        <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                        <span class="text-primary block number spacing-1">04<span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day4_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day4_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day4_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day4_starttime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day4_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day4_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day4_starttime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day4_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day4_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day4_starttime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day4_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day4_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day4_starttime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day4_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day4_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day4_photo" >
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                        
                                                    </div>
                                                @endif

                                                @if($packages->days == 5)
                                                    <div class="itinerary-form-item">
                                                                
                                                        <div class="content clearfix">
                                                        
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                    <div class="day">
                                                                        <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                        <span class="text-primary block number spacing-1">01</span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="time" name="day1_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day1_starttime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day1_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day1_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day1_photo" >
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                    <div class="itinerary-form-item">
                                                    
                                                        <div class="content clearfix">
                                                        
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                    <div class="day">
                                                                        <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                        <span class="text-primary block number spacing-1">02</span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day2_starttime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day2_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day2_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day2_photo" >
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                    <div class="itinerary-form-item">
                                                    
                                                        <div class="content clearfix">
                                                        
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                    <div class="day">
                                                                        <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                        <span class="text-primary block number spacing-1">03<span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                    <div class="row gap-20">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="time" name="day3_starttime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day3_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day3_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day3_photo" >
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                    <div class="itinerary-form-item">
                                                    
                                                        <div class="content clearfix">

                                        <div class="mb-40"></div>
                                    
                                        <h4 class="section-title">Itinerary</h4>
                                        <p>Compliment interested discretion estimating on stimulated apartments oh. Dear so sing when in find read of call. As distrusts behaviour abilities defective uncommonly.</p>
                                        
                                        {!!Form::open(['action' => 'AgentsController@storeItinerary', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                        {{--  <form method="POST">  --}}
                                            {{ csrf_field() }}
                                            <div class="itinerary-form-wrapper" id="main">
                                                @if(count($packages) > 0)
                                                    @for($count = 1; $count <= $packages->days; ++$count)
                                                        <div class="itinerary-form-item">
                                                        
                                                            <div class="content clearfix">
                                                            
                                                                <div class="row gap-20">
                                                                    <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                                        <div class="day">
                                                                            <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                            <span class="text-primary block number spacing-1">0{{$count}}</span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                                    
                                                                        <div class="row gap-20 sample" id="button">
                                                                        
                                                                            <div class="col-xs-12 col-sm-6">
                                                                            
                                                                                <div class="form-group">
                                                                                    <label>Start Time:</label>
                                                                                    <input type="time" name="starttime[]" class="oh-timepicker form-control" placeholder="Time">
                                                                                </div>
                                                                            
                                                                            </div>

                                                                            <div class="col-xs-12 col-sm-6">

                                                                                <div class="form-group">
                                                                                    <label>End Time:</label>
                                                                                    <input type="time" name="endtime[]" class="oh-timepicker form-control" placeholder="Time">
                                                                                </div>
                                                                                
                                                                            </div>
                                         
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day4_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            <div class="col-xs-12 col-sm-12">
                                                                            
                                                                                <div class="form-group">
                                                                                    <label>Destinations:</label>
                                                                                    <input type="text" name="destination[]" class="form-control" placeholder="Destination">
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        
                                                                        </div>

                                                                        <div class="form-group">
                                                                            {{Form::file('day1_photo[]', ['required' => 'required'])}}
                                                                        </div>
                             
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day4_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        <div class="add-more-form">
                                                                            <span>Add Destination</span> 
                                                                            <a class="add_des" type="submit"><i class="ion-android-add-circle"></i></a>

                                                                        </div>

                                                                        {{--  <input type="hidden" value="{{ $packages->days }}" name="daysCount">  --}}
                                                                        <input type="hidden" value="{{ $count }}" name="day">
                                                                        <div>
                                                                            <input type="hidden" name="package_id" value="{{ $packages->package_id }}">
                                                                        </div>
                                                                        
                                                                    </div>
                                                                
                                                                </div>

                                                            </div>
                                                        
                                                        </div>
                                                    @endfor
                                                @endif
                                            </div>
                                                    {{--  <div class="add-more-form mt-15">
                                                        <span>Add Day</span>
                                                        <a id="add_day"><i class="ion-android-add-circle"></i></a>
                                                    </div><br>  --}}
                                                    <br>
                                                    <input type="SUBMIT" name="submit" class="btn btn-wide btn-primary btn-sm"/>
                                        {{--  </form>  --}}
                                        {!!Form::close() !!}
                                            {{--  <div class="itinerary-form-item">
                                            
                                                <div class="content clearfix">
                                                
                                                    <div class="row gap-20">
                                                    
                                                        <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                        
                                                            <div class="day">
                                                                <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                <span class="text-primary block number spacing-1">02</span>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                            
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xs-12 col-sm-6">
                                                                
                                                                    <div class="form-group">
                                                                        <label>Start Time:</label>
                                                                        <input type="time" name="day1_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                    </div>
                                                                
                                                                </div>

                                                                <div class="col-xs-12 col-sm-6">
                                                                          <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day4_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day4_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                          <div class="form-group">
                                                                        <label>End Time:</label>
                                                                        <input type="time" name="day1_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xs-12 col-sm-12">
                                                                
                                                                    <div class="form-group">
                                                                        <label>Destinations:</label>
                                                                        <input type="text" name="day1_destination1" class="form-control" placeholder="Destination">
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xs-12 col-sm-6">
                                                                
                                                                    <div class="form-group">
                                                                        <label>Start Time:</label>
                                                                        <input type="time" name="day1_starttime2" class="oh-timepicker form-control" placeholder="Time">
                                                                    </div>
                                                                
                                                                </div>

                                                                <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day4_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day4_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                    <div class="form-group">
                                                                        <label>End Time:</label>
                                                                        <input type="time" name="day1_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                    </div>                                       
                                                                </div>
                                                                
                                                                <div class="col-xs-12 col-sm-12">
                                                                
                                                                    <div class="form-group">
                                                                        <label>Destinations:</label>
                                                                        <input type="text" name="day1_destination2" class="form-control" placeholder="Destination">
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>

                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xs-12 col-sm-6">
                                                                
                                                                    <div class="form-group">
                                                                        <label>Start Time:</label>
                                                                        <input type="time" name="day1_starttime3" class="oh-timepicker form-control" placeholder="Time">
                                                                    </div>
                                                                
                                                                </div>

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day4_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day4_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day4_photo" >
                                                                            </div>
                                                                        </div>

                                                                <div class="col-xs-12 col-sm-6">

                                                                    <div class="form-group">
                                                                        <label>End Time:</label>
                                                                        <input type="time" name="day1_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                    </div>

                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xs-12 col-sm-12">
                                                                
                                                                    <div class="form-group">
                                                                        <label>Destinations:</label>
                                                                        <input type="text" name="day1_destination3" class="form-control" placeholder="Destination">
                                                                    </div>
                                                                    
                                                                </div>

                                                                <div class="add-more-form col-xs-12 col-sm-12">
                                                                    <span>Add/remove Destination</span> 
                                                                    <a href="#"><i class="ion-android-add-circle"></i></a> 
                                                                    <a href="#"><i class="ion-android-remove-circle"></i></a>
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                    
                                                    </div>

                                                </div>
                                            
                                            </div>
                                            
                                            <div class="itinerary-form-item">
                                            
                                                <div class="content clearfix">
                                                
                                                    <div class="row gap-20">
                                                    
                                                        <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                                        
                                                            <div class="day">
                                                                <h6 class="text-uppercase mb-0 mt-5 text-muted">Day</h6>
                                                                <span class="text-primary block number spacing-1">03</span>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                                            
                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xs-12 col-sm-6">
                                                                
                                                                    <div class="form-group">
                                                                        <label>Start Time:</label>
                                                                        <input type="time" name="day1_starttime1" class="oh-timepicker form-control" placeholder="Time">
                                                                    </div>
                                                                
                                                                </div>

                                                                <div class="col-xs-12 col-sm-6">


                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day5_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day5_destination1" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                    <div class="form-group">
                                                                        <label>End Time:</label>
                                                                        <input type="time" name="day1_endtime1" class="oh-timepicker form-control" placeholder="Time">
                                                                    </div>

                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xs-12 col-sm-12">
                                                                
                                                                    <div class="form-group">
                                                                        <label>Destinations:</label>
                                                                        <input type="text" name="day1_destination1" class="form-control" placeholder="Destination">
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>


                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day5_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day5_destination2" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    

                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xs-12 col-sm-6">
                                                                
                                                                    <div class="form-group">
                                                                        <label>Start Time:</label>
                                                                        <input type="time" name="day1_starttime2" class="oh-timepicker form-control" placeholder="Time">

                                                                    </div>
                                                                
                                                                </div>

                                                                <div class="col-xs-12 col-sm-6">

                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day5_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day5_destination3" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                    <div class="form-group">
                                                                        <label>End Time:</label>
                                                                        <input type="time" name="day1_endtime2" class="oh-timepicker form-control" placeholder="Time">
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xs-12 col-sm-12">
                                                                
                                                                    <div class="form-group">
                                                                        <label>Destinations:</label>
                                                                        <input type="text" name="day1_destination2" class="form-control" placeholder="Destination">
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            </div>
                                                                   <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day5_endtime4" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day5_destination4" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                            <div class="row gap-20">
                                                            
                                                                <div class="col-xs-12 col-sm-6">
                                                                
                                                                    <div class="form-group">
                                                                        <label>Start Time:</label>
                                                                        <input type="time" name="day1_starttime3" class="oh-timepicker form-control" placeholder="Time">

                                                                    </div>
                                                                
                                                                </div>

                                                                <div class="col-xs-12 col-sm-6">


                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="time" name="day5_endtime5" class="oh-timepicker form-control" placeholder="Time">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="col-xs-12 col-sm-12">
                                                                        
                                                                            <div class="form-group">
                                                                                <label>Destination:</label>
                                                                                <input type="text" name="day5_destination5" class="form-control" placeholder="Destination">
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>Upload Photo:</label>
                                                                                <input type="file" name="day5_photo" >
                                                                            </div>
                                                                        </div>

                                                                    <div class="form-group">
                                                                        <label>End Time:</label>
                                                                        <input type="time" name="day1_endtime3" class="oh-timepicker form-control" placeholder="Time">
                                                                    </div>

                                                                    
                                                                </div>
                                                                
                                                                <div class="col-xs-12 col-sm-12">
                                                                
                                                                    <div class="form-group">
                                                                        <label>Destinations:</label>
                                                                        <input type="text" name="day1_destination3" class="form-control" placeholder="Destination">
                                                                    </div>
                                                                    
                                                                </div>

                                                                <div class="add-more-form col-xs-12 col-sm-12">
                                                                    <span>Add/remove Destination</span> 
                                                                    <a href="#"><i class="ion-android-add-circle"></i></a> 
                                                                    <a href="#"><i class="ion-android-remove-circle"></i></a>
                                                                </div>
                                                            
                                                            </div>

                                                        </div>
                                                    
                                                    </div>

                                                </div>
                                            
                                            </div>  --}}
                                            
                                        {{--  </div>  --}}
                                        
                                        {{--  <div class="add-more-form mt-15">
                                            <span>Add/remove Day</span>
                                            <a href="#" id="add_day"><i class="ion-android-add-circle"></i></a>
                                            {{--  <a href="#"><i class="ion-android-remove-circle"></i></a>  
                                        </div>  --}}

                                    </div>
                                
                                    <div class="mb-50">

								</div>
								
							</div>
						
						</div>
						
					</div>
					
				</div>
			
			</div>

		</div>
		
        <!-- end Main Wrapper -->
        <!-- start Footer Wrapper -->
	
	    <div class="footer-wrapper scrollspy-footer">
                <footer class="bottom-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <center>
                                    <p class="copy-right">&#169; 2017 Traventure - Tour and Booking System</p>
                                <center>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end Footer Wrapper -->
        
    </div> 
    
    <!-- end Container Wrapper -->
    
    
    <!-- start Back To Top -->
    
    <div id="back-to-top">
        <a href="#"><i class="ion-ios-arrow-up"></i></a>
    </div>
    
    <!-- end Back To Top -->
@endsection
@extends('layouts.user.javascriptlayout')
@section('script')
<script type="text/javascript">
    (function($) {
        $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
			}
		});
        //Variables
        var addDes = `<div class="row gap-20 sample" id="x">
                    
                            <div class="col-xs-12 col-sm-12">
                                <div class="add-more-form">
                                    <a id="remove_des"><i class="ion-android-remove-circle"></i></a>
                                    <span>Remove Destination</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                            
                                <div class="form-group">
                                    <label>Start Time:</label>
                                    <input type="time" name="starttime[]" class="oh-timepicker form-control" placeholder="Time">
                                </div>
                            
                            </div>

                            <div class="col-xs-12 col-sm-6">

                                <div class="form-group">
                                    <label>End Time:</label>
                                    <input type="time" name="endtime[]" class="oh-timepicker form-control" placeholder="Time">
                                </div>
                                
                            </div>
                            
                            <div class="col-xs-12 col-sm-12">
                            
                                <div class="form-group">
                                    <label>Destinations:</label>
                                    <input type="text" name="destination[]" class="form-control" placeholder="Destination">
                                </div>
                                
                            </div>
                        
                        </div>`;

        //Add
        $(".add_des").click(function() {
            console.log("DESTINATION ADDED");
            $(this).offsetParent().append(addDes);
            //$("#button").append(addDes);
            //$(this).offappend('<span class="text-primary block number spacing-1">Hello, Janzen</span>');
            //$("#button").append('<p>'+count+'</p>');
        });

        //Remove
        $("#main").on("click", "#remove_des", function(e){
            $(this).offsetParent().parent().remove();
            console.log("DESTINATION REMOVED");
        });

        //Populate

    }(jQuery));
    $('body').on('focus',".oh-timepicker", function(){
        $(this).timepicker();
    });
</script>
@endsection
