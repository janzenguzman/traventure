@if(session('deactivated')) 
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('deactivated')}}
    </div>
@elseif(session('accepted'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('accepted')}}
    </div>
@elseif(session('declined'))
    <div class="alert alert-success alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('declined')}}
    </div>
@endif
