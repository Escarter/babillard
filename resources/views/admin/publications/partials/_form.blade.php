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
     <input class="form-control" type="text"  name="publication_name" required="required" value="" placeholder="{{__('Publication Name')}}" autofocus>
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
    <select  name="publication_target" class="form-control "  >
        <option value="0" selected>{{ __('Select  Publication Target') }}</option>
        <option value="internal">Internal</option>
        <option value="external">External</option>
    </select>
</div>
<div class="form-group">
    <label>Publication Expiry Date</label>
    <input class="form-control datepicker" name="publication_expiry_date"  data-date-format="mm/dd/yyyy" placeholder="mm/dd/yyyy">
</div>
@section('post-script')
<script>
$(document).ready(function(){

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
})
</script>
@stop
