@csrf
<input type="hidden" name="id" value="">
<div class="form-group">
    <select  name="ecole_id" class="form-control ecole_id" >
        <option value="0" selected>Select user School</option>
        @foreach ($ecoles as $ecole )
            <option value="{{$ecole->id}}">{{$ecole->ecole_name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
     <input class="form-control" type="text"  name="faculte_name" required="required" value="" placeholder="{{__('Faculty Name')}}" autofocus>
</div>

