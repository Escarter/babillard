@extends('admin.layout.app')
@section('title')
<title>Rejection Reasons Management</title>
@stop
@section('admin-content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">@lang('Dashboard') </a>
    </li>
    <li class="breadcrumb-item">
        <a href="#"> @lang('Management')  </a>
    </li>
    <li class="breadcrumb-item active"> @lang('Rejection Reason Management')</li>
</ol>
<!--Department Table Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> @lang('Rejection Table')
        <div class="float-right">
            <button class="btn btn-secondary" data-toggle="modal" data-target="#createRejectionReasonModal" ><i class="fa fa-plus"></i> @lang('Create Rejection Reason')</button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body">
        @if ($rejection_reasons->count()>0)
        <div class="table-responsive">
            <table width="100%"   id="dataTable" class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>SN</th>
                        <th>@lang('Rejection Reason  Name')</th>
                        <th>@lang('Rejection Reason Description')</th>
                        <th>@lang('created Date')</th>
                        <th>@lang('Action')</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $int = 0; ?>
                    @foreach ($rejection_reasons as $rejection_reason )
                    <?php ++$int; ?>
                    <tr >
                        <td>{{$int}}</td>
                        <td>{{$rejection_reason->name}}</td>
                        <td>{{$rejection_reason->description}}</td>
                        <td>{{$rejection_reason->created_at->diffForHumans()}}</td>
                        <td>
                            <button data-id="{{$rejection_reason->id}}" data-url="/admin/rejection-reason/edit/{{$rejection_reason->id}}" data-toggle="modal" data-target="#editRejectionReasonModal" class="btn btn-secondary btn-sm"><i class="fa fa-pencil "></i></button>
                            <button  data-id="{{$rejection_reason->id}}" data-url="/admin/rejection-reason/delete/{{$rejection_reason->id}}" class="btn btn-danger deleteRejectionReasonBtn btn-sm"><i class="fa fa-remove "></i></button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @else
            <h4>@lang('Information') </h4>
            <p>@lang('No Rejection Reason Created yet')</p>
            <br>
            <button class="btn btn-warning " data-toggle="modal" data-target="#createRejectionReasonModal" ><i class="fa fa-plus"></i> @lang('Create Rejection Reason')</button>

        @endif
    </div>
    <div class="card-footer small text-muted">{{$rejection_reasons->count()}} @lang('Rejection Reasons')</div>
</div>
@include('admin.rejection-reasons.partials.create')
@include('admin.rejection-reasons.partials.edit')
{{-- End of container-fluid --}}
@stop

@section('script')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive: true,
             "language": {
                "search": "@lang('Search'):",
                "lengthMenu":     "@lang('Show') _MENU_ @lang('entries')",
                "emptyTable":     "@lang('No data available in table')",
                "info":           "@lang('Showing') _START_ @lang('to') _END_ @lang('of') _TOTAL_ @lang('entries')",
                "infoEmpty":      "Showing 0 to 0 of 0 entries",
                "infoFiltered":   "(@lang('filtered') @lang('from') _MAX_ @lang('total entries'))",
                "loadingRecords": "@lang('Loading...')",
                "processing":     "@lang('Processing...')",
                "paginate": {
                    "first":      "@lang('First')",
                    "last":       "@lang('Last')",
                    "next":       "@lang('Next')",
                    "previous":   "@lang('Previous')"
                },
              }
        });
        $('#editRejectionReasonModal').on('show.bs.modal', function (event) {

            var editRRBtn = $(event.relatedTarget) // Button that triggered the modal
            var url = editRRBtn.data('url')
            var editRejectionReasonModal = $(this)

            console.log(url);

            $.ajax({
                dataType  :'JSON',
                type      :'GET',
                url       : url,
                success   :function(response){
                    console.log(response)
                    if(response.status == 'success') {
                        editRejectionReasonModal.find('input[name="id"]').val(response.data.id)
                        editRejectionReasonModal.find('input[name="rejection_name"]').val(response.data.name)
                        editRejectionReasonModal.find('textarea[name="rejection_desc"]').val(response.data.description)
                    }
                    if(response.status =='error'){
                        toastr.warning(response.data,'Oops Something is not alright');
                    }
                }
            });
        });
        $('.deleteRejectionReasonBtn').on('click', function(e){
            e.preventDefault();
            var url = $(this).attr('data-url');
            swal({
                title: "@lang('Are you sure?')",
                text: "@lang('Do you really want to delete Rejection Reason')",
                icon: "warning",
                buttons: ['@lang("Cancel")', '@lang("Confirm")'],
                dangerMode: true,
              })
              .then((willDelete)=> {
                if (willDelete) {
                    $.ajax({
                        dataType  :'JSON',
                        method      :'GET',
                        url       : url,
                        success     :function(response){
                            console.log(response);
                            if (response.status == 'success') {
                                swal({title:"Great Job",text:response.message,icon:response.status })
                                .then((willReload) =>{
                                        if (willReload) {
                                    location.reload();
                                    }
                                });
                            }
                            if(response.status =='error'){
                                swal({title:"Error",text:response.message,icon:"warning"});
                            }
                        }
                    });
                } else {
                swal("@lang('Rejection Reason Information is safe!')");
                }
              });
        })
    });
</script>
@stop
