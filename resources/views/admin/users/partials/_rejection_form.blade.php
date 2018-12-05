@csrf
<div class="form-group">
    <select  name="rejection_reason_id" class="form-control " >
        <option value="0" selected>@lang('Select Rejection Reason')</option>
        @foreach ($rejection_reasons as $rejection_reason )
            <option value="{{$rejection_reason->id}}">{{$rejection_reason->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
     <textarea class="form-control"  name="rejection_reason" autofocus placeholder="@lang('Enter Rejection Reason Description')"></textarea>
</div>
<input type="hidden" name="id" value="">
