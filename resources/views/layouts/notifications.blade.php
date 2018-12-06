@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h3>@lang('Success')</h3>
    <hr>
    <p>{{Session::get('success')}}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h3>@lang('Error')</h3>
    <hr>
    <p>{{Session::get('error')}}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif