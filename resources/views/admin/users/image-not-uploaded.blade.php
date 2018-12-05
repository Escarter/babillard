@extends('admin.layout.app')
@section('title')
<title>Users Management</title>
@stop
@section('admin-content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/admin">Dashboard </a>
    </li>
    <li class="breadcrumb-item">
        <a href="/admin/users"> Users  </a>
    </li>
    <li class="breadcrumb-item active">Image Not Uploaded</li>
</ol>
<!--Department Table Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Image Not Uploaded Table
        <div class="float-right">
        <a href="/admin/users" class="btn btn-secondary  btn-sm"><i class="fa fa-users"></i> All Users</a>
         </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body">
        <div class="float-right">
            <div class="btn-group">
                <a href="/admin/users/image-uploaded" class="btn btn-outline-secondary  btn-sm"><i class="fa fa-image"></i> Image Uploaded</a>
                <a href="/admin/users/image-not-uploaded" class="btn btn-secondary  btn-sm"><i class="fa fa-remove"></i> Image Not Uploaded</a>
                <a href="/admin/users/image-pending" class="btn btn-outline-secondary btn-sm"><i class="fa fa-calendar"></i> Image Pending</a>
                <a href="/admin/users/image-approved" class="btn btn-outline-secondary  btn-sm"><i class="fa fa-thumbs-up"></i> Image Approved</a>
                <a href="/admin/users/image-rejected" class="btn btn-outline-secondary btn-sm"><i class="fa fa-thumbs-down"></i> Image Reject</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="pt-1 pb-4">

            <button data-toggle="modal" data-target="#massReminderModal" class="btn btn-success btn-sm ml-3 " ><i class="fa fa-bell"></i> @lang('Mass Reminder') </button>

        </div>
        <div class="table-responsive">
            <table width="100%"   class="table table-bordered table-hover dataTable">
                <thead class="thead-light">
                    <tr>
                        <!-- <th><input name="select_all" value="1" id="select-all" type="checkbox" /></th> -->
                        <th>Action</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Emp Num</th>
                        <th>Gender</th>
                        <th>Depart</th>
                        <th>Img Uploaded Status</th>
                        <th>Img Validation Status</th>
                        <th>Reminder Sent</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

</div>
@include('admin.users.partials.reminder-modal')
@include('admin.users.partials.mass-reminder-modal')
{{-- End of container-fluid --}}
@stop

@section('admin-script')
<script>
    $(document).ready(function() {
        var oTable  =   $('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            buttons: [
                {
                    extend:'csvHtml5',
                    exportOptions: {
                        columns: [':visible' ]
                    },

                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [':visible' ]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [':visible' ]
                    }
                },'colvis'],
            "bDestroy": true,
            scrollY:        "1000px",
            scrollX: true,
            scrollCollapse: true,
            paging:         true,
            ajax: {
                url: '{!! route('datatables.users.image-not-uploaded') !!}',
                data: function (d) {

                   // console.log(d.REQUEST_DATE);
                }

            },
            columns: [
                // { data: 'id', name: 'id', orderable: false, searchable: false},
                { data: 'action', name: 'action', orderable: false, searchable: false},
                { data: 'full_name', name:'full_name'},
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'hris_number', name: 'hris_number' },
                { data: 'gender', name: 'gender' },
                { data: 'department_id', name: 'department_id' },
                { data: 'image_uploaded_status', name: 'image_uploaded_status' },
                { data: 'image_validation_status', name: 'image_validation_status' },
                { data: 'reminder_count', name: 'reminder_count' },


            ],
             order: [[1,'asc']],
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
              },
        });


		//Send Reminder Modal
		$('#ReminderModal').on('show.bs.modal', function (event) {

            var reminderBtn = $(event.relatedTarget) // Button that triggered the modal
            var url = reminderBtn.data('url')
            var reminderModal = $(this)
            console.log(url);
            $.ajax({
                dataType  :'JSON',
                type      :'GET',
                url       : url,
                success   :function(response){
                    console.log(response)
                    if(response.status == 'success') {
                        reminderModal.find('input[name="id"]').val(response.data.id)
                        reminderModal.find('input[name="user_email"]').val(response.data.email)
                    }
                    if(response.status =='error'){
                        toastr.warning(response.data,'Oops Something is not alright');
                    }
                }
            });
        });

    });
</script>
@yield('post-script')
@stop
