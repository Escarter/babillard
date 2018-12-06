@csrf
<input type="hidden" name="id" value="">
<div class="form-group">
    <select  name="department_id" class="form-control ecole_id" >
        <option value="0" selected>Select user Department</option>
        @foreach ($departments as $department )
            <option value="{{$department->id}}">{{$department->department_name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
     <input class="form-control" type="text"  name="niveau_name" required="required" value="" placeholder="{{__('Niveau Name')}}" autofocus>
</div>

