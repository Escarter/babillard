@csrf
<input type="hidden" name="id" value="">
<div class="form-group">
    <select  name="publication_type" class="form-control " >
        <option value="0" selected>{{ __('Select  Publication Type') }}</option>
        <option value="note_de_service"> {{ __('Note de services') }}</option>
        <option value="communique">{{ __('Commnunique') }}</option>
        <option value="emplois_du_temps">{{ __('Emplois du temps') }}</option>
        <option value="resultats_examin">{{__('Resultats Examins')}}</option>
        <option value="other">{{__('Others')}}</option>
    </select>
</div>
<div class="form-group">
    <textarea name="publication_description" id="" cols="10" rows="5" class="form-control" placeholder="{{__('Publication Description')}}"></textarea>
</div>
<div class="form-group row">
    <div class="col-md-12 col-xs-12 mt-lg-1 " >
        <label>{{__('Publication File')}} </label>
        <input class="form-control" type="file" id="publication_file_path"  name="publication_file_path"  >
        <div class="alert alert-danger" id="divFiles" role="alert" style="display:none">
            <p></p>
        </div>
    </div>
</div>
<div class="form-group">
    <select  name="publication_target" class="form-control " id="publication_target" >
        <option value="0" selected>{{ __('Select  Publication Target') }}</option>
        <option value="Internal">Internal</option>
        <option value="External">External</option>
    </select>
</div>
<div class="staff_indicator">
    <div class="form-group " id="external" style="display:none">
    </div>
    <div class="form-group row" id="internal" style="display:none">
        <div class="col-md-12 col-xs-12 my-1">
            <select  name="ecole_id" class="form-control ecole_id" >
                <option value="0" selected>{{__('Select School')}}</option>
                @foreach ($ecoles as $ecole )
                    <option value="{{$ecole->id}}">{{$ecole->ecole_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 col-xs-12 my-1">
            <select  name="faculte_id" class="form-control faculte_id facultes" >
                <option value="0" selected>{{ __('Select Faculte') }}</option>
            </select>
        </div>
        <div class="col-md-12 col-xs-12 my-1">
            <select  name="department_id" class="form-control department_id departments" >
                <option value="0" selected>{{ __('Select Department') }}</option>
            </select>
        </div>
        <div class="col-md-12 col-xs-12 my-1">
            <select  name="niveau_id" class="form-control niveau_id niveaux" >
                <option value="0" selected>{{ __('Select Niveau') }}</option>
            </select>
        </div>
        <div class="col-md-12 col-xs-12 my-1">
            <select  name="filiere_id" class="form-control filiere_id filieres" >
                <option value="0" selected>{{ __('Select Filiere') }}</option>
            </select>
        </div>
    </div>
</div>

<div class="form-group">
     <input class="form-control" type="text"  name="niveau_name" required="required" value="" placeholder="{{__('Niveau Name')}}" autofocus>
</div>
@section('post-script')
<script>
$(document).ready(function(){
    $('select#publication_target').on('change', function(){
        var pub_target = $(this).find(":selected").text();
        if(pub_target === 'Internal'){
            $('.staff_indicator #internal').show()
             $('.staff_indicator #external').hide()
        }else{
            $('.staff_indicator #internal').hide()
            $('.staff_indicator #external').show()
        }
    })

    $('input#publication_file_path').change(function(e) {
        var val = $(this).val().toLowerCase(),
            regex = new RegExp("(.*?)\.(jpeg|jpg|pdf|png)$");

        if (!(regex.test(val))) {
            $(this).val('');
            toastr.error("Please select correct file format - accepted formats (png|jpeg|pdf)","Error")
        }

        var files = e.originalEvent.target.files;
        for (var i=0, len=files.length; i<len; i++){
            var n = files[i].name,
                s = files[i].size

            if (s > 20000000) {
                $(this).val('');
                toastr.error('File size can not be > 20MB',"Error")
            }
        }
    })

    $('.ecole_id').on('change', function(e){
        e.preventDefault();
        var ecole_id = $(this).val();
            console.log(ecole_id);
        $.ajax({
            method   :'GET',
            url      : '/admin/ecole/'+ecole_id+'/facultes',
            dataType :'json',
            success  : function(response){
            if (response.status == 'success') {
                console.log(response.data);
                var facultes = [];
                for (var i = 0; i < response.data.length; i++) {
                        facultes.push('<option  value="'+response.data[i].id+'">'+response.data[i].faculte_name+'</option>');
                }
                if(facultes.length == 0){
                    $('.facultes').html('<option value="0">No facultes for the selected faculte </option>');
                }
                $('.facultes').html(facultes);

            }else{

            }
            }
        });
    });
    $('.faculte_id').on('change', function(e){
        e.preventDefault();
        var faculte_id = $(this).val();
            console.log(faculte_id);
        $.ajax({
            method   :'GET',
            url      : '/admin/faculte/'+faculte_id+'/departments',
            dataType :'json',
            success  : function(response){
            if (response.status == 'success') {
                console.log(response.data);
                var departments = [];
                for (var i = 0; i < response.data.length; i++) {
                        departments.push('<option  value="'+response.data[i].id+'">'+response.data[i].department_name+'</option>');
                }
                if(departments.length == 0){
                    $('.departments').html('<option value="0">No departments for the selected department </option>');
                }
                $('.departments').html(departments);

            }else{

            }
            }
        });
    });
    $('.department_id').on('change', function(e){
        e.preventDefault();
        var department_id = $(this).val();
            console.log(department_id);
        $.ajax({
            method   :'GET',
            url      : '/admin/department/'+department_id+'/niveaux',
            dataType :'json',
            success  : function(response){
            if (response.status == 'success') {
                console.log(response.data);
                var niveaux = [];
                for (var i = 0; i < response.data.length; i++) {
                        niveaux.push('<option  value="'+response.data[i].id+'">'+response.data[i].niveau_name+'</option>');
                }
                if(niveaux.length == 0){
                    $('.niveaux').html('<option value="0">No niveaux for the selected department </option>');
                }
                $('.niveaux').html(niveaux);

            }else{

            }
            }
        });
    });
    $('.niveau_id').on('change', function(e){
        e.preventDefault();
        var niveau_id = $(this).val();
            console.log(niveau_id);
        $.ajax({
            method   :'GET',
            url      : '/admin/niveau/'+niveau_id+'/filieres',
            dataType :'json',
            success  : function(response){
            if (response.status == 'success') {
                console.log(response.data);
                var filieres = [];
                for (var i = 0; i < response.data.length; i++) {
                        filieres.push('<option  value="'+response.data[i].id+'">'+response.data[i].filiere_name+'</option>');
                }
                if(filieres.length == 0){
                    $('.filieres').html('<option value="0">No filieres for the selected department </option>');
                }
                $('.filieres').html(filieres);

            }else{

            }
            }
        });
    });

})
</script>

@stop
