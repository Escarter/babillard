@csrf
<div class="form-group">
    <select  name="department_id" class="form-control department_id" >
        <option value="0" selected>Select user Department</option>
        @foreach ($departments as $department )
            <option value="{{$department->id}}">{{$department->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <input type="text" name="reminder_subject" id="" class="form-control" placeholder="@lang('Enter Reminder Title ')">
</div>
<div class="form-group">
     <textarea class="form-control"  name="reminder_body"  placeholder="@lang('Enter Rejection Reason Description')"></textarea>
</div>
