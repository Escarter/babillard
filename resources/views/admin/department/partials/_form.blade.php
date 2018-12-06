@csrf
<input type="hidden" name="id" value="">
<div class="form-group">
    <select  name="faculte_id" class="form-control ecole_id" >
        <option value="0" selected>Select user Faculty</option>
        @foreach ($facultes as $faculte )
            <option value="{{$faculte->id}}">{{$faculte->faculte_name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
     <input class="form-control" type="text"  name="department_name" required="required" value="" placeholder="{{__('Deparment Name')}}" autofocus>
</div>

