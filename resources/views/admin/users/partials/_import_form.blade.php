@csrf
<div class="form-group">
     <input class="form-control" type="file"  id="import_csv" name="import_csv" autofocus>
</div>
@section('post-script')
<script>
$('input#import_csv').change(function(e) {
        var val = $(this).val().toLowerCase(),
            regex = new RegExp("(.*?)\.(csv|xls)$");

        if (!(regex.test(val))) {
            $(this).val('');
            toastr.error("Please select correct file format - accepted format (csv)","Error")
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
</script>
@stop
