@if(session('successful_signup')) 
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('successful_signup')}}
    </div>
@elseif(session('pending_status'))
    <div class="alert alert-danger alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{ session('pending_status')}}<p>
    </div>
@elseif(session('updatedProfile'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('updatedProfile')}}
    </div>
@elseif(session('messageSent'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('messageSent')}}
    </div> 
@elseif(session('messageDeleted'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('messageDeleted')}}
    </div>
@elseif(session('messageDeletedFail'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('messageDeletedFail')}}
    </div>
@elseif(session('bookingRequestCancelled'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('bookingRequestCancelled')}}
    </div>
@elseif(session('bookingConfirmed'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('bookingConfirmed')}}
    </div>
@elseif(session('cancelledBooking'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('cancelledBooking')}}
    </div>

@elseif(session('deletedPackage'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('deletedPackage')}}
    </div>
@elseif(session('addedPackage'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('deletedPackage')}}
@elseif(session('BookingFailed'))
    <div class="alert alert-danger alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('BookingFailed')}}
    </div>
@endif