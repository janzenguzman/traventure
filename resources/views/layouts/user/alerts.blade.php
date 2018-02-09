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
        {{ session('addedPackage')}}
    </div>
@elseif(session('BookingFailed'))
    <div class="alert alert-danger alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('BookingFailed')}}
    </div>
@elseif(session('slotsAdded'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('slotsAdded')}}
    </div>
@elseif(session('SlotDeleted'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('SlotDeleted')}}
    </div>
@elseif(session('BookingDeleted'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('BookingDeleted')}}
    </div>
@elseif(session('BookingAccepted'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('BookingAccepted')}}
    </div>
@elseif(session('BookingDeclined'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('BookingDeclined')}}
    </div>
@elseif(session('PasswordChanged'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('PasswordChanged')}}
    </div>
@elseif(session('ErrorReEnteredPassword'))
    <div class="alert alert-danger alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('ErrorReEnteredPassword')}}
    </div>
@elseif(session('ErrorPassword'))
    <div class="alert alert-danger alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('ErrorPassword')}}
    </div>
@elseif(session('InvalidDay'))
    <div class="alert alert-danger alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('InvalidDay')}}
    </div>
@elseif(session('updatedPackage'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('updatedPackage')}}
    </div>
@elseif(session('updatedItinerary'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('updatedItinerary')}}
    </div>
@elseif(session('ErrorSlots'))
    <div class="alert alert-danger alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('ErrorSlots')}}
    </div>
@elseif(session('successful_signupTraveler'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('successful_signupTraveler')}}
    </div>
@endif

