@if($user->image_path != null)
    @if ($user->image_validation_status == "Pending")
    <span class="badge badge-warning">@lang('Pending')</span>
    @elseif($user->image_validation_status == "Approved")
    <span class="badge badge-success">@lang('Approved')</span>
    @elseif($user->image_validation_status == "Accepted")
    <span class="badge badge-info">@lang('Accepted')</span>
    @else
    <span class="badge badge-danger">@lang('Rejected')</span>
    @endif
@else
<span class="badge badge-dark">No picture</span>
@endif
