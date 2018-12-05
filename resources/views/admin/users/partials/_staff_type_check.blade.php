@if ($user->staff_type == "Permenant")
<span class="badge badge-warning">@lang('Permenant')</span>
@elseif($user->staff_type == "Temporary")
 <span class="badge badge-dark">@lang('Temporary')</span>
@elseif($user->staff_type == "Consultants")
 <span class="badge badge-info">@lang('Consultants')</span>
@else
<span class="badge badge-danger">@lang('empty')</span>
@endif