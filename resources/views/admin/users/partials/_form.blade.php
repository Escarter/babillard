@csrf
<input type="hidden" name="id" value="">
<div class="form-group row">
    <div class="col-md-6 col-xs-12">
     <input class="form-control" type="text"  name="first_name" required="required" placeholder="First Name" autofocus>
    </div>
    <div class="col-md-6 col-xs-12">
     <input class="form-control" type="text"  name="last_name" required="required" placeholder="Last Name" >
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 col-xs-12">
     <input class="form-control" type="text"  name="email" required="required" placeholder="Email" >
    </div>
    <div class="col-md-6 col-xs-12">
     <input class="form-control" type="text"  name="phone" required="required" placeholder="Phone" >
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 col-xs-12">
        <select  name="department_id" class="form-control department_id" >
            <option value="0" selected>Select user Department</option>
            @foreach ($departments as $department )
                <option value="{{$department->id}}">{{$department->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 col-xs-12">
        <select  name="gender" class="form-control" >
            <option value="0" selected>Select user gender</option>
            <option value="F" >Female</option>
            <option value="M" >Male</option>
        </select>
    </div>

</div>
<div class="form-group row">

    <div class="col-md-6 col-xs-12">
        <select  name="user_status" class="form-control" >
            <option value="0" selected>Select user Status</option>
            <option value="Active" >Active</option>
            <option value="Suspended" >Suspended</option>
        </select>
    </div>
    <div class="col-md-6 col-xs-12">
        <select  name="staff_type" class="form-control" id="staff_type" >
            <option value="0">Select Staff Type</option>
            <option value="Permenant" >Permenant</option>
            <option value="Temporary" >Temporary</option>
            <option value="Consultants" >Consultants</option>
            <option value="Contractors" >Contractors</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 col-xs-12">
         <input class="form-control" type="text"  name="location"  placeholder="Location" >
    </div>
    <div class="col-md-6 col-xs-12">
         <input class="form-control" type="text"  name="role"  placeholder="Role" >
    </div>
</div>
<div class="staff_indicator">
    <div class="form-group " id="staff" style="display:none">
        <input class="form-control" type="text"  name="hris_number"  placeholder="Employee Number" >
    </div>
    <div class="form-group row" id="non_staff" style="display:none">
        <div class="col-md-12 col-xs-12">
            <input class="form-control" type="text"  name="id_number"  placeholder="Id Number" >
        </div>
        <div class="col-md-12 col-xs-12 mt-lg-1" >
            <label>Scanned Id () </label>
            <input class="form-control-file" type="file" id="path_scanned_id"  name="path_scanned_id"  >
            <div class="alert alert-danger" id="divFiles" role="alert" style="display:none">
                <p></p>
            </div>
        </div>
    </div>

</div>


<div class="form-check">
    <input name="isAdmin" type="checkbox" class="form-check-input isAdmin"  value="">
    <label class="form-check-label" for="invalidCheck">
       Make Admin (if not checked)
    </label>
</div>
@section('post-script')
<script>
$(document).ready(function(){
    $('select#staff_type').on('change', function(){
        var staff_type = $(this).find(":selected").text();

        if(staff_type === 'Permenant'){
            $('.staff_indicator #non_staff').hide()
             $('.staff_indicator  #staff').show()
        }else{
            $('.staff_indicator #staff').hide()
            $('.staff_indicator  #non_staff').show()
        }
    })

    $('input#path_scanned_id').change(function(e) {
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
