
@if (Session::has('success'))
    <div class="alert alert-success" role="alert" id="alert">
        {{Session::get('success')}}
    </div>
@elseif(Session::has('warning'))
    <div class="alert alert-warning" role="alert" id="alert">
        {{Session::get('warning')}}
    </div>
@elseif(Session::has('info'))
    <div class="alert alert-info" role="alert" id="alert">
        {{Session::get('info')}}
    </div>
@elseif(Session::has('danger'))
    <div class="alert alert-danger" role="alert" id="alert">
        {{Session::get('danger')}}
    </div>
@endif

