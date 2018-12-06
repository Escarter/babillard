@csrf
<input type="hidden" name="id" value="">
<div class="form-group">
    <select  name="niveau_id" class="form-control ecole_id" >
        <option value="0" selected>Select user Niveau</option>
        @foreach ($niveaux as $niveau )
            <option value="{{$niveau->id}}">{{$niveau->niveau_name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
     <input class="form-control" type="text"  name="filiere_name" required="required" value="" placeholder="{{__('Filiere Name')}}" autofocus>
</div>

